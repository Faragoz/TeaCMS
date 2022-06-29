<?php
require 'sys/_init.php';

if(!$_SESSION['login'])
	header("LOCATION: index");

use Rain\Tpl;

	Tpl::configure( $_settings['Rain'] );

	$tpl = new Tpl;

	$site = array(
			'name'		=> 	$_settings['site']['name'],
			'sname'		=> 	$_settings['site']['sname'],
			'client'	=> 	$_settings['site']['client'],
			'id'		=>	5,
			'online'	=>	$hotel->serverStatus('users_online')['users_online'],
			'url'		=> 	$_settings['site']['url'],
			'sub'		=>	$_settings['site']['sub'],
			'path'		=>	$_settings['Rain']['tpl_dir'],
			'csrfToken'	=>  Tea\Security::handleCSRF()
		);

	$tpl->assign('site', $site);
	$tpl->assign('user', $userData);
	$tpl->assign('list', $widgets->getListNews('id, title, shortstory, image'));

	$tpl->draw("settings");
?>