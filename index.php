<?php

////////////////////////affichage des informations/////////////////////////////
function List_Info()
{
    include "./connexion/cnnx.php";
    $sql = "SELECT * FROM `utilisateur` ";
    $query = $bdd->prepare("$sql");
    $query->execute();
    $response = $query->fetchAll();
    return $response;
}
/////////////////////////supprissiion des informatons///////////////////////////////////////////////////////
function DeleteFromTable()
{
    include './connexion/cnnx.php';

    // Préparation de la requête
    $query = $bdd->prepare(
        '
      DELETE FROM `utilisateur` WHERE id=?
      '
    );


    $query->execute(array($_GET['idSupprimer']));
}
if (isset($_GET['idSupprimer'])) {

    DeleteFromTable();
}


include "index.phtml";