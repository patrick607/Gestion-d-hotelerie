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
    <title>Modifier un client</title>
</head>
<body class="text-center">
    <?php
                include(dirname(__FILE__).'/../includes/menu.php');
    ?>
        <div class="container">
            <br>
            <main class="form-signin font-weight-bolder" style=" 
                    padding: 0px 50px 0px 50px;
                    margin: auto;">
                <form action="../actions/modifierClient.php" method="post">
                    <h1 class="h3 mb-3 fw-normal">Modifier un client</h1>
                    <br><label for="nom" class="visually-hidden">Nom</label>
                    <br><input type="text" id="nom" name="nom" class="form-control" required autofocus>
                    <br><label for="numero" class="visually-hidden">Numero</label>
                    <br><input type="number" id="numero" name="numero" class="form-control" required >
                    <br><label for="adresse" class="visually-hidden">Adresse</label>
                    <br><input type="text" id="adresse" name="adresse" class="form-control" required >
                    <br><label for="type" class="visually-hidden">Type</label>
                    <br><input type="text" id="type" name="type" class="form-control" required >
                    <input type="hidden" id="type" name="id" value="<?php echo $_GET['id'];?>" class="form-control"  >
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
                            echo "<option value=\"".$_GET['chambre']."\">".$_GET['chambre']."</option>";
                        echo "</select>"
                    ?>
                    <br><button class="w-100 btn btn-lg btn-primary" type="submit">Modifier</button>
                    
                </form>
            </main>    
            <br>
        </div><br>
    <?php
                include(dirname(__FILE__).'/../includes/pied.php');
    ?>
</body>
</html>