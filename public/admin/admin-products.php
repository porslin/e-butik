<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('../../src/config.php');

$products = $productDbHandler->FetchAllProducts();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin products</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="container">
        <h1>Admin products</h1>

        <nav id="main-nav">
            <a href="create-product.php">Create new product</a>
        </nav>

        <nav id="main-nav2">
            <a href="index.php">Admin home</a>
        </nav>

        <table class="content-table">
    
    <thead>
         
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
          <tr>

    
    </thead>

          <tbody id="data">
          
          <?php foreach($products as $product) : ?>
                        <tr id="data_products">
                            <td><?=htmlentities($product['id']) ?></td>
                            <td><img src="<?=$product['img_url']?>"height="100" width="100"></td>
                            <td><?=htmlentities($product['title']) ?></td>
                            <td><?=htmlentities($product['description']) ?></td>
                            <td><?=htmlentities($product['price']) ?> kr</td>
                            <td><?=htmlentities($product['stock']) ?></td>
                            <td>
                                <form action="update-product.php" method="GET">
                                    <input type="hidden" name="productId" value="<?=htmlentities($product['id']) ?>">
                                    <input type="submit" value="Update">
                                </form>

                                <form id="delete-form" action="" method="POST">
                                    <input type="hidden" name="productId" value="<?=htmlentities($product['id']) ?>">
                                    <input type="submit" name="deleteBtn" class="delbutton" id="<?php echo $product['id'] ?>" value="Delete">
                                </form>
                            </td>
                        
                        </tr>
                    <?php endforeach; ?>

          </tbody>
        </table>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="js/delete.js"></script>

  </body>
</html>
</body>
</html>
