<?php

include 'lib/functions.php';

$pdo = connectDb();

$sql = $pdo ->query("SELECT * FROM `server`");


?>

<!DOCTYPE html>
<html>
<head>
    <meta name="robots" content="noindex">
    <meta charset="utf-8">
    <title>Servers Status</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><h1>OeilDeMoskitos</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
            </ul>
            <form action="lib/logout.php">
                <button type="submit" id="logout" class="btn btn-light" style="float: right">
                    <img src="img/logout.svg" width="20" height="20">
                    <span class="gestion">Se déconnecter</span>
                </button>
            </form>
        </div>
    </nav>

    <div class="container">

        <h1 class="text-center">Etat des serveurs</h1>
        <hr>
        <br>

        <?php
        while ($donnee = $sql->fetch()) {

        ?>

        <table class="table table-bordered">
            <!-- Ligne serveurs  -->
            <thead class="thead-light">
                <tr>
                    <th><b>Serveur : </b><?php echo $donnee['name']?></th>
                    <th class="text-center"><?php echo $donnee['host']?></th>
                    <th class="text-center"><?php pingIp($donnee['host']); ?></th>
<!--                    Nombre de fois où le serveur est indisponible -->
                    <th class="text-center"><?php echo $donnee['counter']; ?></th>



                </tr>
            </thead>
            <!-- Fin ligne serveurs  -->

            <!-- Tableau pour les services  -->
            <tbody>
                <?php
                $stmnt = $pdo ->query("SELECT * FROM `service` WHERE idserver =". $donnee['idserver']);
                while ($data = $stmnt->fetch()) { ?>

                    <tr>
                        <th class="text-center"><?php echo $data['name'] ?></th>
                        <td class="text-center"><?php echo $data['socket'] ?></td>
                        <td class="text-center"><?php pingSocket($donnee['host'],$data['socket']); ?></td>
                    </tr>

                    <?php
                }
            }
            ?>

            </tbody>
        </table>
        <br>

        <form class="form-inline" role="form" action="lib/addServer.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="host" name="host" placeholder="Domain / IP">
            </div>

            <button type="submit" class="btn btn-default" id="add-button">Add</button>
        </form>

    </div>

</body>

</html>
