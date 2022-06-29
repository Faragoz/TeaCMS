<?php
/**
 *	@author 	iStocker <skype:DeathsInTheSky>
 *	@category	Widgets
 *	@package 	Admin
 * 	@version 	ALPHA 1
 **/

namespace Tea;

if(!defined('__TEA__') || !__TEA__)
	exit;

class adminWidgets
{
	/**
	 * Obtener los mensajes de la adminsitración
	 *
	 * @param int $limit Límite de retorno
	 *
	 * @return array|bool Retorna un array en caso de existir entradas, flase si no.
	 **/
	public function getMessages($limit = 5)
	{
		$q = System::$db->rawQuery("SELECT * FROM admin_messages LIMIT ?", array($limit), true);
		if($q[1]):

			foreach($q[0] as $k => $v):
				$q[0][$k]['username'] = System::$db->rawQuery("SELECT username FROM users WHERE id = ?", array($v['user_id']))[0][0]['username'];
			endforeach;

			return $q[0];
		else:
			return false;
		endif;
	}
}
?>