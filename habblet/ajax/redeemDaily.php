<?php
require '../../sys/_init.php';

try
{
	if($_SESSION['login'])
	{
		if(!$_SESSION['redeemDaily'])
		{
			$user->setData('id', $userData['id']);
			$data = array(
				'credits'			=> $userData['credits'] + 500,
				'activity_points'	=> $userData['activity_points'] + 200
			);

			if($user->updateUser($data)):
				$_SESSION['redeemDaily'] = true;
				exit(json_encode(array('error'=>false, 'message'=>'¡Eres 500 créditos y 200 píxeles más rico ahora!')));
			else:
				exit(json_encode(array('error'=>true, 'message'=>'¡Prueba de nuevo!')));
			endif;
		}
		else
		{
			exit(json_encode(array('error'=>true, 'message'=>'¡Ya haz hecho uso de ésta herramienta, no abuses!')));
		}
	}
}
catch(Exception $e)
{
	exit(json_encode(array('error'=>true, 'message'=>$e->getMessage())));
}
?>