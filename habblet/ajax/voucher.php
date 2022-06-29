<?php
require '../../sys/_init.php';

try
{
	if($_SESSION['login'])
	{
		$redeemVoucher = $hotel->redeemVoucher($userData, $_POST['voucher']);
		if($redeemVoucher):
			exit( json_encode( array('error'=>false, 'message'=>"Código voucher (".$_POST['voucher'].") canjeado con éxito" ) ) );
		else:
			exit( json_encode( array('error'=>true, 'message'=>'Ocurrió un error canjeando el código voucher, intenta de nuevo') ) );
		endif;
	}
}
catch(Exception $e)
{
	exit( json_encode( array('error'=>true, 'message'=>$e->getMessage()) ) );
}
?>