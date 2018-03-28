<?php

include 'pdo.php';
$ip = "8.8.8.8";

function pingIp($ip) {

    exec('ping -n 1 ' . $ip, $output, $return_var);


        if ($return_var != 0) {
            echo "injoignable";

        } else {

            echo 'joignable';

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

// boucler pour ping toutes les x secondes ou minutes
// pour le service : ping un port au lieu d'une IP et afficher fonctionnel/non fonctionnel et BOUCLER
// récupérer le temps de réponse des ping vers les serveurs
// récupérer le nombre de fois où la réponse du ping est de 1
// note de fiabilité : taux de disponibilité, durée d'indisponibilité (en pourcentages, en temps cumulé d'indisponibilté)
// ex : si le serveur est disponible tout le temps : 0s d'indisponibilité
// Il faut changer la durée si le statut change

// pour la gestion de nouveaux serveurs : entrer / supprimer des adresses IP sur lesquelles s'appliqueront le script

// chercher une solution pour le temps réel : rafraichissement automatique, sinon bouton de rafraichissement
// (à prioriser pour le TEMPS)