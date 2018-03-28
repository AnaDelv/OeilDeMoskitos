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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3>Servers Status</h3>

        <?php
        while ($donnee = $sql->fetch()) {

        ?>

        <table class="table table-bordered table-hover">
            <thead class="thead-light"> <!-- Ligne serveurs  -->
            <tr>
                    <th class="text-center"><?php echo $donnee['name']?></th>
                    <th class="text-center"><?php echo $donnee['host']?></th>
                    <th class="text-center"><?php pingIp($donnee['host']); ?></th>
                </tr>
            </thead> <!-- Fin ligne serveurs  -->

            <tbody> <!-- Tableau pour les services  -->
            <?php
                $stmnt = $pdo ->query("SELECT * FROM `service` WHERE idserver =". $donnee['idserver']);
                while ($data = $stmnt->fetch()) { ?>

<!--                    <table class="table table-bordered table-hover">-->
<!--                        <tr>-->
<!--                            <th class="text-center">--><?php //echo $data['name'] ?><!--</th>-->
<!--                            <td class="text-center">--><?php //echo $data['socket'] ?><!--</td>-->
<!--                        </tr>-->
<!--                    </table>-->

                    <tr>
                        <th class="text-center"><?php echo $data['name'] ?></th>
                        <td class="text-center"><?php echo $data['socket'] ?></td>
                    </tr>


                    <?php
                }
            }
            ?>
            </tbody>
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

    <footer>

    </footer>

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/app.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>




