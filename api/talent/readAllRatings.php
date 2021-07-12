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
$allRatings = new Rating($db);

// query products
$stmt = $allRatings->readAll();
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
            "commenter" => $commenter,
            "rating" => $rating,
            "description" => $description,
            "postDate" => $postDate,

            "talent" => [
                "talent_cat" => $talent_cat,
                "skill" => $skill,
                "yr_exp" => $yr_exp,
                "youtube" => $youtube
            ],

            "bio" => [
                "bio" => $bio,
                "gender" => $gender,
                "age" => $age,
                "contact" => $contact,
                "img" => $img
            ],

        );

        array_push($result_arr["records"], $item);
    }

    // Add info node (1 per response)
    $date = new DateTime(null, new DateTimeZone('Asia/Singapore'));
    $result_arr["author"] = array(
        "author" => "TalentXchange",
        "response_datetime_singapore" => $date->format('Y-m-d H:i:sP')
    );

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
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
