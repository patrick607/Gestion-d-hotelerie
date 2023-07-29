<?php   
    //connexion au bdd
    $conn = mysqli_connect("localhost","root", "", "bdd");
    $id=$_GET['id'];
    $chambre=$_GET['chambre'];
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        header("Location: ../includes/gestionClient.phpr");
        } 
    // requettte
    $rq="delete FROM client WHERE id_client=$id;";
    if ($conn->query($rq) === TRUE) {
        $sql = "update chambre SET etat_chambre='Libre' WHERE numero_chambre=$chambre ;";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../includes/gestionClient.php");
        } else {
            header("Location: ../includes/gestionrClient.php?etat=errorChambre");
        }
    } else {
        header("Location: ../includes/gestionClient.php?etat=error");
    }
    $conn->close();