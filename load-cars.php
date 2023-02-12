<?php
    include("cars.php");
    $product = new Product();
    $products = $product->getAvailableProducts();
    $productData = array(
        "products" => $products	
    );
    echo json_encode($productData);
?>