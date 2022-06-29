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
			'id'		=> 	2,
			'online'	=>	$hotel->serverStatus('users_online')['users_online'],
			'url'		=> 	$_settings['site']['url'],
			'sub'		=>	$_settings['site']['sub'],
			'path'		=>	$_settings['Rain']['tpl_dir'],
			'csrfToken'	=>  Tea\Security::handleCSRF()
		);

	$tpl->assign('site', $site);
	$tpl->assign('user', $userData);

	##
	# Noticias
	##
	$news = $widgets->getNews((int) $_GET['new_id']);
	$list = $widgets->getListNews('id, title, shortstory, longstory');

	if($news)
	{
		$d = $hotel->unixToDate($news['published']);

		$response = array(
				'id'		=> $news['id'],
				'title' 	=> $news['title'],
				'body'		=> strip_tags($news['longstory']),
				'author'	=> $userData['username'],
				'look'		=> $userData['look'],
				'published'	=> $d['d'].' de '.$d['F'].' del '.$d['Y'].' a las '.$d['h'].':'.$d['s'].' '.$d['A']
			);
		
		$tpl->assign('news', $response);
	}

	if($list)
	{
		$tpl->assign('list', $list);
	}

	##
	# Staff
	##
	$tpl->assign('owner', $widgets->getRankUsers(8));
	$tpl->assign('manager', $widgets->getRankUsers(7));
	$tpl->assign('mod', $widgets->getRankUsers(6));
	$tpl->assign('comod', $widgets->getRankUsers(5));
	$tpl->assign('colab', $widgets->getRankUsers(4));
	// Linces
	$tpl->assign('lince', $widgets->getRankUsers(3));

	##
	# TOP
	##
	$tpl->assign('topCredits', $widgets->getTopUsers('credits', 'username, look, '));
	$tpl->assign('topPixels', $widgets->getTopUsers('activity_points', 'username, look, '));
	$tpl->assign('topRespects', $widgets->getTopUsers('respect', 'username, look, '));
	$tpl->assign('roomsRecommended', $widgets->getRecommended(1, 3));
	$tpl->assign('groupsRecommended', $widgets->getRecommended(2, 3));

	$tpl->draw('community');
?>