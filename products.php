<?php

include_once './db_product.php';

$path = './json_files/productsData.php';
$jsonString = file_get_contents($path);
$jsonData = json_decode($jsonString, true);


$cats = [
    "men's clothing" => 1,
    "jewelery" => 2,
    "electronics" => 3,
    "women's clothing" => 4
];

foreach ($jsonData as $row) {

    // $sql = 'INSERT INTO `products`(`title`, `price`, `description`, `category`, `image`, `rating_rate`, `rating_count`) VALUES ("' . $row['title'] . '","' . $row['price'] . '","' . $row['description'] . '","' . $cats[$row['category']] . '","' . $row['image'] . '","' . $row['rating']['rate'] . '","' . $row['rating']['count'] . '")';
    // // echo $sql;exit;
    // $result = $conn->query($sql);
    // $affected = $conn->affected_rows;
    // if ($affected == 1) {
    //     echo 'Inserted';
    //     // return http_response_code(200);
    // } else {
    //     echo 'Did not insert';
    //     // return http_response_code(500);
    // }
}

echo '<pre>';
print_r($jsonData);
echo '</pre>';
exit;