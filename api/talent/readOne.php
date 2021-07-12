<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../object/info.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$info = new Info($db);

// set ID property of record to read
$info->username = isset($_GET['username']) ? $_GET['username'] : die();
  
// read the details of product to be edited
$info->readOne();

// check if more than 0 record found
if($info->username != null) {

    // Add info node (1 per response)
    $date = new DateTime(null, new DateTimeZone('Asia/Singapore'));

    // create array
    $item = array(
        "username" => $info->username,
            
        "bio" => [
            "bio" => $info->bio,
            "gender" => $info->gender,
            "age" => $info->age,
            "contact" => $info->contact,
            "img" => $info->img,
            "firstname" => $info->firstname,
            "lastname" => $info->lastname,
            "email" => $info->email,
            "occupation" => $info->occupation,
            "prevschool" => $info->prevschool
        ],

        "talent" => [
            "talent_cat" => $info->talent_cat,
            "skill" => $info->skill,
            "yr_exp" => $info->yr_exp,
            "youtube" => $info->youtube
        ],

        "address" => [
            "postal" => $info->postal,
            "unit" => $info->unit,
            "addr" => $info->addr,
            "region" => $info->region,
            "country" => $info->country
        ],


        "info" => [
            "author" => "IS216_G2_T12",
            "response_datetime_singapore" => $date->format('Y-m-d H:i:sP')
        ]
    );

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($item);
}
else {
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no items found
    echo json_encode(
        array("message" => "No records found.")
    );
}
?>
