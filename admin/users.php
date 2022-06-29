<?php
require '../sys/_init.php';

if(!$_SESSION['admin.login'])
	header("LOCATION: index");

use Rain\Tpl;
	$raintpl = array(
			'tpl_dir' 	=> 	$_settings['admin']['tpl_dir'],
			'cache_dir'	=>	$_settings['admin']['cache_dir'],
			'tpl_ext'	=>	$_settings['Rain']['tpl_ext']
		);

	Tpl::configure( $raintpl );

	$tpl = new Tpl;

	$site = array(
			'name'		=> 	$_settings['site']['name'],
			'sec'		=> 	'Noticias',
			'url'		=> 	$_settings['site']['url'],
			'sub'		=>	$_settings['site']['sub'],
			'path'		=>	$_settings['admin']['asset'],
			'admin'		=>	$_settings['admin']['path'],
			'csrfToken'	=>  $_SESSION['csrfToken']
		);

	$tpl->assign('site', $site);
	$tpl->assign('user', $userData);

	$tpl->draw("users");
?>