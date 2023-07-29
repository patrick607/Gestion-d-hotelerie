<?php 
    session_start();
    $_SESSION['etat']='deconnecte';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <style> 
        body {
                background-image: url("../assets/images/hotel.jpg");
                background-size: cover;
                background-repeat: no-repeat;
            }
    </style>
</head>
    <body class="text-center">
        <div class="container">
            <br>
            <main class="form-signin ">
                <form action="../actions/connexion.php" method="post">
                    <img class="mb-4" src="../assets/images/logo.png" alt="Logo" width="72" height="57">
                    <h1 class="h3 mb-3 fw-normal">Se connecter</h1>
                    <br><label for="nom" class="visually-hidden">Nom d'utiilisateur</label>
                    <br><input type="text" id="nom" name="nom" class="form-control" placeholder="Email address" required autofocus>
                    <br><label for="password" class="visually-hidden">Mot de passe</label>
                    <br><input type="password" id="password"  name="password" class="form-control" placeholder="Password" required>
                    <br><button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
                    <?php echo $_GET['etat'];?>
                </form>
            </main>    
            <br>
        </div>
    </body>
</html>