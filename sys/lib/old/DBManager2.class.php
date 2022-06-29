<?php
/**
 * Éste sistema de administración de base de datos fue desarrollado por Sergio T. para su sistema Hybrid.
 * El controlador (o driver) "mysqlnd" es necesario para el funcionamiento de éste módulo.
 * @author 		Sergio T.
 * @package 	DBManager
 * @category	Unique
 * @version 	BETA 1
**/

namespace Tea;

if(!defined('__TEA__') || !__TEA__)
    exit;

	define('SLOW_QUERY_TIME', 0.03);
	class DBManager
	{
		public $paramethers = array();
		
		public $dbConnection = null;
		
		public $host;
		public $port;
		public $username;
		public $password;
		public $database;
		public $type;
		
		public $query;

		public $timeStart;
		public $queryStart;
		public $queryEnd;
		public $queryTime;
		public $querybind;
		public $ready = false;
		
		final public function __construct($host = "127.0.0.1", $username, $password, $database, $port = "3306", $type = "mysqli")
		{
			
			$this->host     = $host;
			$this->port     = (int) $port;
			$this->username = $username;
			$this->password = $password;
			$this->database = $database;
			$this->type     = $type;
			
		}
		
		final public function run()
		{
			$this->timeStart = microtime(1);
			switch($this->type)
			{
				case "mysqli":
					$this->dbConnection = new \mysqli($this->host, $this->username, $this->password, $this->database, $this->port);
					break;
				case "PDO":
					$this->dbConnection = new \PDO("mysql:host={$this->host};".($this->port != 3306 ? "port=".$this->port.";" : "")."dbname={$this->database}", $this->username, $this->password);
					$this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					break;
			}
	
			$this->ready = true;
			
		}
		
		final public function AddParametresWithValue($name, $val)
		{
			$this->paramethers[$name] = $val;
		}
		
		final public function get_type($value)
		{
			if( $this->type == 'mysqli' )
				return $this->get_type_bind_param_mysqli($value);
			else
				return $this->get_type_bind_param_PDO($value);
		}
		
		final public function generateParams($array)
		{	
			$parametros = array();
			if( is_array($array) && sizeof( $array ) > 0 )
			{
				foreach($array as $value)
				{
					$parametros[] = $value;
				}
				
			}
			return $parametros;
		}
		
		final public function query($query, $mparams = array())
		{
			
			if( !$this->is_run() )
				$this->run();
			if( sizeof( $mparams ) > 0 )
			{
				$params = $mparams;
				$params = $this->generateParams($params);
			}
			else if( sizeof( $this->paramethers ) > 0 )
			{
				$params = $this->paramethers;
				
				$params = $this->generateParams($params);
			}
				
			if( sizeof( $params ) > 0 )
			{
				$i = 0;

				$stmt = $this->dbConnection->prepare($query);

				if( $this->type == 'mysqli' )
				{
					foreach($params as $value)
					{
						
							$this->querybind .= $this->get_type($value);
					}
				}
				if( $this->type == 'mysqli' )
				{
					$bindResult = '$stmt->bind_param($this->querybind,';
					foreach($params as $key => $value)
					{
						$bindResult .= '$params["'.$key.'"],';
					}
					$bindResult = rtrim($bindResult, ',') . ');';
					eval($bindResult);
				}
				if($this->type == 'PDO')
					$stmt->execute($params);
				else
					$stmt->execute(); $stmt->store_result();
					
				$this->paramethers = array();
				$this->queryEnd = microtime(1);
				$queryTime = $this->queryEnd - $this->queryStart;
				$this->queryTime[] = $queryTime;

				return $stmt;
			}
			else
			{
				if( $this->type == 'mysqli' )
				{
					$query = $this->dbConnection->query($query);
				}
				else
				{
					$query = $this->dbConnection->prepare($query);
					$query->execute();
				}
				return $query;
			}
			
		}
		
		final public function num_rows($query)
		{
			if( $this->type == 'mysqli' )
				return (is_object($query) ? $query->num_rows() : $this->query($query)->num_rows());
			else
				return	(is_object($query) ? $query->rowCount() : $this->query($query)->rowCount());
			
		}
		
		final public function fetch_array($query, $type = MYSQLI_ASSOC)
		{
				
			if( $this->type == 'mysqli' )
			{
				$result = (is_object($query) ? $query->get_result() : $this->query($query)->get_result());
				return $result->fetch_array($type);
			}
			else
			{
				return (is_object($query) ? $query->fetch() : $this->query($query)->fetch());
			}
		}
		
		final public function fetch_object($query, $type = MYSQLI_ASSOC)
		{
		
			if( $this->type == 'mysqli' )
			{
				$result = (is_object($query) ? $query->get_result() : $this->query($query)->get_result());
				return (object) $result->fetch_array($type);
			}
			else
			{
				$result = (is_object($query) ? $query->fetch() : $this->query($query)->fetch());
				return (object) $result;
			}
		}
		
		final public function result($query, $column = 0)
		{
				
			if( $this->type == 'mysqli' )
			{
				$result = (is_object($query) ? $query->get_result() : $this->query($query)->get_result());
				return $result->fetch_array()[$column];
			}
			else
			{
				return (is_object($query) ? $query->fetch()[$column] : $this->query($query)->fetch()[$column]);
			}
		}
		
		/* helpers */
		final public function get_type_bind_param_mysqli($param)
		{
		
			if( is_double( $param ) )
				return 'd';
				
			if( is_numeric( $param ) )
				return 'i';
			
			if( is_string( $param ) )
				return 's';
		}
		
		final public function get_type_bind_param_PDO($var)
		{
		
			if( is_int( $var ) )
				return PDO::PARAM_INT;
				
			if( is_bool( $var ) )
				return PDO::PARAM_BOOL;
				
			if( is_null( $var ) )
				return PDO::PARAM_NULL;
				
			return PDO::PARAM_STR;
		}
		
		final public function is_run()
		{
			return ( $this->ready && $this->dbConnection != null);
		}
		
		function refValues($arr)
		{ 
			$refs = array();

			foreach ($arr as $key => $value)
			{
				$refs[$key] = &$arr[$key]; 
			}

			return $refs; 
		} 
	}