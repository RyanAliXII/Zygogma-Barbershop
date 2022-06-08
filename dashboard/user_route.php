<?php
include "db_conn.php";
session_start();
 $connect = $conn;
if($_SERVER['REQUEST_METHOD'] == "PUT"){

  $user_id = $_SESSION['id'];
  $newStatus = 0;
  if($_GET['currentStatus'] == 0){
    $newStatus = 1;
    $_SESSION['isAvailable'] = $newStatus;
    
  }
  else{
    $newStatus = 0;
  }
  $_SESSION['isAvailable'] = $newStatus;
  $update_status_query = "UPDATE clientusers SET isAvailable = $newStatus where id = $user_id";
  mysqli_query($connect, $update_status_query);
  echo json_encode(array("message"=>"SUCCESS"));
}



 ?>