<?php
session_start();

if(!$_SESSION['login'])
	header("LOCATION: index");

session_destroy();
header("LOCATION: index");
?>