<?php

include 'pdo.php';

function verifField() {

	$name = $_POST['name'];
	$host = $_POST['host'];


	if (!empty($name) || !empty($host) ) {
		addServer($name, $host);
	}
}

function addServer($name, $host)
{
	$pdo = connectDb();
	$pdo ->exec("INSERT INTO `server`(name, host) VALUES ('$name', '$host')");
	header('Location: ../index.php');
}


verifField();