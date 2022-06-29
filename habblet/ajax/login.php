<?php
require '../../sys/_init.php';

header('Content-Type: application/json');

try
{
	$user->emptyData();

	$pass = (!empty($_POST['pass'])) ? $sec->hashPass($_POST['pass']):'';

	$user->setData('username', 	$_POST['ue']);
	$user->setData('mail', 		$_POST['ue']);
	$user->setData('password', 	$pass);

	$isBan = ($user->isBan($sec->getRealIP())[1]) ? $user->isBan($sec->getRealIP()) : $user->isBan($_POST['ue']); 

	if($isBan[1]):
		$date = $hotel->unixToDate($isBan[0][0]['expire']);
		$response = array(
			'error'		=> true,
			'message'	=> 'Haz sido expulsado del hotel hasta el ' . $date['d'] . ' de ' . $date['F'] . ' del ' . $date['Y'] . ' a las ' . $date['h'] . ':' . $date['s'] . $date['A'] . ' por ' . utf8_decode(strip_tags($isBan[0][0]['reason']))
		);
		exit( json_encode($response) );
	endif;

	if($user->Login()):
		exit( json_encode(array('error'=>false)) );
	endif;
		
}
catch ( Exception $e )
{
	$response = array( 'error' => true , 'message' => $e->getMessage() );
	exit( json_encode($response) );
}
?>