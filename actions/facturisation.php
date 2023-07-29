<?php
    //connexion au bdd
    $conn = mysqli_connect("localhost","root", "", "bdd");
    $client=$_POST['id_client'];
    if (!$conn) {
        header("Location: ../includes/facturerUnClient.phpr");
        } 
    // requettte
    $sq="Select * from client where id_client=$client;";
    $exe=mysqli_query($conn,$sq);
    if($exe)
    {
            // while($result=mysqli_fetch_assoc($exe))
            // {
            //     $clients[]=$result;
            // }
            // foreach($clients as $cli) {$id_chamber=$cli['id_chambre'];}
            $result=mysqli_fetch_assoc($exe);
            $id_chamber=$result['id_chambre'];
    }
    else
    {
        header("Location: ../includes/facturerUnClient.php?etat=AvoirLinfoclient&e=".$client);
    }
    $sq2="Select * from chambre where id_chambre=$id_chamber;";
    $exe2=mysqli_query($conn,$sq2);
    if($exe2)
    {
        while($result2=mysqli_fetch_assoc($exe2))
        {
            $chambre[]=$result2;
        }
        foreach($chambre as $cha)
        {
            $id_client=$cha['id_client'];
            $debut=$cha['occupationDebut'];
            $dure=$cha['durre'];
            $nom=$cha['nom_client'];
        }

        $rq="insert into facture ( id_client, debut, nom_client, dure) VALUES ( '$id_client', '$debut', '$nom' , '$dure') ;";
        if ($conn->query($rq) === TRUE)
        {
            header("Location: ../includes/facturerUnClient.php?etat=Succes");
        } 
        else {
            header("Location: ../includes/facturerUnClient.php?etat=errorInsertFacute");
        }
    }
    else {
        header("Location: ../includes/facturerUnClient.php?etat=avoirinfochambre&e=".$id_chamber);
    }
    
    $conn->close();