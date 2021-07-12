<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../object/rating.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$rating = new Rating($db);

// set ID property of record to read
if(isset($_GET['username'])){
    $stmt = $rating->read($_GET['username']);
}else{
    http_response_code(404);
  
    // tell the user no items found
    echo json_encode(
        array("message" => "Query parameters are not set. No results.")
    );
    exit;
}

// check if more than 0 record found
$num = $stmt->rowCount();
if($num > 0) {
  
    // products array
    $result_arr = array();
    $result_arr["records"] = array();

    // check if more than 0 record found
    while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $item = array(
            "rating" => $rating,
            "commenter"=>$commenter,
            "description" => $description,
            "postDate" => $postDate
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
