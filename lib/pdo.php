<?php

function connectDb() {
	$host = '127.0.0.1';
	$port = '3306';
	$db = 'serveur';
	$login = 'root';
	$password = '';

	try {
        $pdo = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $db, $login, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
    
    return $pdo;

}