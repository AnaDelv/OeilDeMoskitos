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
    <title>Server(s) Status</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h3>Servers Status</h3>
    <table class="table table-bordered">
        <tr>
            <th class="text-center">Nom</th>
            <th class="text-center">IP</th>
            <th class="text-center">Statut</th>


        </tr>
        <?php
        while ($donnee = $sql->fetch()) {

            ?>
            <tbody>
            <!-- Tableau pour les serveurs  -->
            <tr>
                <th style="text-align: center;"><?php echo $donnee['name']?></th>
                <td style="text-align: center;"><?php echo $donnee['host']?></td>
                <td style="text-align: center;"><?php pingIp($donnee['host']); ?></td>


            </tr>
            </tbody>
            <?php
            $stmnt = $pdo ->query("SELECT * FROM `service` WHERE idserver =". $donnee['idserver']);
            while ($data = $stmnt->fetch()) { ?>

                <tr>
                    <!-- Tableau pour les services  -->
                    <th style="text-align: center;"><?php echo $data['name'] ?></th>
                    <td style="text-align: center;"><?php echo $data['socket'] ?></td>
                    <!--                            <td style="text-align: center;">--><?php //pingSocket($donnee['host'],$data['socket']); ?><!--</td>-->


                </tr>
                </tbody>

                <?php
            }
        }
        ?>

    </table>

    <form class="form-inline" role="form" action="lib/addServer.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" onkeyup="javascript:checkForm(this)" id="host" name="host" placeholder="Domain / IP">
        </div>

        <button type="submit" class="btn btn-default" id="add-button">Add</button>
    </form>
    <br>
</div>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/app.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
<footer>

</footer>
</html>
