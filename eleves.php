<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
// header("Content-Type:application/json");

// echo '<pre>';
//     print_r($_SERVER['REQUEST_METHOD']);
// echo '<pre>';
// exit;

// print_r ($_SERVER['REQUEST_METHOD']);
// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     echo 'options0';
//     http_response_code(500);
//     exit();
// }
// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     http_response_code(200);
//     exit();
// }
include_once './db.php';

function get_eleves()
{

    global $conn;
    $data = [];

    $sql = "SELECT * FROM eleves";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        echo "0 results";
    }
    return $data;
}

if (isset($_GET['eleves'])) {
    $eleves = get_eleves();
    echo json_encode($eleves);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST)) {
    
    $inputJSON = file_get_contents('php://input');
    $data = json_decode($inputJSON, true); // true converts it to an associative array
    print_r($data); // Output: Array ( [key] => value )

    // print_r($_POST) ;
    exit;
    if (isset($_POST['id'])) {
    } else {
        set_eleves($_POST);
    }
}

function set_eleves($data)
{


    global $conn;
    $dateNaissance =  $data['dateNaissance'] ? $data['dateNaissance'] : date('Y-m-d');

    $sql = "insert into eleves(nom, prenom,dateNaissance) values('".$data['nom']."','".$data['prenom']."' ,'".$dateNaissance."')";
    $result = $conn->query($sql);
    $affected = $conn->affected_rows;

    if ($affected == 1) {
        echo 'Inserted';
        return http_response_code(200);

    } else {
        echo 'Did not insert';
        return http_response_code(500);

    }
}

