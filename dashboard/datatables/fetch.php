<?php
//fetch.php
include "../db_conn.php";
$connect = $conn;
// $columns = array('name', 'email', 'haircut', 'hairtreatment', 'staff', 'total', 'date', 'timeslot', 'status');
if($_SERVER['REQUEST_METHOD'] == "GET"){

    $query = "SELECT bookings.id,staff,date,timeslot,status, email,name,
    (select SUM(price)  from service_booking JOIN services on service_booking.services_id = services.service_id) as total  FROM db.bookings 
    JOIN clientusers on bookings.userid = clientusers.id";
    
    $result = mysqli_query($connect, $query);
    
    $list_of_appointments = array();
    $list_of_appointments['records'] = array();
       while($r = mysqli_fetch_assoc($result)) {
            extract($r);
       
            $appointment = array(
                "id"=> $id,
                "name"=> $name,
                "email"=> $email,
                "staff"=>$staff,
                "price"=>$total,
                "date"=>$date,
                "timeslot"=>$timeslot,
                "status"=>$status
    
            );
                array_push($list_of_appointments["records"], $appointment);
    
        }
    
    echo json_encode($list_of_appointments);


}

?>