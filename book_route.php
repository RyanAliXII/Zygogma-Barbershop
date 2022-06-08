<?php
include "db_conn.php";
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data = json_decode(file_get_contents("php://input"));

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $user_id = $_SESSION['id'] ;
    $query = "INSERT INTO bookings (staff,date,timeslot, status, userid) VALUES('$data->staff', '$data->date', '$data->time', 'pending', $user_id)";
    mysqli_query($conn, $query);
    $booking_id = mysqli_insert_id($conn);


    for ($x = 0; $x < count($data->services); $x++) {
        $service =  $data->services[$x];
        $insert_service_booking_query = "INSERT INTO service_booking (booking_id, services_id) VALUES($booking_id, $service)";
        mysqli_query($conn, $insert_service_booking_query);
    }
      

     http_response_code(201);
    echo json_encode(array("message" =>"Success"));
}

?>