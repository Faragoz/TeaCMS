<?php
session_start();

if(!$_SESSION['admin.login'])
	header("LOCATION: index");

session_destroy();
header("LOCATION: index");
?>