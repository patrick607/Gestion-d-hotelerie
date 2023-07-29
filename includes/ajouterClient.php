<?php
    session_start();
    if(isset($_SESSION['etat']))
    {
        if($_SESSION['etat']=='deconnecte') header("Location: ../includes/seconnecter.php?acceulNonConnecte");
    }
    else
    {
        $_SESSION['etat']='deconnecte';
        header("Location: ../includes/seconnecter.php?etat=AcceillPasSessionss");
    }
    $_SESSION['etat']='connecte';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <style> 
        body {
                background-image: url("../assets/images/client.jpg");
                background-size: cover;
                background-repeat: no-repeat;
            }
    </style>
    <title>Ajout d'un client</title>
</head>
<body class="text-center ">
    <?php
                include(dirname(__FILE__).'/../includes/menu.php');
    ?>
    <div class="container">
        <main class="form-signin pd-100" style=" 
  padding: 0px 50px 0px 50px;
  margin: auto;">
            <form action="../actions/ajoutClient.php" method="post">
                <h1 class="text-danger">Ajouter un client</h1>
                <br><label for="nom" class="visually-hidden">Nom</label>
                <br><input type="text" id="nom" name="nom" class="form-control" placeholder="Ex Rabe" required autofocus>
                <br><label for="numero" class="visually-hidden">Numero</label>
                <br><input type="number" id="numero" name="numero" class="form-control" required >
                <br><label for="adresse" class="visually-hidden">Adresse</label>
                <br><input type="text" id="adresse" name="adresse" class="form-control" required >
                <br><label for="debut" class="visually-hidden">debut</label>
                <br><input type="datetime-local" id="debut" name="debut" class="form-control" required >
                <br><label for="durre" class="visually-hidden">durre</label>
                <br><input type="number" id="durre" name="durre" class="form-control" required >
                <br><label for="chambre" class="visually-hidden">Chambre</label>
                <?php
                    include(dirname(__FILE__).'/../actions/listeChambreLibre.php');
                    echo "<select name=\"chambre\" class=\"form-control\">";
                    if($chambres)
                        {
                            foreach($chambres as $ch)
                            {
                                echo "<option value=\"".$ch['numero_chambre']."\">".$ch['numero_chambre']."</option>";
                            }
                        }
                    echo "</select>"
                ?>
                <br><button class="w-100 btn btn-lg btn-primary" type="submit">Ajouter</button>
                
            </form>
        </main>    
        <br>
    </div><br><br><br>
    <?php
                include(dirname(__FILE__).'/../includes/pied.php');
    ?>
</body>
</html>