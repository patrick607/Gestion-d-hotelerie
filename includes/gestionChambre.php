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
                background-image: url("../assets/images/chambre.jpg");
                background-size: cover;
                background-repeat: no-repeat;
            }
    </style>
    <title>Gestionnaire de chambre</title>
</head>
<body class="text-center">
    <?php
                include(dirname(__FILE__).'/../includes/menu.php');
    ?>
    <br><br>
    <h1 class="text-danger">Gestionnaire de chambre</h1><br>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-5 gx-2 font-weight-bolder">
            <?php
                include(dirname(__FILE__).'/../actions/listeChambre.php');
                if(isset($chambres))
                {   
                    echo "<div class=\"col themed-grid-col\"><b>Numero</b></div>";
                    echo "<div class=\"col themed-grid-col\"><b>Classe</b></div>";
                    echo "<div class=\"col themed-grid-col\"><b>Type</b></div>";
                    echo "<div class=\"col themed-grid-col\"><b>Etat</b></div>";
                    echo "<div class=\"col themed-grid-col\"><b>Action</b></div>";
                    foreach($chambres as $chambre)
                        {
                            echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['numero_chambre'])."</div>";
                            echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['classe_chambre'])."</div>";
                            echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['type_chambre'])."</div>";
                            echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['etat_chambre'])."</div>";
                            if($chambre['etat_chambre']=='Occupe' OR $chambre['etat_chambre']=='Reserve')
                            {
                                echo "<div class=\"col themed-grid-col\"><a class=\"btn btn-warning btn-sm\" href=\"../actions/gererUnChambre.php?id=".$chambre['id_chambre']."\">Liberer</a></div>";
                            }
                            else echo "<div class=\"col themed-grid-col\"><a class=\"btn btn-info btn-sm\" href=\"../includes/ajouterClient.php\">Assigner un client</a></div>";
                            
                           
                        }
            }
            else echo "Loading error io eh";
            ?>
        </div>    
    </div><br>
    <?php
                include(dirname(__FILE__).'/../includes/pied.php');
    ?>
</body>
</html>