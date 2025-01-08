<?php

include_once './models/product.php';


// function add(Product $product){
//     // Product::fill(null);
// }

if(isset($_GET['products'])){
    $products =  Product::getProducts() ;
    echo '<pre>';
    print_r($products);
    echo '</pre>';
    exit;
}
