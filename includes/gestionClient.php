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
    <link href="../assets/css/grid.css" rel="stylesheet">
    <style> 
        body {
                background-image: url("../assets/images/client.jpg");
                background-size: cover;
                background-repeat: no-repeat;
            }
    </style>
    <title>Gestionnaire de client</title>
</head>
<body class="text-center font-weight-bolder">
    <?php
                include(dirname(__FILE__).'/../includes/menu.php');
    ?>
    <h1 class="display-4 text-danger">Gestionnaire de client</h1>
    <p ><a class="btn btn-primary btn-lg" href="ajouterClient.php">Ajouter un client</a></p>
    <h4 class="display-8">Liste des clients active</h4><br>
    <div class="container text-dark">
        <div class="row row-cols-1 row-cols-md-6 gx-4 font-weight-bolder">
            <?php
                include(dirname(__FILE__).'/../actions/listeClient.php');
                if(isset($clients))
                {   
                    echo "<div class=\"col themed-grid-col\"><b>Nom</b></div>";
                    echo "<div class=\"col themed-grid-col\"><b>Numero</b></div>";
                    echo "<div class=\"col themed-grid-col\"><b>Adresse</b></div>";
                    echo "<div class=\"col themed-grid-col\"><b>Type</b></div>";
                    echo "<div class=\"col themed-grid-col\"><b>Chambre</b></div>";
                    echo "<div class=\"col themed-grid-col\"><b>Action</b></div>";
                    foreach($clients as $client)
                        {
                            echo "<div class=\"col themed-grid-col\">".htmlspecialchars($client['nom_client'])."</div>";
                            echo "<div class=\"col themed-grid-col\">".htmlspecialchars($client['numero_client'])."</div>";
                            echo "<div class=\"col themed-grid-col\">".htmlspecialchars($client['adresse_client'])."</div>";
                            echo "<div class=\"col themed-grid-col\">".htmlspecialchars($client['type_client'])."</div>";
                            echo "<div class=\"col themed-grid-col\">".htmlspecialchars($client['id_chambre'])."</div>";
                            echo "<div class=\"col themed-grid-col\"><a class=\"btn btn-warning btn-sm\" href=\"modifierUnClient.php?id=".$client['id_client']."&chambre=".$client['id_chambre']."\">Modifier</a><a class=\"btn btn-danger btn-sm\" href=\"../actions/supprimerUnClient.php?id=".$client['id_client']."&chambre=".$client['id_chambre']."\">Supprimer</a></div>";
                            // echo "</div> ";
                        }
                }
            ?>  
        </div> 
    </div><br>
    <?php
                include(dirname(__FILE__).'/../includes/pied.php');
    ?>
</body>
</html>