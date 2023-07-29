<?php
    //connexion au bdd
    $conn = mysqli_connect("localhost","root", "", "bdd");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        header("Location: ../includes/seconnecter.php?etat=connect_error");
        } 
    // requettte
    $rq="select * from chambre where etat_chambre='Occupe';";
    $exe=mysqli_query($conn,$rq);
    while($result=mysqli_fetch_assoc($exe))
    {
        $chambreOccupe[]=$result;
    }
    $rq2="select * from chambre where etat_chambre='Libre';";
    $exe2=mysqli_query($conn,$rq2);
    while($result=mysqli_fetch_assoc($exe2))
    {
        $chambreLibre[]=$result;
    }
    $rq3="select * from chambre where etat_chambre='Reserve';";
    $exe3=mysqli_query($conn,$rq3);
    while($result=mysqli_fetch_assoc($exe3))
    {
        $chambreReserve[]=$result;
    }
    $conn->close();