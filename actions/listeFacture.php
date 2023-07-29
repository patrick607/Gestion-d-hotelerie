<?php   
     //connexion au bdd
     $conn = mysqli_connect("localhost","root", "", "bdd");

     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
         header("Location: ../includes/gestionClient.phpr");
         } 
     // requettte
     $rq="select * from facture ;";
     $exe=mysqli_query($conn,$rq);
     while($result=mysqli_fetch_assoc($exe))
     {           
         $factures[]=$result;
     }