<?php
session_start();

if(!isset($_SESSION['username']))
	header("LOCATION: index");

if(!isset($_POST['debug']))
{
	header("LOCATION: me");
}
else
{
	$xml = new DomDocument('1.0', 'UTF-8');

	$error = $xml->createElement('error');
	$error = $xml->appendChild($error);

	$_POST['User-ID'] = $_SESSION['id'];

	foreach($_POST as $k => $v):
		$element = $xml->createElement($k, $v);
		$element = $error->appendChild($element);
	endforeach;

	$xml->formatOutput = true;
	$strings_xml = $xml->saveXML();

	$xml->save('log/error_'.time().'.xml');

	header("LOCATION: me");
}
?>