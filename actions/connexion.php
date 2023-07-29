<?php
session_start();
//connexion au bdd
$conn = mysqli_connect("localhost","root", "", "bdd");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    header("Location: ../includes/seconnecter.php?etat=connect_error");
    } 

$nom=$_POST['nom'];
$mdp=$_POST['password'];
// requettte
$rq="select * from admin where nom_admin='$nom';";
$exe=mysqli_query($conn,$rq);
$result=mysqli_fetch_assoc($exe);
if ($result) {
    $_SESSION['etat']='connecte';
    if($mdp==$result['mdp']) header("Location: ../includes/accueil.php?=".$nom);
    else header("Location: ../includes/seconnecter.php?etat=mauvais_mot_de_passe");
}
else 
{
    $_SESSION['etat']='deconnecte';
    header("Location: ../includes/seconnecter.php?etat=mauvais_nom");
}
 