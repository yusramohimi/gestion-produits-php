<?php 
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
       
        require ('database.php');
        $statement = $pdo -> prepare('SELECT produits.id, produits.libelle AS produit_libelle, produits.product_description, produits.price, produits.quantity, categories.libelle AS categorie_libelle 
        FROM produits 
        JOIN categories ON produits.category_id = categories.id WHERE produits.id = :id');
        $statement->execute([
            ':id' => $_GET['id']
        ]);

        $produit = $statement->fetch(PDO::FETCH_ASSOC);
    } 
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Product Card</title>
</head>
<body>
    <!-- component -->
<div class="mx-auto mt-11 w-80 transform overflow-hidden rounded-lg bg-white dark:bg-slate-800 shadow-md duration-300 hover:scale-105 hover:shadow-lg">
  <img class="h-48 w-full object-cover object-center" src="https://placehold.co/600x600/purple/white" alt="Product Image" />
  <div class="p-4">
    <h2 class="mb-2 text-lg font-medium dark:text-white text-gray-900"><?php echo $produit['produit_libelle'] ?></h2>
    <h2 class="mb-2 text-lg font-medium dark:text-white text-purple-500"><?php echo $produit['categorie_libelle'] ?></h2>
    <p class="mb-2 text-base dark:text-gray-300 text-gray-700"><?php echo $produit['product_description'] ?></p>
    <div class="flex items-center">
      <p class="mr-2 text-lg font-semibold text-gray-900 dark:text-white"><?php echo $produit['price'] ?> DH</p>
      <p class="ml-auto text-base font-medium text-purple-500">x <?php echo $produit['quantity'] ?></p>
    </div>
    <div class="flex justify-between mt-4">
       <form action="supprimer.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $produit['id'] ?>">
            <input type="hidden" name="_method" value="delete">
            <input type="submit" class="bg-red-500 text-white hover:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" value="Supprimer">
       </form>
       <form action="modifier.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $produit['id'] ?>">
            <input type="hidden" name="_method" value="update">
            <input type="submit" class="bg-green-500 text-white hover:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" value="Modifier">
       </form>  
    </div>
  </div>
</div>
</body>
</html>


