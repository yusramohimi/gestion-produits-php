<?php
require('database.php');
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['save'])) {
    $statement = $pdo->prepare('UPDATE produits SET libelle = :libelle, product_description = :product_description , price = :price ,quantity = :quantity , category_id = :category_id WHERE id = :id');
    $statement->execute([
        ':id' => $_POST['id'],
        ':libelle' => $_POST['libelle'],
        ':product_description' => $_POST['product_description'],
        ':price' => $_POST['price'],
        ':quantity' => $_POST['quantity'],
        ':category_id' => $_POST['category_id'],
        
    ]);
    
    header('Location:table_produits.php');


}