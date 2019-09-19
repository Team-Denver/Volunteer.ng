<?php

// required headers
header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
// header("Content-Type: application/json; charset=UTF-8");
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods,X-Requested-With');

// array holding allowed Origin domains
$allowedOrigins = array(
    '(http(s)://)?(www\.)?my\-domain\.com'
);

// if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] != '') {
//     foreach ($allowedOrigins as $allowedOrigin) {
//         if (preg_match('#' . $allowedOrigin . '#', $_SERVER['HTTP_ORIGIN'])) {
//             header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
//             header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
//             header('Access-Control-Max-Age: 1000');
//             header('Content-Type: application/json');
//             header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
//             break;
//         }
//     }
// }

// files needed to connect to database
include_once '../config/database.php';
include_once 'objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// instantiate user object
$user = new User($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// set product property values
// $user->email = $data->email;
$user->username = $data->username;
$user->password = $data->password;
// $email_exists = $user->emailExists();
$user_exists = $user->loginUser();

// check if email exists and if password is correct
if ($user_exists) {

    // Create array
    $user_arr = array(
        'user_id' => $user->user_id,
        'fullname' => $user->fullname,
        'username' => $user->username,
        'email' => $user->email,
        'phone' => $user->phone,
        'user_location' => $user->user_location,
        'stack' => $user->stack
    );


    // set response code
    http_response_code(200);

    // generate jwt
    // $jwt = JWT::encode($token, $key);
    echo json_encode(
        array(
            "message" => "Successful login.",
            "status" => true,
            "user" => $user_arr
        )
    );
}

// login failed
else {

    // set response code
    http_response_code(401);

    // tell the user login failed
    echo json_encode(array("message" => "Login failed.", "status" => false));
}
