<?php
    //afficher le formulaire pour modifier
    require('database.php');
    $produit = ['id' => '', 'libelle' => '', 'product_description' => '' , 'categorie_libelle' => '' , 'price' => '' , 'quantity' => ''];
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['_method']) && $_POST['_method'] === 'update') {
        $statement = $pdo->prepare('SELECT * FROM produits WHERE id = :id');
        $statement->execute([':id' => $_POST['id']]);
        $produit = $statement->fetch(PDO::FETCH_ASSOC);
    } 



    // remplir la liste deroulante (categories)
    
    $statement = $pdo->prepare('SELECT id, libelle FROM categories');
    $statement->execute();
    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);


    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="icons/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>Modifier le produit</title>
</head>
<body>
    <header>
        <h1>Beauty Haven</h1>
    </header>
    <div class="container">
        <form action="enregistrer_modif.php" method="POST">
           <h3 class="form-title">ADD PRODUCT</h3>
           <div class="input-section">
            <label for="id">Code</label>
            <input type="text" id="id" name="id" value="<?php echo $produit['id'] ?>">
           </div> 
            <div class="input-section">
                <label for="libelle">Libelle</label>
                <input type="text" id="libelle" name="libelle" placeholder="Enter product name" value="<?php echo $produit['libelle'] ?>">
            </div>
            <div class="input-section">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" value="<?php echo $produit['category_id'] ?>">
                    <option value="" selected disabled>Select product category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo htmlspecialchars($category['id']); ?>" <?php echo $category['id'] == $produit['category_id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category['libelle']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                </select>
            </div>
            <div class="input-section">
                <label for="product_description">Description</label>
                <input type="text" name="product_description" id="product_description" placeholder="Product description" value="<?php echo $produit['product_description'] ?>">
            </div>
            <div class="input-section">
                <label for="Price">Price</label>
                <input type="text" name="price" id="price" placeholder="Enter the price" value="<?php echo $produit['price'] ?>">
            </div>
            <div class="input-section">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" value="<?php echo $produit['quantity'] ?>" >
            </div>
            <div class="btn-section">
                <button type="submit" name="save" value="Save" id="save">Save</button>
            </div>
            
        </form>
    </div>
   
    <script src="script.js"></script>
</body>
</html>