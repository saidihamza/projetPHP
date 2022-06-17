<?php
include "./formulaire.phtml";
//////////////////insertion des information/////////////////////////

function insert_Info($Nom, $Prénom, $Adresse, $Tel, $Image)
{
    include "./connexion/cnnx.php";
    $query = 'INSERT INTO `utilisateur`(`Nom`, `Prénom`, `Adresse`, `Tel`, `Image`) VALUES (?,?,?,?,?)';
    $resultat = $bdd->prepare($query);
    $resultat->execute(array($Nom, $Prénom, $Adresse, $Tel, $Image));
}

if (isset($_POST['save']) && !empty($_POST)) {

    $fileName = $_FILES['file']['name'];
    $resultat = insert_Info(
        $_POST['Nom'],
        $_POST['Prénom'],
        $_POST['Adresse'],
        $_POST['Tel'],
        $fileName
    );
   
    if (empty($resultat)) {
        header("location:index.php");
    }
}
