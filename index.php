<?php 
    session_start();
    if(isset($_SESSION['etat']))
    {
        $etat=$_SESSION['etat'];
        if($etat=='connecte') header("Location: includes/accueil.php");
        else header("Location: includes/seconnecter.php?etat=sessionDejaActiver");
    }
    else 
    {
    //On démarre la session
    $_SESSION['etat']='deconnecte';
    header("Location: includes/seconnecter.php?etat=SessionActiver");
    }
?>