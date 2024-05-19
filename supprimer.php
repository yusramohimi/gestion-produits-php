<?php
// supprimer
$isValidDelete = $_SERVER['REQUEST_METHOD'] == "POST" &&  $_POST['_method'] ==='delete' && isset($_POST['id']);
if($isValidDelete){

    require ('database.php');

    $statement = $pdo->prepare('DELETE FROM produits WHERE id = :id');
    $statement->execute([':id' => $_POST['id']]);

    header('Location:table_produits.php');
}