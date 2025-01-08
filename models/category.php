<?php

include_once './db_product.php';

class Category{
    public $id;
    public $label;
    
    function __construct() {

    }

    public function get_label() {
        
    }
    public static function get_categories() {
        global $conn;
        $data = [];
        
        $sql = "SELECT * FROM categories";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $data[$row['id']] = $row;
            }
        } else {
            echo "0 results";
        }
       
        return $data;
    }
}