<?php
require('../src/config.php');
include('./layout/header.php'); 


	$pageTitle = "All products";
    $pageId    = "products";

$products = $productDbHandler->FetchAllProducts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style2.css?v=<?php echo time();?>">
	
</head>
<body>

	<main>
		<ul id="list-group">
			<?php foreach($products as $product) { ?>
				<li id="list-group-item">

					<div id="img-container">
						<a href="product.php?id=<?=htmlentities($product['id']) ?>">
							<img class="prods "src="./admin/<?=htmlentities($product['img_url']) ?>" width="200">
						</a>
					</div>
					<p>
						<h6><?=htmlentities($product['title']) ?></h6>
						<i>Stock: <?=htmlentities($product['stock']) ?></i><br>
						<?=htmlentities($product['price'])?> kr<br>	
					</p>
					<br>
					<form action="add-cart-item.php" method="POST">
						<input type="hidden" name="productId" value="<?=htmlentities($product['id']) ?>">
						<input type="number" id="quantity" name="quantity" min="00" max="<?=htmlentities($product['stock']) ?>" value="1">
						<input type="submit" name="addToCart" class="button"value="Add to Cart">
					</form>
				
				</li>
			<?php } ?>
		</ul>
	</main>

	<?php include('./layout/footer.php'); ?>

	<script>

if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
</script> 

</body>
</html>


