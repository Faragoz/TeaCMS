<?php
/**
 *	@author 	iStocker <skype:DeathsInTheSky>
 * 	@category	System
 *	@package 	Unique
 * 	@version 	ALPHA 1
 **/

namespace Tea;

if(!defined('__TEA__') || !__TEA__)
    exit;

class System
{
	/**
	 * Atributo que contiene la conexión MySQL que se establece con la función self::Load();
	 *
	 * @var mysqli
	 **/
	public static $db;

	/**
	 * Atributo para comprobar que el sistema se ha iniciado.
	 *
	 * @var bool
	 **/
	public static $teasys = false;

	/**
	 * Función que comprueba la compatibilidad del sistema con el Framework.
	 **/
	public static function Init()
	{
		if(!phpversion() >= '5.4.9')
			die("<b>ERROR CRÍTICO</b> <br> La versión de PHP actual (" . phpversion() . ") no es compatible con el framework, por favor instala la versión correspondiente (5.4.9 o mayor).");
		if(!extension_loaded('mysqlnd'))
			die("<b>ERROR CRÍTICO</b> <br> El driver nativo de MySQL (<b>MySQLnd</b>) no se encuentra instalado. Por favor, instalalo para el correcto funcionamiento del sistema.");
		if(!extension_loaded('gd'))
			die("<b>ERROR CRÍTICO</b> <br> El módulo <b>GD</b> no se encuentra instalado. Por favor, instalalo para el correcto funcionamiento del sistema.");

		self::$teasys = true;
	}

	/**
	 * Función que inicia diferentes instancias del sistema, por ejemplo, MySQL.
	 **/
	public static function Load()
	{
		if(!self::$teasys)
			die("<b>ERROR CRÍTICO</b> <br> El sistema de <b>Tea Framework</b> no ha sido iniciado, por favor inicia el sistema antes de cualquier cosa, recuerda que esto comprueba la compatibilidad del servidor y el framework.");

		global $_settings;

		self::$db= new \DBManager($_settings['SQL']['host'], $_settings['SQL']['user'], $_settings['SQL']['pwd'], $_settings['SQL']['db'], $_settings['SQL']['port']);
	}
}
?>