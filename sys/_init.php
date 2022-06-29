<?PHP
/**
*	@author 	iStocker <skype:DeathsInTheSky>
*	@category	Init
*	@package 	Unique
* 	@version 	ALPHA 1
**/

# Definimos variables globales
define('__TEA__', true);
define('__VERSION__', 1);

# Aplicamos configuración global obligatoria para el correcto funcionamiento del sistema
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', true);

# Configuración opcional (sólo por estética)
ini_set('error_reporting', E_ALL ^ E_NOTICE);

# Iniciamos las sesiones
session_start();

# Cargamos la configuración & modulos.
require '_config.php';
// Librerias creadas para el sistema Tea Framework
require 'lib/System.class.php';
require 'lib/Security.class.php';
require 'lib/Hotel.class.php';
require 'lib/User.class.php';
// Widgets creados para el sistema Tea Framework
require 'lib/Widgets.class.php';
require 'lib/adminWidgets.class.php';
// Librerias creadas por terceros
require 'lib/Rain/Tpl.php';
require 'lib/securimage/securimage.php';
require 'lib/DBManager.class.php';

# Comprobamos que el servidor es compatible con el Framework e iniciamos el sistema.
try
{
	Tea\System::Init();
	Tea\System::Load();

	// Iniciamos clases
	$sec 			= new Tea\Security();
	$hotel 			= new Tea\Hotel();
	$user  			= new Tea\User();
	$widgets 		= new Tea\Widgets();
	$adminWidgets 	= new Tea\adminWidgets();

	// Creamos un csrfToken para protección
	$_SESSION['csrfToken'] = Tea\Security::handleCSRF();
	// Mostramos error si el csrfToken no es igual
	if(Tea\Security::crossSRF())
		throw new \Exception('csrfToken inválido', 100009);


	if($_SESSION['login'] || $_SESSION['admin.login'])
	{
		$user->setData('id', $_SESSION['id']);
		$userData = $user->getData();
		$user->setData('rank', $userData['rank']);
		$fuses = $user->userFuses();
	}
}
catch(Exception $e)
{
	echo "Error (" . htmlspecialchars($e->getCode()) . ") <br> " . htmlspecialchars($e->getMessage()) . "<br>";
}
?>