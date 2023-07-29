<?php
    //connexion au bdd
    $conn = mysqli_connect("localhost","root", "", "bdd");
    $nom=$_POST['nom'];
    $numero=$_POST['numero'];
    $adresse=$_POST['adresse'];
    $type=$_POST['type'];
    $chambre=$_POST['chambre'];
    $id=$_POST['id'];
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        header("Location: ../includes/gestionClient.phpr");
        } 
    // requettte
    $rq="update client SET nom_client='$nom', numero_client='$numero', adresse_client='$adresse', type_client='$type', id_chambre='$chambre' where id_client='$id';";
    if ($conn->query($rq) === TRUE) {
        $sql = "update chambre SET etat_chambre='Occupe' WHERE numero_chambre=$chambre ;";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../includes/gestionClient.php");
        } else {
            header("Location: ../includes/ajouterClient.php?etat=errorChambre");
        }
    } else {
        header("Location: ../includes/ajouterClient.php?etat=error");
    }
    $conn->close();