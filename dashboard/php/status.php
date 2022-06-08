<?php    
if(isset($id) && isset($status)){
    include('db_conn.php');
    $id = $_GET['id'];
    $status = $_GET['status'];
    
    $q = "UPDATE bookings SET status = $status WHERE id=$id";

    mysql_queryli($conn, $q);
}
header('location:Datatables.php');
?>