<?php
    //connexion au bdd
    $conn = mysqli_connect("localhost","root", "", "bdd");
    $nom=$_POST['nom'];
    $numero=$_POST['numero'];
    $adresse=$_POST['adresse'];
    $chambre=$_POST['chambre'];
    $debut=$_POST['debut'];
    $durre=$_POST['durre'];
    if (!$conn) {
        header("Location: ../includes/gestionClient.phpr");
        } 
    // requettte
    $rq="insert into client ( nom_client, numero_client, adresse_client,  id_chambre) VALUES ( '$nom', '$numero', '$adresse', '$chambre') ;";
    if ($conn->query($rq) === TRUE) {
        $sq="Select * from client where id_chambre=$chambre;";
        $exe=mysqli_query($conn,$sq);
        if($exe)
        {
                    while($result=mysqli_fetch_assoc($exe))
                {
                    $client[]=$result;
                }
                foreach($client as $client) {$id_cl=$client['id_client'];}
        }
        else $id_cl=0;
        $sql = "update chambre SET etat_chambre='Occupe', id_client=$id_cl , occupationDebut='$date' , durre=$durre WHERE numero_chambre=$chambre ;";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../includes/gestionClient.php");
        } else {
            header("Location: ../includes/ajouterClient.php?etat=errorChambre");
        }
    } else {
        header("Location: ../includes/ajouterClient.php?etat=error");
    }
    $conn->close();