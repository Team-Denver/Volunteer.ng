<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// files needed to connect to database
include_once '../config/database.php';
include_once 'objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// instantiate product object
$user = new User($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// set product property values
$user->fullname = $data->fullname;
$user->password = $data->password;
$user->email = $data->email;
$user->phone = $data->phone;
$user->user_location = $data->user_location;
$user->stack = $data->stack;

// create the user
if (
    !empty($user->fullname) &&
    !empty($user->email) &&
    !empty($user->phone) &&
    !empty($user->user_location) &&
    !empty($user->stack) &&
    !empty($user->password) &&
    $user->create()
) {

    // set response code
    http_response_code(200);

    // display message: user was created
    echo json_encode(array("message" => "User was created.", "status" => true));
}

// message if unable to create user
else {

    // set response code
    http_response_code(400);

    // display message: unable to create user
    echo json_encode(array("message" => "Unable to create user.", "status" => false));
}
