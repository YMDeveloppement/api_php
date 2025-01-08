<?php

include_once './db_product.php';
include_once './models/category.php';

class Product{
    public $id;
    public $title;
    public $category;
    public $price;
    public $description;
    public $image;
    public $rating_count;
    public $rating_rate;

    public static $categories;
    

    public function __construct(){

    }
    
    public static function fill($title, $price, $description , $category ,  $rating_count, $image = null , $rating_rate = null) {
        $instance = new self();

        $instance->title = $title;
        $instance->price = $price;
        $instance->description = $description;
        $instance->category = $category;
        $instance->rating_count = $rating_count;
        $instance->rating_rate = $rating_rate;
        $instance->image = $image;
        return $instance;
    }  

    public static function getProducts(){
        global $conn;
        $data = [];
        if(!Product::$categories){
            Product::$categories = Category::get_categories();
        }
        $sql = "SELECT * FROM products";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $row['category'] =  Product::$categories[$row['category']]['label'];
                $data[] = $row;
            }
        } else {
            echo "0 results";
        }
       
        return $data;
    }
    
}