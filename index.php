<?php
    // remplir la liste deroulante (categories)
    require ('database.php');
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
    
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Beauty Haven</h1>
    </header>
    <div class="container">
        <form action="traitement.php" method="POST">
           <h3 class="form-title">ADD PRODUCT</h3>
           <div class="input-section">
            <label for="id">Code</label>
            <input type="text" id="id" name="id">
           </div> 
            <div class="input-section">
                <label for="libelle">Libelle</label>
                <input type="text" id="libelle" name="libelle" placeholder="Enter product name">
            </div>
            <div class="input-section">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id">
                    <option value="" selected disabled>Select product category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo ($category['id']); ?>">
                            <?php echo ($category['libelle']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                </select>
            </div>
            <div class="input-section">
                <label for="product_description">Description</label>
                <input type="text" name="product_description" id="product_description" placeholder="Product description">
            </div>
            <div class="input-section">
                <label for="Price">Price</label>
                <input type="text" name="price" id="price" placeholder="Enter the price">
            </div>
            <div class="input-section">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" >
            </div>
            <div class="btn-section">
                <button type="submit" id="save">SAVE</button>
                <!-- <button type="submit" id="add">ADD</button> -->
            </div>
            
        </form>
    </div>
   
    <script src="script.js"></script>
</body>
</html>