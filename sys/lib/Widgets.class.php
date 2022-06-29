<?php
/**
 *	@author 	iStocker <skype:DeathsInTheSky>
 *	@category	Widgets
 *	@package 	Unique
 * 	@version 	ALPHA 1
 **/

namespace Tea;

if(!defined('__TEA__') || !__TEA__)
	exit;

class Widgets
{
	/**
	 * Obtener los grupos del usuario
	 *
	 * @param int 		$id  	ID del usuario
	 * @param bool 		$count 	Devolver cantidad de usuarios en el grupo o no
	 * @param int 		$limit 	Límite de grupos retornados
	 * @param string 	$data 	Datos del grupo a retornar
	 *
	 * @return array|bool 	Si se encuentran los grupos retorna la información de la consulta, en caso contrario retorna false
	 **/
	public function getGroups($id, $count = false, $limit = NULL, $data='*')
	{
		if(empty($id)) { $error = 'La id del usuario no puede estar vacía'; }
		else if(!is_int($id)) { $error = 'La id del usuario debe de ser un valor númerico real'; }
		else
		{
			$sql = "SELECT * FROM groups_membership WHERE user_id = ?";
			$params = array($id);
			if(!empty($limit))
				$sql .= " LIMIT ?";
				$params[] .= $limit;

			$q = System::$db->rawQuery($sql, $params, true);
			if($q[1]):
				foreach($q[0] AS $k => $v):
					$g[] = System::$db->rawQuery("SELECT $data FROM groups WHERE id = ?", array($q[0][$k]['group_id']), true)[0][0];
				endforeach;

				if($count)
					foreach($g as $k => $v):
						$g[$k]['count'] .=	System::$db->rawQuery("SELECT COUNT(group_id) FROM groups_membership WHERE group_id = ?", array($g[$k]['id']))[0][0]['COUNT(group_id)'];
					endforeach;

				return $g;
			else:
				return false;
			endif;
		}

		throw new \Exception($error, 300);
	}

	/**
	 * Obtener las salas del usuario
	 *
	 * @param int 		$id  		ID del usuario
	 * @param int 		$limit 		Límite de salas retornados
	 * @param string 	$data  		Datos a retornar
	 *
	 * @return array|bool 	Si se encuentran las salas retorna la información de la consulta, en caso contrario retorna false
	 **/
	public function getRooms($id, $limit = NULL, $order_by = NULL, $data = 'id, caption, description, users_now, score')
	{
		if(empty($id)) { $error = 'La id del usuario no puede estar vacía'; }
		else if(!is_int($id)) { $error = 'La id del usuario debe de ser un valor númerico real'; }
		else
		{	
			/*if(isset($order_by) && empty($limit))
			{
				$sql = "SELECT $data FROM rooms WHERE owner_id = ? ORDER BY ? DESC";
				$params = array($id, $order_by);
			}
			else if(!empty($limit) && !isset($order_by))
			{
				$sql = "SELECT $data FROM rooms WHERE owner_id = ? LIMIT ?";
				$params = array($id, $limit);
			}
			else if(isset($order_by) && !empty($limit))
			{
				$sql = "SELECT $data FROM rooms WHERE owner_id = ? ORDER BY ? DESC LIMIT ?";
				$params = array($id, $order_by);
			}*/
			if(!empty($limit))
			{
				$sql = "SELECT $data FROM rooms WHERE owner_id = ? LIMIT ?";
				$params = array($id, $limit);
			}
			else
			{
				$sql = "SELECT $data FROM rooms WHERE owner_id = ?";
				$params = array($id);
			}

			$q = System::$db->rawQuery($sql, $params, true);
			if($q[1]):
				if($limit > 1):
					return $q[0];
				else:
					return $q[0][0];
				endif;
			else:
				return false;
			endif;
		}
		
		throw new \Exception($error, 301);
	}

	/**
	 * Obtener los usuarios con más cantidad de x o y cosa
	 *
	 * @param string 	$type  	 	Tipo de top (columna de la tabla)
	 * @param string 	$data 		Datos a retornar >>SIEMPRE TERMINA CON COMA (,)<<
	 * @param int 		$limit 	 	Límite de datos a retornar
	 * @param string 	$orderBy 	Tipo de ordenamiento (ASC, DESC)
	 *
	 * @return Retorna la lista de usuarios
	 **/
	public function getTopUsers($type, $data = 'id, ', $limit = 5, $orderBy = "DESC")
	{
		if(!empty($type)) 
		{
			return System::$db->rawQuery("SELECT $data $type FROM users ORDER BY $type $orderBy LIMIT $limit")[0];
		}
		else
		{
			throw new \Exception("Debes de definir un tipo de TOP", 302);
		}
	}

