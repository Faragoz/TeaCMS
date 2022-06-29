<?php

require '../../sys/_init.php';

header('Content-Type: application/json');
try
{
	$news = $widgets->getNews((integer) $_GET['new_id']);

	if($news):
		$user->setData('id', (int) $news['author']);

		$userData = $user->getData('id', 'username, look');

		$d = $hotel->unixToDate($news['published']);

		$response = array(
				'title' 	=> utf8_decode(htmlspecialchars($news['title'])),
				'body'		=> strip_tags($news['longstory']),
				'author'	=> utf8_decode(htmlspecialchars($userData['username'])),
				'look'		=> utf8_decode(htmlspecialchars($userData['look'])),
				'published'	=> $d['d'].' de '.$d['F'].' del '.$d['Y'].' a las '.$d['h'].':'.$d['s'].' '.$d['A']
			);
		exit(json_encode($response));
	else:
		$response = array(
				'title' 	=> '¡No existe!', 
				'body' 		=> '[center][p]Así es querido amigo... aunque no lo creas, aunque no te lo imagines, la noticia que buscas...[/p][p][b]¡NO EXISTE!... ¡CHAN, CHAN, CHAAAAN![/b][/p][p]Por favor, revisa que haz ingresado correctamente a la noticia o elige otra en nuestro apartado a la derecha.[/p][/center]',
				'author'	=> 'Tea System',
				'look'		=> 'ca-1807-62.ea-3168-64.lg-3078-82.sh-3016-110.hd-180-1.ch-3059-110.hr-3163-61',
				'published'	=> '¡Nunca existió!... ¡Tan, tan, taaaaan!...'
	        );
		exit(json_encode($response));
	endif;
}
catch (Exception $e)
{
	$response = array( 'error' => true , 'message' => $e->getMessage() );
	exit( json_encode($response) );
}
?>