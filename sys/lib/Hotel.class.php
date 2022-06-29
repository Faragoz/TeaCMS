<?php
/**
 *	@author 	iStocker <skype:DeathsInTheSky>
 * 	@category	Hotel
 *	@package 	Unique
 * 	@version 	1
 **/

namespace Tea;

if(!defined('__TEA__') || !__TEA__)
    exit;

class Hotel
{
	/**
	 * Retorna los datos del servidor.
	 *
	 * @param string 	$data 	Datos para retornar de la consulta
	 * @param bool 		$on 	Retornar datos SÓLO si el servidor está encendido
	 **/
	public function serverStatus($data = '*', $on = false)
	{
		if(!$on):
			$sql = "SELECT $data FROM server_status";
		else:
			$sql .= "SELECT $data FROM server_status WHERE status = 0";
		endif;

		$q = System::$db->query($sql)[0];
		
		if(!$on):
			return $q;
		else:
			if($q['status']):
				return $q;
			else:
				throw new \Exception("El servidor no está encendido", 100);
			endif;
		endif;
	}

	/**
	 * Convierte una fecha unix a una fecha normal
	 *
	 * @param string $unix Fecha unix
	 * @param string $type Cómo retornar la fecha y qué datos retornar
	 *
	 * @return array Fecha normal con formato
	 **/
	public function unixToDate($unix, $type = array("d","F","Y","h","s","A"))
	{
		if(empty($unix))
			throw new \Exception('No haz ingresado un tiempo UNIX', 101);

		$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"); 
		$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

		$days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
		$dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sabádo", "Domingo");

		if(is_array($type)):
			foreach($type as $k):
				$str = str_ireplace($months, $meses, date($k, $unix));
				$str = str_ireplace($days, $dias, $str);
				$date[$k] = $str;
			endforeach;
		else:
				$str = str_ireplace($months, $meses, date($type, $unix));
				$str = str_ireplace($days, $dias, $str);
				$date[$type] = $str;
		endif;
		
		return $date;
	}

	/**
	 * Comprobar si existe un código voucher y canjearlo
	 *
	 * @param int 		$userData 	Datos del usuario
	 * @param string 	$voucher 	Código voucher
	 *
	 * @return bool Retorna true cuando la consulta se realizo con éxito y false cuando no.
	 **/
	public function redeemVoucher($userData, $voucher)
	{
		if(!empty($voucher) || !empty($userData))
		{
			$query = System::$db->rawQuery("SELECT * FROM vouchers WHERE code = ?", array($voucher), true);
			if($query[1]):
				if($query[0][0]['credits'] || $query[0][0]['pixels'] || $query[0][0]['vip_points'])
				{
					if($query[0][0]['credits'])
						$updateData['credits'] = $userData['credits'] + $query[0][0]['credits'];
					if($query[0][0]['pixels'])
						$updateData['activity_points'] = $userData['activity_points'] + $query[0][0]['pixels'];
					if($query[0][0]['vip_points'])
						$updateData['vip_points'] = $userData['vip_points'] + $query[0][0]['vip_points'];

					System::$db->where('id', $userData['id']);
					$update = System::$db->update('users', $updateData);
				}
				else
				{
					$update = true;
				}
				
				if(isset($query[0][0]['badge']))
				{
					$insertData = array(
						'userid' 	=>	$userData['id'],
						'badgecode' =>	$query[0][0]['badge']
					);

					$insert = System::$db->insert('users_badges', $insertData);
				}
				else
				{
					$insert = true;
				}

				if($update || $insert):
					System::$db->where('code', $voucher);
					System::$db->delete('vouchers');
					return true;
				else:
					return false;
				endif;
			else:
				throw new \Exception('El código voucher ingresado no existe', 102);
			endif;
		}
		else
		{
			throw new \Exception('No haz ingresado todos los valores (ID del usuario, código voucher)', 102);
		}
	}

	// Función exportada de HoloCMS
	public function GenerateTicket()
	{
		$data = "ST-";

		for ($i=1; $i<=6; $i++){
			$data = $data . rand(0,9);
		}

		$data = $data . "-";

		for ($i=1; $i<=20; $i++){
			$data = $data . rand(0,9);
		}

		$data = $data . "-drako-hotel-fe";
		$data = $data . rand(0,5);

		return $data;
	}
}
?>