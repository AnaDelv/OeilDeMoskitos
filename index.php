<?php
session_start();

if(isset($_SESSION['error_message'])) {
    $error = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
if(isset($_SESSION['success_message'])) {
    $success = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}
if(isset($_SESSION['signup'])) {
    $signup = $_SESSION['signup'];
    unset($_SESSION['signup']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Moskitos</title>
<<<<<<< HEAD
=======
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
>>>>>>> 226da0227eed4fdd2de9b14695cbdfb1f6959389
</head>

<body>

<?php if(isset($error)): ?>
    <div class="alert alert-warning" role="alert" style="text-align: center;">
        <?php echo $error ?>
    </div>
<?php endif; ?>

<?php if(isset($success)): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $success ?>
    </div>
<?php endif; ?>

<?php if(isset($signup)): ?>
    <div class="alert alert-success center"  role="alert">
        <?php echo $signup ?>
    </div>
<?php endif; ?>

<<<<<<< HEAD
<div class="container">


    <div class="row">

        <div id="login" class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <h2>Se connecter</h2>
            <form class="form-group" action="lib/login.php"  method="post">
                <label>Email :</label>
                <input type="email" name="email" class="form-control" id="email-connect" onkeyup="connectInput()" required>

                <label>Mot de passe :</label>
                <input type="password" name="mdp" class="form-control" id="mdp-connect" onkeyup="connectInput()" required>
                <hr>

                <div class="container">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <button type="submit" class="btn btn-light" id="button-connect">Connexion</button>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>

            </form>
        </div>


</body>
=======
    <div class="container">

        <div class="row">

            <div class="col"></div>

            <div id="login" class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <h2>Se connecter</h2>
                <form class="form-group" action="lib/login.php"  method="post">
                    <label for="email-connect">Email :</label>
                    <input type="email" name="email" class="form-control" id="email-connect" onkeyup="connectInput()" required>

                    <label for="mdp-connect">Mot de passe :</label>
                    <input type="password" name="mdp" class="form-control" id="mdp-connect" onkeyup="connectInput()" required>
                    <hr>

                    <div class="container">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                <button type="submit" class="btn btn-light" id="button-connect">Connexion</button>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>

                </form>
            </div>

            <div class="col"></div>

        </div>
    </div>

</body>

>>>>>>> 226da0227eed4fdd2de9b14695cbdfb1f6959389
</html>
