<?php
/**
 *	@author 	iStocker <skype:DeathsInTheSky>
 *	@author 	LittleJ	>> crossSRF(), handleCSRF()
 * 	@category	Security
 *	@package 	Unique
 * 	@version 	ALPHA 1
 **/

namespace Tea;

if(!defined('__TEA__') || !__TEA__)
    exit;

class Security 
{
	/**
	 * Retorna un array con diferentes hash para comprobar el login.
	 *
	 * @param string Contraseña
	 *
	 * @return array Contraseña cifrada
	 **/
	public function hashPass($str)
	{
		$hash[] = sha1($str);
		$hash[]	.= md5($str);
		$hash[] .= sha1('324@ 52#QMFe3E222%%'.md5($str));

		return $hash;
	}

	/**
	 * Obtenemos la IP real del usuario.
	 *
	 * @return string IP del usuario
	 **/
	public function getRealIP()
	{
		if(!empty($_SERVER['HTTP_CLIENT_IP']))
			$ip = $_SERVER['HTTP_CLIENT_IP'];

		else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

		else
			$ip = $_SERVER['REMOTE_ADDR'];

		return $ip;
	}

    /**
     * Creamos un csrfToken único para después comprobar que existe.
     *
     * @return string csrfToken único
     **/
    public static function handleCSRF()
    {
        if(session_id() == '') {
            session_start();
        }
        if(empty($_SESSION['csrfToken']))
        {
            $_SESSION['csrfToken'] = md5(rand());
        }
        
        return $_SESSION['csrfToken'];
    }

    /**
	 * Comprobamos que el csrfToken exista y sea igual al que se creó.
	 *
	 * @return bool true en caso de ser diferente el token existente al enviado
	 **/
	public static function crossSRF()
    {
        if(session_id() == '') {
            session_start();
        }
        if(empty($_POST['csrfToken']))
        {
            return false;
        }
        return $_POST['csrfToken'] != $_SESSION['csrfToken'];
    }
}
?>