<?php
require 'sys/_init.php';

if(!$_SESSION['login'])
	header("LOCATION: index");
//if($_SERVER['HTTP_REFERER'] != $_settings['site']['client'])
//	header("LOCATION: ".$_settings['site']['client']);

$user->updateUser('auth_ticket', $hotel->GenerateTicket());

	use Rain\Tpl;

	Tpl::configure( $_settings['Rain'] );

	$tpl = new Tpl;

	$site = array(
			'name'		=> 	$_settings['site']['name'],
			'client'	=> 	$_settings['site']['client'],
			'sname'		=> 	'Cliente',
			'url'		=> 	$_settings['site']['url'],
			'sub'		=>	$_settings['site']['sub'],
			'path'		=>	$_settings['Rain']['tpl_dir'],
			'csrfToken'	=>  Tea\Security::handleCSRF()
		);

	$tpl->assign('site', $site);
	$tpl->assign('user', $userData);

	$tpl->draw("client");

?>