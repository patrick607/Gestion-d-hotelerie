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
                background-image: url("../assets/images/hotel.jpg");
                background-size: cover;
                background-repeat: no-repeat;
            }
    </style>
    <title>Accueil</title>
</head>
<body class="text-center">
    <?php
                include(dirname(__FILE__).'/../includes/menu.php');
    ?>
    <section>
        <div class="container text-succes font-weight-bolder">
            <?php
                include(dirname(__FILE__).'/../actions/dashboard.php');
                ?>
                <!-- //Affichage des chambres occupe -->
                <br>
                <h4 class="display-8 text-danger">Liste des chambres occupes</h4><br>
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-5 gx-4">
                        <?php
                        
                        if(isset($chambreOccupe))
                        {
                            echo "<div class=\"col themed-grid-col\"><b>Numero</b></div>";
                            echo "<div class=\"col themed-grid-col\"><b>Type</b></div>";
                            echo "<div class=\"col themed-grid-col\"><b>Classe</b></div>";
                            echo "<div class=\"col themed-grid-col\"><b>Debut de l'occupation</b></div>";
                            echo "<div class=\"col themed-grid-col\"><b>Durre</b></div>";
                            foreach($chambreOccupe as $chambre)
                                {
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['numero_chambre'])."</div>";
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['type_chambre'])."</div>";
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['classe_chambre'])."</div>";
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['occupationDebut'])."</div>";
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['durre'])."</div>";
                                   
                                }
                        }
                        ?>
                    </div>
                </div>
                <!-- Affichage des chambres libres -->
                <br>
                <h4 class="display-8 text-danger">Liste des chambres libres</h4><br>
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-3 gx-4">
                        <?php
                        
                        if(isset($chambreLibre))
                        {
                            echo "<div class=\"col themed-grid-col\"><b>Numero</b></div>";
                            echo "<div class=\"col themed-grid-col\"><b>Classe</b></div>";
                            echo "<div class=\"col themed-grid-col\"><b>Type</b></div>";
                            foreach($chambreLibre as $chambre)
                                {
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['numero_chambre'])."</div>";
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['classe_chambre'])."</div>";
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['type_chambre'])."</div>";
                                
                                }
                        }
                        ?>
                    </div>
                </div>
                <!-- //Affichage des chambres reserve -->
                <br>
                <h4 class="display-8 text-danger">Liste des chambres reserves</h4><br>
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-5 gx-4">
                        <?php
                        
                        if(isset($chambreReserve))
                        {
                            echo "<div class=\"col themed-grid-col\"><b>Numero</b></div>";
                            echo "<div class=\"col themed-grid-col\"><b>Classe</b></div>";
                            echo "<div class=\"col themed-grid-col\"><b>Typet</b></div>";
                            echo "<div class=\"col themed-grid-col\"><b>Date de eservation</b></div>";
                            echo "<div class=\"col themed-grid-col\"><b>Durre</b></div>";
                            foreach($chambreReserve as $chambre)
                                {
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['numero_chambre'])."</div>";
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['classe_chambre'])."</div>";
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['type_chambre'])."</div>";
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['occupationDebut'])."</div>";
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($chambre['durre'])."</div>";
                                
                                }
                        }
                        ?>
                    </div>
                </div>
        </div>
    </section><br>
    <?php
                include(dirname(__FILE__).'/../includes/pied.php');
    ?>
</body>
</html>