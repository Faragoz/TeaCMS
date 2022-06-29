<?php

require 'sys/_init.php';

try
{
	/*$userData = array(
			"id" 		=> 1,
			"username" 	=> "iStocker",
			"email" 	=> NULL,
			"password" 	=> NULL,
			"ssoTicket" => NULL,
			"rank" 		=> NULL,
			"credits" 	=> NULL,
			"pixels" 	=> NULL,
			"look" 		=> NULL,
			"motto" 	=> NULL
		);*/
	//$users = new Tea\Users();
	//$sec = new Tea\Security();

	//$users->setData(array('username'=>'Prueba<hr>', 'id'=> 2, 'vip_points'=>15));

	//$users->setData('id', 11);
	

	/*$users->setData('username', 'iStocker');
	$users->setData('password', md5('test123'));
	$users->setData('mail', 'cucki@hotmail.es');
	$users->setData('gender', 'm');
	*///$users->setData('rank', 3);
	//$getData = $users->getData('username, mail, rank', 'id');
	
	//print_r($getData);

	echo "<pre>";
	
	if($adminMessages = $adminWidgets->getMessages())
	{
		print_r($adminMessages);
	}
	else
	{
		throw new Exception('No hay mensajes');
	}
}
catch(Exception $e)
{
	echo "Error (" . htmlspecialchars($e->getCode()) . ") <br> " . htmlspecialchars($e->getMessage()) . "<br>";
}
?>