	/**
	 * Obtener la última noticia
	 *
	 * @param int $id ID de la noticia a visualizar
	 *
	 * @return array|bool Datos de la consulta en caso de existir, en caso contrario retorna 'false'
	 **/
	public function getNews( $id = NULL)
	{
		if(!empty($id) && is_int($id)):
			$q = System::$db->rawQuery("SELECT * FROM cms_news WHERE id = ?", array($id), true);
			if($q[1])
				return $q[0][0];
			return false;
		else:
			$q = System::$db->rawQuery("SELECT * FROM cms_news ORDER BY id DESC LIMIT 1");
			if($q):
				return $q[0][0];
			else:
				return false;
			endif;
		endif;
	}

	/**
	 * Obtener la lista de las últimas noticias
	 *
	 * @param string	$data  	Datos a retornar
	 * @param int 		$limit 	Límite de datos a retornar
	 *
	 * @return array|bool Retorna la lista si hay noticias, false si no.
	 **/
	public function getListNews($data = '*', $limit = 5)
	{
		$query = System::$db->rawQuery("SELECT $data FROM cms_news ORDER BY id DESC LIMIT ?", array($limit), true);
		if($query[1])
			return $query[0];
		else
			return false;
	}

	/**
	 * Obtener lista de usuarios por rango
	 *
	 * @param int 		$rank Buscar usuarios por rango 'x'
	 * @param string 	$data Datos a retornar
	 *
	 *@return array|bool Retorna la lista si existen usuarios, false si no.
	 **/
	public function getRankUsers($rank, $data = 'username, look, motto, working')
	{
		if(!empty($rank))
		{
			$q = System::$db->rawQuery("SELECT $data FROM users WHERE rank = ?", array($rank), true);
			if($q[1]):
				return $q;
			else:
				return false;
			endif;
		}
		else
		{
			throw new \Exception('Debes de definir un rango',303);
		}
	}

	/**
	 * Obtener las salas o grupos recomendados
	 *
	 * @param int $type 	1 = salas, 2 = grupos
	 * @param int $limit 	Límite de datos a retornar
	 *
	 * @return array|bool Retorna la lista si existen salas/grupos recomendados, false si no.
	 **/
	public function getRecommended($type, $limit = 5)
	{
		if($type == 1)
		{
			$sql = "SELECT * FROM cms_recommended WHERE type = ? ORDER BY id DESC";
			$params = array('room');

			if(isset($limit))
				if(is_int($limit)):
					$sql .= ' LIMIT ?';
					$params[] .= $limit;
				else:
					throw new \Exception('El límite debe de ser un valor númerico', 304); 
				endif;

			$q = System::$db->rawQuery($sql, $params, true);
			if($q[1]):
				foreach($q[0] as $k => $v):
					$return[] = $this->getRoom($v['id_rec']);
				endforeach;

				return $return;
			else:
				return false;
			endif;
		}
		else if($type == 2)
		{
			$sql = "SELECT * FROM cms_recommended WHERE type = ? ORDER BY id DESC";
			$params = array('group');

			if(isset($limit))
				if(is_int($limit)):
					$sql .= ' LIMIT ?';
					$params[] .= $limit;
				else:
					throw new \Exception('El límite debe de ser un valor númerico', 304); 
				endif;

			$q = System::$db->rawQuery($sql, $params, true);
			if($q[1]):
				foreach($q[0] as $k => $v):
					$return[] = $this->getGroup($v['id_rec']);
				endforeach;

				return $return;
			else:
				return false;
			endif;
		}
		else
		{
			throw new \Exception('No se reconoce el tipo de recomendación', 304);
		}
	}

	/**
	 * Obtener la información de un grupo según su ID
	 *
	 * @param int 		$id 	La ID del grupo
	 * @param string 	$data 	Qué datos retornar
	 *
	 * @return array|bool Retorna la lista si existe el grupos, false si no.
	 **/
	public function getGroup($id, $data = '*')
	{
		if(is_int($id))
		{
			$sql = "SELECT $data FROM groups WHERE id = ?";
			$param = array($id);

			$q = System::$db->rawQuery($sql, $param, true);
			if($q[1])
				return $q[0][0];
			else
				return $q[1];
		}
		else
		{
			throw new \Exception('La ID del grupo debe de ser un valor númerico', 305);
		}
	}

	/**
	 * Obtener la información de una sala según su ID
	 *
	 * @param int 		$id 	La ID del grupo
	 * @param string 	$data 	Qué datos retornar
	 *
	 * @return array|bool Retorna la lista si existe el grupos, false si no.
	 **/
	public function getRoom($id, $data = '*')
	{
		if(is_int($id))
		{
			$sql = "SELECT $data FROM rooms WHERE id = ?";
			$param = array($id);

			$q = System::$db->rawQuery($sql, $param, true);
			if($q[1])
				return $q[0][0];
			else
				return $q[1];
		}
		else
		{
			throw new \Exception('La ID del la sala debe de ser un valor númerico', 306);
		}
	}
}
?>