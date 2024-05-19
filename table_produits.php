<?php
    require ('database.php');
    $statement = $pdo->prepare('SELECT produits.id, produits.libelle AS produit_libelle, produits.product_description, produits.price, produits.quantity, categories.libelle AS categorie_libelle 
    FROM produits 
    JOIN categories ON produits.category_id = categories.id');
    $statement->execute();
    $produits= $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="icons/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Panier d'achats</title>
</head>
<body class="bg-gray-200">
    <div class="panier-container">
    <h1 class="panier-title text-center">Panier d'achats</h1>
    <table id="achats-table" class="table table-bordered">
        <thead>
            <tr class="table-head-row">
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantité</th>
            </tr>
        </thead>
        <tbody id="tdata">
            <?php foreach($produits as $produit) : ?>
                <tr>
                    <td><a href="produit.php?id=<?php echo $produit['id'] ?>" class="text-purple-500 font-bold text-decoration-none"><?php echo $produit['produit_libelle'] ?></a></td>
                    <td><?php echo $produit['product_description'] ?></td>
                    <td><?php echo $produit['categorie_libelle'] ?></td>
                    <td><?php echo $produit['price'] ?></td>
                    <td><?php echo $produit['quantity'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
</body>
</html>
