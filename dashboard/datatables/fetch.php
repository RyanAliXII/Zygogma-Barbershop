<?php
//fetch.php
session_start();
include "../db_conn.php";
$connect = $conn;
// $columns = array('name', 'email', 'haircut', 'hairtreatment', 'staff', 'total', 'date', 'timeslot', 'status');
// header("Access-Control-Allow-Methods: GET, POST, PUT");
if($_SERVER['REQUEST_METHOD'] == "GET"){
    
    $user_type = $_SESSION['type'];

    $query = "";
    $filter = $_GET['filter'];
    if($user_type == 'admin'){

       
        if($filter == 'total'){
            $query = "SELECT bookings.id,staff.name as staff_name,date,timeslot,status, client.email as client_email,client.name as client_name,bookings.userid as client_id,
            (select SUM(price)  from service_booking JOIN services on service_booking.services_id = services.service_id where service_booking.booking_id = bookings.id ) as total  
            FROM db.bookings 
            INNER JOIN clientusers as client on bookings.userid = client.id
            INNER JOIN clientusers as staff on bookings.staff_id = staff.id";
        }
        else{
            $query = "SELECT bookings.id,staff.name as staff_name,date,timeslot,status, client.email as client_email,client.name as client_name, bookings.userid as client_id,
            (select SUM(price)  from service_booking JOIN services on service_booking.services_id = services.service_id where service_booking.booking_id = bookings.id ) as total  
            FROM db.bookings 
            INNER JOIN clientusers as client on bookings.userid = client.id
            INNER JOIN clientusers as staff on bookings.staff_id = staff.id WHERE status ='$filter' ";
        }
        
    }
    else{
        $user_id = $_SESSION['id'];
        if($filter == 'total'){
        $query = "SELECT bookings.id,staff.name as staff_name,date,timeslot,status, client.email as client_email,client.name as client_name,bookings.userid as client_id,
        (select SUM(price)  from service_booking JOIN services on service_booking.services_id = services.service_id where service_booking.booking_id = bookings.id ) as total  
        FROM db.bookings 
        INNER JOIN clientusers as client on bookings.userid = client.id
        INNER JOIN clientusers as staff on bookings.staff_id = staff.id 
        WHERE staff_id = $user_id";
        }else{
            $query = "SELECT bookings.id,staff.name as staff_name,date,timeslot,status, client.email as client_email,client.name as client_name,bookings.userid as client_id,
            (select SUM(price)  from service_booking JOIN services on service_booking.services_id = services.service_id where service_booking.booking_id = bookings.id ) as total  
            FROM db.bookings 
            INNER JOIN clientusers as client on bookings.userid = client.id
            INNER JOIN clientusers as staff on bookings.staff_id = staff.id 
            WHERE staff_id = $user_id AND status='$filter'";
        }
    }
    
    $result = mysqli_query($connect, $query);
    
    $list_of_appointments = array();
    $list_of_appointments['records'] = array();
       while($r = mysqli_fetch_assoc($result)) {
            extract($r);
       
            $appointment = array(
                "id"=> $id,
                "name"=> $client_name,
                "client_id"=>$client_id,
                "email"=> $client_email,
                "staff"=>$staff_name,
                "price"=>$total,
                "date"=>$date,
                "timeslot"=>$timeslot,
                "status"=>$status
    
            );
                array_push($list_of_appointments["records"], $appointment);
    
        }
    
    echo json_encode($list_of_appointments);


}


if($_SERVER['REQUEST_METHOD'] == "PUT"){
    if(isset($_GET['id']) && isset($_GET['action'])){
     $id = $_GET['id'];
    $action = $_GET['action'];
    $query= "UPDATE bookings SET status = '$action' where id = $id";
    $result = mysqli_query($connect, $query);
 
    echo json_encode(array("message"=>"Booking status updated"));
    }
    if(isset($_GET['id']) && isset($_GET['time'])){
        
         $id = $_GET['id'];
         $time = $_GET['time'];
         $query= "UPDATE bookings SET timeslot = '$time' where id = $id";
         $client_id  = $_GET['client_id'];
         $reason =  $_GET['reason'];
         $reason = "Your appoinment with appointment id $id has been moved to $time. Reason: $reason";
         $insert_notif_query = "INSERT INTO notifications (user_id,text) VALUES ($client_id,'$reason')";
         mysqli_query($connect, $insert_notif_query);
         mysqli_query($connect, $insert_notif_query);
         echo json_encode(array("message"=>"Booking time updated"));
    } 
    

}
?>