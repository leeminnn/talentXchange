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

// get search query
if( isset($_GET["g"]) && isset($_GET["y"]) && isset($_GET["t"]) && sizeof($_GET) == 3 ) {
    // Gender and yr of experience and talent
    $stmt = $info->search_by_gender_talent_age($_GET["g"], $_GET["t"], $_GET["y"]);
}
elseif( isset($_GET["g"]) && !isset($_GET["y"]) && isset($_GET["t"]) && sizeof($_GET) == 2 ) {
    // Gender and talent
    $stmt = $info->search_by_gender_talent($_GET["g"],$_GET["t"]);
}
elseif( isset($_GET["g"]) && isset($_GET["y"]) && !isset($_GET["t"]) && sizeof($_GET) == 2 ) {
    // Gender and Year of experience
    $stmt = $info->search_by_gender_age($_GET["g"],$_GET["y"]);
}
elseif( !isset($_GET["g"]) && isset($_GET["y"]) && isset($_GET["t"]) && sizeof($_GET) == 2 ) {
    // Talent and Year of experience
    $stmt = $info->search_by_talent_age($_GET["t"],$_GET["y"]);
}
elseif( isset($_GET["g"]) && !isset($_GET["y"]) && !isset($_GET["t"]) && sizeof($_GET) == 1 ) {
    // Gender only
    $stmt = $info->search_by_gender($_GET["g"]);
}
elseif( !isset($_GET["g"]) && isset($_GET["y"]) && !isset($_GET["t"]) && sizeof($_GET) == 1 ) {
    // Year of experience only
    $stmt = $info->search_by_age($_GET["y"]);
}
elseif( !isset($_GET["g"]) && !isset($_GET["y"]) && isset($_GET["t"]) && sizeof($_GET) == 1 ) {
    // Talent only
    $stmt = $info->search_by_talent($_GET["t"]);
}
else {
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no items found
    echo json_encode(
        array("message" => "Query parameters are not set. No results.")
    );
    exit;
}

$num = $stmt->rowCount();

// check if more than 0 record found
if($num > 0) {
  
    // products array
    $result_arr = array();
    $result_arr["records"] = array();
    
    while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $item = array(
            "username" => $username,
            
            "bio" => [
                "bio" => $bio,
                "gender" => $gender,
                "age" => $age,
                "contact" => $contact
            ],

            "talent" => [
                "talent_cat" => $talent_cat,
                "skill" =>$skill,
                "youtube" => $youtube
            ],
    
            "address" => [
                "postal" => $postal,
                "unit" => $unit
            ]
        );

        array_push($result_arr["records"], $item);
    }

    // Add info node (1 per response)
    $date = new DateTime(null, new DateTimeZone('Asia/Singapore'));
    $result_arr["info"] = array(
        "author" => "IS216_G2_T12",
        "response_datetime_singapore" => $date->format('Y-m-d H:i:sP')
    );
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data
    echo json_encode($result_arr);
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
