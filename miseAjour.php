<?php
include "./MiseAjour.phtml";
////////////////////////affichage des informations/////////////////////////////
function List_Info()
{
    include "./connexion/cnnx.php";
    $id = $_GET['idModifier'];
    $sql = "SELECT * FROM `utilisateur` WHERE id=$id";
    $query = $bdd->prepare("$sql");
    $query->execute();
    $response = $query->fetchAll();
    return $response;
}
/////////////////////////////////mise a jour des information////////////////////////////////

function UpdateInformation()
{
    include "./connexion/cnnx.php";
    $id = $_GET['idModifier'];
    $sql = 'UPDATE `utilisateur` SET `Nom`=?,`Prénom`=?,`Adresse`=?,`Tel`=?,`Image`=? WHERE `id`= ?';
    $fileName = $_FILES['file']['name'];
    $query = $bdd->prepare($sql);
    $query->execute(
        array(
            $_POST['Nom'],
            $_POST['Prénom'],
            $_POST['Adresse'],
            $_POST['Tel'],
            $fileName,
            $id

        )
    );
}
if (isset($_GET['idModifier']) && isset($_POST['save'])) {

    UpdateInformation();
    header("location:index.php");
}
