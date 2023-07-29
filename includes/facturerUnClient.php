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
    <title>Facturer un client</title>
</head>
<body class="text-center font-weight-bolder">
    <?php
                include(dirname(__FILE__).'/../includes/menu.php');
    ?>
    <div class="container">
        <main class="form-signin pd-100" style=" 
  padding: 0px 50px 0px 50px;
  margin: auto;">
            <form action="../actions/facturisation.php" method="post">
                <h1 class="text-danger">Facturiser un client</h1>
                <br><label for="client" class="visually-hidden">Choisissez un client</label>
                <?php
                    include(dirname(__FILE__).'/../actions/listeClient.php');
                    echo "<select name=\"id_client\" class=\"form-control\">";
                    if(isset($clients))
                        {
                            foreach($clients as $ch)
                            {
                                echo "<option value=\"".$ch['id_client']."\">".$ch['nom_client']."</option>";
                            }
                        }
                    echo "</select>"
                ?>
                <br><button class="w-100 btn btn-lg btn-primary" type="submit">Facturer</button>
                
            </form>
        </main>    
        <br>
        <section>
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-5 gx-4">
                        <?php
                        include(dirname(__FILE__).'/../actions/listeFacture.php');
                        if(isset($factures))
                        {
                            echo "<div class=\"col themed-grid-col\"><b>Id</b></div>";
                            echo "<div class=\"col themed-grid-col\"><b>Nom client</b></div>";
                            echo "<div class=\"col themed-grid-col\"><b>Date du facture</b></div>";
                            echo "<div class=\"col themed-grid-col\"><b>Durre</b></div>";
                            echo "<div class=\"col themed-grid-col\"><b>Total(MGA)</b></div>";
                            foreach($factures as $facure)
                                {
                                    
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($facure['facture_id'])."</div>";
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($facure['nom_client'])."</div>";
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($facure['dateDuFacture'])."</div>";
                                    echo "<div class=\"col themed-grid-col\">".htmlspecialchars($facure['dure'])."</div>";
                                    $total=$facure['dure']*50000;
                                    echo "<div class=\"col themed-grid-col\">".$total."</div>";
                                   
                                }
                        }
                        ?>
                    </div>
                </div>
        </section>
    </div><br><br><br>
    <?php
                include(dirname(__FILE__).'/../includes/pied.php');
    ?>
</body>
</html>