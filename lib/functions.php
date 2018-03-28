<?php

include 'pdo.php';


function pingIp($ip) {


    exec('ping -n 1 ' . $ip, $output, $return_var);
    $pos= strpos($output[2],"temps");



        if ($return_var === 0  && $pos) {
            echo "joignable";

        } else {

            echo 'injoignable';

        }


}




$host = "www.google.com";
$port = "80";

function pingSocket($host, $port) {

        $socket = @fsockopen($host,$port);
        if($socket === false) {
            echo "injoignable";
        } else {
            echo "joignable";
    }
}







// combien de paquets envoie-t-on? 1 pour la précision?
// Quelle intervalle de temps?

// récupérer le temps de réponse des ping vers les serveurs

// récupérer le nombre de fois où la réponse du ping est de 1

// note de fiabilité : taux de disponibilité, durée d'indisponibilité (en pourcentages, en temps cumulé d'indisponibilté)

// ex : si le serveur est disponible tout le temps : 0s d'indisponibilité

// Il faut changer la durée si le statut change


// chercher une solution pour le temps réel : rafraichissement automatique, sinon bouton de rafraichissement
// (à prioriser pour le TEMPS)



// 1 - nbre paquet perdus / nmbres paquet total   = note de fiabilité