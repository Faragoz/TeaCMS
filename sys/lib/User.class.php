<?php
/**
 *	@author 	iStocker <skype:DeathsInTheSky>
 * 	@category	User
 *	@package 	Unique
 * 	@version 	ALPHA 3
 **/

namespace Tea; 

if(!defined('__TEA__') || !__TEA__)
    exit;

class User
{
	/**
	 * Propiedad que contiene la información del usuario que se usarán en múltiples funciones del sistema.
	 *
	 * @var array
	 **/
	public $attr;

	/**
	 * Función con la que añadiremos parámetros a la propiedad $attr
	 *
	 * @param array|string 	$attr 	En caso de ser un array contiene el nombre y el valor de los atributos. En caso de ser un string el nombre del atributo.
	 * @param string 		$value 	Contiene el valor del atributo.
	 **/
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
						if(is_array($value) && sizeof($value))
						{
							foreach($value as $k)
							{
								$this->attr[$attr][] .= utf8_encode(htmlspecialchars($k));
							}
						}
						else
						{
							$this->attr[$key] = utf8_encode(htmlspecialchars($value));
						}
					}
				}	
				else
				{
					throw new \Exception("El id, rango, créditos y pixeles deben de ser valores numéricos reales", 1);
				}
			}
			else
			{
				foreach($attr as $key => $value)
				{
					if(is_array($value) && sizeof($value))
					{
						foreach($value as $k)
						{
							$this->attr[$attr][] .= utf8_encode(htmlspecialchars($k));
						}
					}
					else
					{
						$this->attr[$key] = utf8_encode(htmlspecialchars($value));
					}
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
					throw new \Exception("El id, rango, créditos y pixeles deben de ser valores numéricos reales", 1);
				}
			}
			else
			{
				if(is_array($value) && sizeof($value))
				{
					foreach($value as $k)
					{
						$this->attr[$attr][] .= utf8_encode(htmlspecialchars($k));
					}
				}
				else
				{
					$this->attr[$attr] = utf8_encode(htmlspecialchars($value));
				}
			}
		}
	}

	/**
	 * Función para limpiar valores la propiedad $attr. 
	 * Si el atributo está vacío limpia completamente el atributo.
	 *
	 * @param array|string $key Si es un array limpia el valor del atributo en el que coincidan los nombres. Misma función tratandolo como string pero limpia un único valor.
	 **/
	public function emptyData($key = NULL)
	{
		if(is_array($key) && sizeof($key))
		{
			foreach($key as $k)
			{
				unset($this->attr[$k]);
			}
		}
		else if(isset($key))
		{
			unset($this->attr[$key]);
		}
		else
		{
			unset($this->attr);
		}
	}

	/**
	 * Función con la que obtenemos los datos del usuario, $key trabaja con los atributos de la propiedad $attr.
	 *
	 * @param string $data 	Contiene los datos que deseas obtener del usuario.
	 * @param string $key 	Contiene los patrones de búsqueda que coinciden con el usuario.
	 * @param string $limit Contiene un límite de retorno de información de usuarios.
	 *
	 * @return Array unidimensional ó multidimensional dependiendo de su uso con la información del usuario.
	 **/
	public function getData($key = 'id', $data = '*', $limit = NULL)
	{
		if(isset($this->attr[$key]))
		{
			$sql = "SELECT $data FROM users WHERE $key = ? ";
			$params[] = $this->attr[$key];

			if(isset($limit)):
				$sql .= "LIMIT ?";
				$params[] .= $limit;
			endif;

			$data = System::$db->rawQuery($sql, $params, true);

			if(!$data[1])
				throw new \Exception("El usuario que buscas no existe", 2);
			
			return $data[0][0];
		}
		else
		{
			throw new \Exception("No haz definido un parámetro de búsqueda", 3);
		}
	}

	/**
	 * Función que cuenta los usuarios que coincidan con un patrón de datos.
	 *
	 * @param array|string $key En caso de ser un array busca múltiples coincidencias en los patrones. En caso de ser un string busca una coincidencia con el patrón establecido.
	 *
	 * @return Array unidimensional ó multidimensional dependiento de su uso.
	 **/
	public function countData($key)
	{
		if(is_array($key) && sizeof($key))
		{
			foreach($key as $k)
			{
				$sql[$k] = System::$db->rawQuery("SELECT $k FROM users WHERE $k = ?", array($this->attr[$k]), true);

				$result[$k] = $sql[$k][1];
			}

			return $result;
		}
		else if( is_string($key) && isset($key) )
		{
			$sql = System::$db->rawQuery("SELECT $key FROM users WHERE $key = ?", array($this->attr[$key]), true);

			return $sql[1];
		}
		else
		{
			throw new \Exception("No haz definido un parámetro de búsqueda", 3);
		}
	}

	/**
	 * Función para registrar un nuevo usuario usando la propiedad attr
	 *
	 * @return bool
	 **/

	public function newUser()
	{
		if( !isset($this->attr['username']) || empty($this->attr['username'])) 			{ $error = 'Por favor, introduce un nombre de usuario.'; }
		else if( !isset($this->attr['password']) || empty($this->attr['password']) ) 	{ $error = 'Por favor, introduce una contraseña.'; }
		else if( !isset($this->attr['mail']) || empty($this->attr['mail']) ) 			{ $error = 'Por favor, introduce un correo electrónico.'; }
		else if( !isset($this->attr['gender']) || empty($this->attr['gender']) ) 		{ $error = 'Por favor, introduce un género.'; }
		else
		{
			if(!$this->countData('username') && !$this->countData('mail'))
			{
				$insertData = $this->attr;

				if( System::$db->insert('users', $insertData) )
					return true;
			}
			else
			{
				$error = 'Lo sentimos, el nombre de usuario o e-mail ya han sido registrados';
			}
		}
		throw new \Exception($error, 4);
	}

	/**
	 * Comprobamos si el usuario está expulsado del hotel
	 *
	 * @param string 	$pattern 	Patrón de búsqueda (nombre de usuario o IP).
	 *
	 * @return array Devuelve la información de la consulta
	 **/
	public function isBan($pattern)
	{
		if(!empty($pattern))
		{
			$query = System::$db->rawQuery("SELECT * FROM bans WHERE value = ?", array($pattern), true);
			if (!$query[1])
				return false;
			else
				return $query;
		}
		else
		{ 
			throw new \Exception("No haz ingresado un nombre de usuario o IP para la búsqueda", 5); 
		}

	}

	/**
	 * Comprobar los datos del usuario y crear sesión.
	 *
	 * @param bool 	 $remember 	Mantener el usuario conectado por 1 año
	 **/
	public function Login($remember = false)
	{
		if(empty($this->attr['username']) || empty($this->attr['mail'])) { $error = "No haz ingresado un nombre de usuario o e-mail"; }
		else if(empty($this->attr['password'])) { $error = "No haz ingresado una contraseña"; }
		else
		{
			if( !System::$db->rawQuery("SELECT id FROM users WHERE (username = ? OR mail = ?) ", array($this->attr['username'], $this->attr['mail']), true)[1] )
				throw new \Exception('El nombre de usuario o e-mail no existe en el sistema', 6);

			if($remember)
			{
				##
				#	Recordar usuario -> cookies
				##
			}
			else
			{
				$pass = $this->attr['password'];
				$params = array($this->attr['username'], $this->attr['mail']);

				if(is_array($pass) && sizeof($pass))
				{
					for($i=0; $i <= sizeof($pass)-1; ++$i)
					{
						if($i < sizeof($pass)-1):
							$sql .= 'password = ? OR ';
						else:
							$sql .= 'password = ?';
						endif;
						$params[] .= $pass[$i];
						
					}
				}

				if( !System::$db->rawQuery("SELECT id FROM users WHERE (username = ? OR mail = ?) AND ($sql)", $params, true)[1] )
					throw new \Exception('La contraseña no coincide con el el nombre de usuario o e-mail', 6);

				$userData = System::$db->rawQuery("SELECT * FROM users WHERE (username = ? OR mail = ?) AND ($sql)", $params)[0][0];
				
				$_SESSION = array(
						'login'		=> true,
						'id' 		=> (int) $userData['id'],
						'rank'		=> (int) $userData['rank'],
					);
				return true;
			}
		}

		throw new \Exception($error, 6);
	}

	/**
	 * Actualizar la información del usuario usando la propiedad attr.
	 *
	 * @param array|string 	$data 	Información a actualizar en caso de ser array, campo en caso de ser string.
	 * @param int|string 	$value 	Información
	 *
	 * @return bool Retorna true si se realizó la consulta, false si no.
	 **/
	public function updateUser($data, $value = NULL)
	{
		if(!empty($this->attr['id']))
		{
			if($this->countData('id'))
			{
				if(is_array($data) && sizeof($data))
				{
					foreach($data as $k => $v):
						if(isset($k) && isset($v)):
							$updateData[$k] = $v;
						else:
							throw new \Exception('No puedes dejar los valores vacíos (índice $k)', 7);
						endif;
					endforeach;
				}
				else
				{
					if(isset($data) && isset($value)):
						$updateData[$data] = $value;
					else:
						throw new \Exception('No puedes dejar los valores vacíos', 7);
					endif;
				}

				System::$db->where('id', $this->attr['id']);
				$update = System::$db->update('users', $updateData);

				return $update;
			}
			else
			{
				throw new \Exception('El usuario con ésa ID no existe', 7);
			}
		}
		else
		{
			throw new \Exception('No haz ingresado la ID del usuario', 7);
		}
	}

	/**
	 * Conseguir los permisos del usuario
	 *
	 * @return Permisos del usuario
	 **/
	public function userFuses()
	{
		if(!empty($this->attr['rank']))
		{
			$q = System::$db->query("SELECT * FROM cms_fuses");

			foreach($q as $kk):
				if($kk['minrank'] <= $this->attr['rank'])
					foreach($kk as $k => $v):
						if(is_string($v))
							$r[$v] = 1;
					endforeach;
			endforeach;

			return $r;
		}
		else
		{
			throw new \Exception('No haz definido el rango del usuario', 8);
		}
	}
}
?>