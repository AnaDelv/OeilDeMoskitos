<?php

include 'pdo.php';


date_default_timezone_set('Europe/Brussels');


function pingIp($ip) {


    exec('ping -n 1 ' . $ip, $output, $return_var);
    $pos= strpos($output[2],"temps");



        if ($return_var === 0  && $pos) {
            echo "<img src='../img/green.svg' alt='joignable' width='30'>";

        } else {

            echo "<img src='../img/red.svg' alt='injoignable' width='30'>";

        }


}


function pingSocket($host, $port) {

        $socket = @fsockopen($host,$port);
        if($socket === false) {
            echo "<img src='../img/red.svg' alt='injoignable' width='30'>";
        } else {
            echo "<img src='../img/green.svg' alt='joignable' width='30'>";
    }
}


function getPingIpResult($ip) {



        exec('ping ' . $ip, $output, $return_var);
        $result = explode("=", $output[10]);
        echo $result[3];

}


function getTimeDifference($id)
{

    $pdo = connectDb();
    $sql = $pdo->query("SELECT downtime FROM `server` WHERE idserver =".$id);

    while ($donnee = $sql->fetch()) {

        $time = $donnee['downtime'];
        $nowtime = date('Y-m-d H:i:s');


        $d1 = new DateTime($time);
        $d2 = new DateTime($nowtime);

        $diff = $d1->diff($d2);
        $diffm = $d1->diff($d2);
        $diffh = $d1->diff($d2);
        $diffi = $d1->diff($d2);
        $diffs = $d1->diff($d2);

        echo $nb_mois = $diffm->m . " mois ";
        echo $nb_jours = $diff->d . " jour(s) ";
        echo $nb_heur = $diffh->h . " h ";
        echo $nb_min = $diffi->i . " min ";
        echo $nb_sec = $diffs->s . " sec ";


    }
}

