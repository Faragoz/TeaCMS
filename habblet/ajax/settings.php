<?php
require '../../sys/_init.php';
header('Content-Type: application/json');

if(!$_SESSION['login'])
	header("LOCATION: /index");
try
{	
	$response = array();

	// Actualizar misión
	if(!empty($_POST['motto']))
	{
		if(strlen($_POST['motto'])  > 0 && strlen($_POST['motto'])  <= 32)
		{
			if($_POST['motto'] != $userData['motto'])
				if($user->updateUser('motto', $_POST['motto'])):
					$response[] = array('error'=>false, 'message'=>'Misión actualizada');
				else:
					throw new Exception('No se pudo actualizar la misión, intenta de nuevo');
				endif;
		}
		else
		{
			throw new Exception("La misión es demasiado corta o demasiado larga");
		}
	}
	// Actualizar peticiones de amistad
	if(isset($_POST['friends']) && $_POST['friends'] != $userData['block_newfriends'])
	{
		if($user->updateUser('block_newfriends', $_POST['friends'])):
			$response[] = array('error'=>false, 'message'=>'Peticiones de amistad actualizadas');
		else:
			throw new Exception('No se pudieron actualizar la peticiones de amistad, intenta de nuevo');
		endif;
	}

	exit(json_encode($response));
}
catch (Exception $e)
{
	$response = array(array( 'error' => true , 'message' => $e->getMessage() ));
	exit( json_encode($response) );
}
?>