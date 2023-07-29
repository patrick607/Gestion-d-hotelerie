<?php
    session_start();
    $_SESSION['etat']='deconnecte';
    header("Location: ../includes/seconnecter.php?etat=connexion");