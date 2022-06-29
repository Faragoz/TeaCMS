<?php
require '../../sys/_init.php';

header('Content-Type: application/json');

try
{
	$securimage = new Securimage();

	if(!$securimage->check($_POST['captcha_code'])):
		$response = array( 'error' => true, 'message' => 'Captcha incorrecto, por favor intenta de nuevo.' );
		exit( json_encode( $response ) );
	endif;

	$user->emptyData();

	$pass = (!empty($_POST['pass'])) ? $sec->hashPass($_POST['pass']):'';

	$data = array(
			'username' 			=> $_POST['username'],
			'password' 			=> $pass[2],
			'mail'				=> $_POST['email'],
			'gender'			=> $_POST['gender'],
			'motto'				=> $_settings['Default']['motto'],
			'credits'			=> $_settings['Default']['credits'],
			'activity_points'	=> $_settings['Default']['pixels'],
			'vip_points'		=> $_settings['Default']['vip_points'],
			'look'				=> $_settings['Default']['look'],
			'home_room'			=> $_settings['Default']['home_room'],
			'account_created'	=> time(),
			'last_online'		=> time(),
			'ip_last'			=> $sec->getRealIP(),
			'ip_reg'			=> $sec->getRealIP()
		);

	$user->setData($data);

	if($user->newUser())
		$user->login($data['username'], $pass);

		exit( json_encode( array('error'=>false) ) );
}
catch (Exception $e)
{
	$response = array( 'error' => true , 'message' => $e->getMessage() );
	exit( json_encode($response) );
}

?>