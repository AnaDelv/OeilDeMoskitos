<?php

include 'pdo.php';


$pdo = connectDb();

$sql = $pdo ->query("SELECT * FROM `server`");

while ($donnee = $sql->fetch()) {

    $ip = $donnee['host'];
    $status = $donnee['status'];

    if ($status == 0) {

        exec('ping ' . $ip, $output, $return_var);
        $result = explode("=", $output[10]);
        echo $result[3];
    }

}