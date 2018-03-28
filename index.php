<?php

include 'lib/functions.php';

	$pdo = connectDb();
	
	$sql = $pdo ->query("SELECT * FROM `server`");
    $stmnt = $pdo ->query("SELECT * FROM `service`");

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="robots" content="noindex">
        <meta charset="utf-8">
        <title>Server(s) Status</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
    	<div class="container">
    		<h3>Servers Status</h3>
    		<table class="table table-bordered">
				<tr>
                    <th class="text-center">Name</th>
					<th class="text-center">IP</th>
					<th class="text-center">Status</th>
				</tr>
				<?php
					while ($donnee = $sql->fetch()) {
				
				?>
				 <tbody>
                     <tr>
                         <th style="text-align: center;"><?php echo $donnee['name']?></th>
                         <td style="text-align: center;"><?php echo $donnee['host']?></td>
                         <td style="text-align: center;"><?php pingIp($donnee['host']); ?></td>
                     </tr>
				</tbody>
				<?php
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




