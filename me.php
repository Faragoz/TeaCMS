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
			'id'		=>	1,
			'online'	=>	$hotel->serverStatus('users_online')['users_online'],
			'url'		=> 	$_settings['site']['url'],
			'sub'		=>	$_settings['site']['sub'],
			'path'		=>	$_settings['Rain']['tpl_dir'],
			'csrfToken'	=>  Tea\Security::handleCSRF()
		);

	$tpl->assign('site', $site);
	$tpl->assign('twitter', $_settings['twitter']);
	$tpl->assign('radio', $_settings['radio']);
	$tpl->assign('facebook', $_settings['facebook']);
	$tpl->assign('rooms', $widgets->getRooms($userData['id'], 5));
	$tpl->assign('groups', $widgets->getGroups($userData['id'], true, 5, 'id, Caption, description'));
	$tpl->assign('user', $userData);

	##
	# Noticias
	##
	$list = $widgets->getListNews('id, title, shortstory');
	$tpl->assign('list', $list);

	$tpl->draw("me");
?>