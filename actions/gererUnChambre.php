<?php
    
    //connexion au bdd
    $conn = mysqli_connect("localhost","root", "", "bdd");
    $id=$_GET['id'];
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        header("Location: ../includes/gestionChambre.phpr");
        } 
    // requettte
    $rq="update chambre SET etat_chambre='Libre' where id_chambre=$id;";
    if ($conn->query($rq) === TRUE) {
        $sq="Select * from chambre where id_chambre=$id;";
        $exe=mysqli_query($conn,$sq);
        if($exe)
        {
                while($result=mysqli_fetch_assoc($exe))
                {
                    $chambre[]=$result;
                }
                foreach($chambre as $chambre) {$id_cl=$chambre['id_client'];}
        }
        else $id_cl=0;
        $sql2 = "update chambre set id_client=0 where id_chambre=$id;";
        if (!$conn->query($sql2) === TRUE) header("Location: ../includes/gestionChambre.php?erreurChangementIClient");
        
        $sql = "delete from client WHERE id_client=$id_cl ;";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../includes/gestionChambre.php");
        } else {
            header("Location: ../includes/gestionChambre.php?etat=errorChambre");
        }
    } else {
        header("Location: ../includes/gestionChambre.php?etat=error");
    }
    $conn->close();