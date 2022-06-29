<?php
/**
*	Ésta clase está basada en la clase "Database" de Hybrid, creada por Sergio T. & en una función expuesta por Jeffrey Way.
*	@author 	iStocker
*	@package 	DBManager
* 	@category	Unique
* 	@version 	ALPHA 1
*	@link 		http://net.tutsplus.com/tutorials/php/the-problem-with-phps-prepared-statements/
**/

namespace Tea;

if(!defined('__TEA__') || !__TEA__)
    exit;

class DBManager
{
	public $dblink, $dbhost, $dbuser, $dbname, $dbport;
	private $dbpwd;

	public $parameters = array();
	public $row;

	public $ready = false;
	
	public function __construct($host = '127.0.0.1', $user = 'root', $pwd, $dbname, $port = 3306)
	{
		$this->dbhost 	= $host;
		$this->dbuser 	= $user;
		$this->dbpwd 	= $pwd;
		$this->dbname 	= $dbname;
		$this->port 	= (int) $port;

		$this->dblink = new \MySQLi($this->dbhost, $this->dbuser, $this->dbpwd, $this->dbname, $this->port);
			
		($this->dblink->errno) ? die($this->dblink->error):$this->ready=true;

		return $this->dblink;
	}

	public function query($query)
	{
		$stmt = $this->dblink->prepare($query) or die ($this->dblink->error);
		$stmt->execute();
		$stmt->store_result();

		$meta = $stmt->result_metadata();

		while( $field = $meta->fetch_field() )
		{
			$this->parameters[] =& $this->row[$field->name];
		}

		call_user_func_array(array($stmt, 'bind_result'), $this->parameters); 

		return $stmt;
	}

	public function fetch($stmt)
	{
		while ( $stmt->fetch() ) 
		{  
      		$x = array();  
      		foreach( $this->row as $key => $val ) 
      		{  
        		$x[$key] = $val;  
      		}  
      		$results[] = $x;  
   		}  
  
   		return $results; 
	}

	public function insert()
	{

	}
}
?>