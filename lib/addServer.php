<?php

include 'pdo.php';

function verifField() {

	$name = $_POST['name'];
	$host = $_POST['host'];
	$port = $_POST['port'];

	if (!empty($name) || !empty($host) || !empty($port)) {
		addServer($name, $host, $port);
	}
}

function addServer($name, $host, $port)
{
	$pdo = connectDb();
	$pdo ->exec("INSERT INTO `list_serv`(name, host, port) VALUES ('$name', '$host', '$port')");
	header('Location: ../index.php');
}


verifField();