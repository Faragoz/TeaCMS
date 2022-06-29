<?php
require 'sys/_init.php';

if($_SESSION['login'])
	header("LOCATION: me");

	use Rain\Tpl;

	Tpl::configure( $_settings['Rain'] );

	$tpl = new Tpl;

	$site = array(
			'name'		=> 	$_settings['site']['name'],
			'subname'	=> 	'Haz amig@s, súmate a la diversión y date a conocer.',
			'online'	=>	$hotel->serverStatus('users_online')['users_online'],
			'url'		=> 	$_settings['site']['url'],
			'sub'		=>	$_settings['site']['sub'],
			'path'		=>	$_settings['Rain']['tpl_dir'],
			'csrfToken'	=>  Tea\Security::handleCSRF()
		);

	$tpl->assign('site', $site);

	$tpl->draw("index");

?>