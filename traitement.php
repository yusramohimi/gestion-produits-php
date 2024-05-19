<?php
    require ("database.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'];
        $libelle = $_POST['libelle'];
        $product_description = $_POST['product_description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $category_id = $_POST['category_id'];
        $statement = $pdo ->prepare('INSERT INTO produits(id, libelle, product_description, price, quantity ,category_id) VALUES (:id, :libelle, :product_description, :price, :quantity, :category_id)');

        $statement -> execute([
            ':id' => $id,
            ':libelle' => $libelle,
            ':product_description' => $product_description,
            ':price' => $price,
            ':quantity' => $quantity,
            ':category_id' => $category_id,
        ]);
    }

    header("Location: table_produits.php");
    exit();
    
// $statement = $pdo ->prepare('SELECT * FROM produits');


// // executer la requete
// $statement -> execute();


// // Fetch data
// $results = $statement -> fetchAll(PDO::FETCH_ASSOC);


// echo'<pre>';

// var_dump($results);

// echo'</pre>';

// ?>
