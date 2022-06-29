<?PHP
/**
*	@author 	iStocker <skype:DeathsInTheSky>
* 	@category	Config
*	@package 	Unique
* 	@version 	ALPHA 1
**/

global $_settings;

# Configuración global 
$_settings['server']['timezone']	=		'America/Mexico_City';

$_settings['site']['url'] 			= 		'http://www.drakohotel.net/'; // Se usará en la configuración de RainTPL
$_settings['site']['sub']			=		'';
$_settings['site']['name']			= 		'Drako Hotel';
$_settings['site']['sname']			= 		'Drako';
$_settings['site']['client']		= 		'http://adf.ly/5Zsls';

# Configuración de la administración
$_settings['admin']['path']			=		'admin/';
$_settings['admin']['asset']		=		'sys/tpl/Admin/';
// Configuración RainTPL >> Admin
$_settings['admin']['tpl_dir']		=		'../sys/tpl/Admin/';
$_settings['admin']['cache_dir']	=		'../sys/tmp/admin/';

# Redes sociales, radio, etcétera
$_settings['twitter']['name']		=		'DrakoHotel_';
$_settings['twitter']['widgetid']	=		'330040171691122688';
$_settings['facebook']['page']		=		'DrakoHotel/360908437285238?fref=ts';
$_settings['radio']['ip']			=		'198.50.101.130';
$_settings['radio']['port']			=		'9900';

# Configuración MySQL
$_settings['SQL']['host']			=		'p:127.0.0.1';	// Si está vacío el valor por defecto es 127.0.0.1
$_settings['SQL']['port']			=		'3306';
$_settings['SQL']['user']			=		'';			// Si está vacío el valor por defecto es root
$_settings['SQL']['pwd']			= 		'';
$_settings['SQL']['db']				=		'';

# Configuración RainTPL
$_settings['Rain']['tpl_dir']		=		'sys/tpl/Light/';
$_settings['Rain']['cache_dir']		=		'sys/tmp/';
$_settings['Rain']['tpl_ext']		=		'tpl';
$_settings['Rain']['debug']			= 		true;


# Configuración por defecto (si gustas la puedes cambiar)
$_settings['Default']['motto']		=		'Bienvenido a ' . $_settings['site']['name'];
$_settings['Default']['credits']	=		50000;
$_settings['Default']['pixels']		=		10000;
$_settings['Default']['vip_points']	=		0;
$_settings['Default']['look']		=		'hr-115-42.hd-180-1.ch-215-62.lg-285-91.sh-290-62';
$_settings['Default']['home_room']	=		3;
?>