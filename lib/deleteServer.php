<?php

include 'pdo.php';

function deleteServ() {
	
	$idserv = $_POST['id'];

	$pdo = connectDb();

	$sql = "DELETE FROM `list_serv` WHERE idserv='".$idserv."'";
	$pdo ->exec($sql);
	header('Location: ../index.php');
}

deleteServ();