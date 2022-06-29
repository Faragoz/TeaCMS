<?php
/**
*	@author 	iStocker & SofoEB
*	@package 	Users
* 	@category	All (getData, updateUser, newUser, etc)
* 	@version 	ALPHA 2
**/

namespace Tea; 

if(!defined('__TEA__') || !__TEA__)
    exit;

class Users
{
	public $attr;

	public function setData($attr, $value = null)
	{
		if(is_array($attr) && sizeof($attr))
		{
			if(array_key_exists("id", $attr) || array_key_exists("rank", $attr) || array_key_exists("credits", $attr) || array_key_exists("pixels", $attr))
			{
				if(is_int($attr['id']) || is_int($attr['rank']) || is_int($attr['credits']) || is_int($attr['pixels']))
				{
					foreach($attr as $key => $value)
					{
						$this->attr[$key] = utf8_encode(htmlspecialchars($value));
					}
				}	
				else
				{
					throw new \Exception("El id, rango, créditos y pixeles deben de ser valores numéricos reales.", 1);
				}
			}
			else
			{
				foreach($attr as $key => $value)
				{
					$this->attr[$key] = utf8_encode(htmlspecialchars($value));
				}
			}
		}
		else
		{
			if($attr == 'id' || $attr == 'rank' || $attr == 'credits' || $attr == 'pixels')
			{
				if(is_int($value))
				{
					$this->attr[$attr] = utf8_encode(htmlspecialchars($value));
				}
				else
				{
					throw new \Exception("El id, rango, créditos y pixeles deben de ser valores numéricos reales.", 1);
				}
			}
			else
			{
				$this->attr[$attr] = utf8_encode(htmlspecialchars($value));
			}
		}
	}

	public function getData($key = null, $data = '*', $limit = null)
	{
		if(isset($this->attr[$key]))
		{
			$sql = ( !isset($limit) ) ? "SELECT ". $data ." FROM users WHERE " . $key . " = '" . $this->attr[$key] . "'":"SELECT ". $data ." FROM users WHERE " . $key . " = '" . $this->attr[$key] . "' LIMIT " . $limit . "";
			$query = System::$dblink->query($sql);

			if($query->num_rows)
			{
				return System::$dblink->fetch($query);
			}
			else
			{
				throw new \Exception("El usuario que buscas no existe.", 2);
			}
			
		}
		else
		{
			$query = System::$dblink->query("SELECT " . $data . " FROM users");
			return System::$dblink->fetch($query);
		}
	}

	public function countData($key)
	{
		if(is_array($key) && sizeof($key))
		{
			foreach($key as $k)
			{
				$sql[$k] = System::$dblink->query("SELECT " . $k . " FROM users WHERE " . $k . " = '" . $this->attr[$k] . "'");

				$result[$k] = $sql[$k]->num_rows;
			}

			return $result;
		}
		else if( is_string($key) && isset($key) )
		{
			$sql = System::$dblink->query("SELECT " . $key . " FROM users WHERE " . $key . " = '" . $this->attr[$key] . "'");

			$result = $sql->num_rows;

			return $result;
		}
		else
		{
			throw new \Exception("No haz definido un parámetro de búsqueda.", 3);
		}
	}

	public function newUser()
	{
		if( !isset($this->attr['username']) ) { $error = 'Por favor, introduce un nombre de usuario.'; }
		else if( !isset($this->attr['password']) ) { $error = 'Por favor, introduce una contraseña.'; }
		else if( !isset($this->attr['mail']) ) { $error = 'Por favor, introduce un correo electrónico.'; }
		else if( !isset($this->attr['gender']) ) { $error = 'Por favor, introduce un género.'; }
		else
		{
			if(!$this->countData('username') || !$this->countData('mail'))
			{
				$query = System::$dblink->query("INSERT INTO users(username, password, mail, gender) VALUES ('".$this->attr['username']."','".$this->attr['password']."','".$this->attr['mail']."','".$this->attr['gender']."')");
				if(!$query->mysql_error)
				{
					return true;
				}
			}
			else
			{
				$error = 'Lo sentimos, el nombre de usuario o e-mail ya han sido registrados.';
			}
		}
		throw new \Exception($error, 4);
	}
}


/*
username
password
mail
gender
motto
account_created
last_online
ip_last
ip_reg

credits > 50000
vip_points
activity_points > 10000
look > hr-115-42.hd-190-1.ch-215-62.lg-285-91.sh-290-62	
home_room > 3

*/
?>