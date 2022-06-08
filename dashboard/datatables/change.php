<?php
    $connect = mysqli_connect("sql312.epizy.com", "epiz_31892178", "V0ucZCMaWq", "epiz_31892178_database");
    $query = mysqli_query($connect, "UPDATE bookings SET status='".$_POST['value']."' where id='".$_POST['id']."'");

    if($query){
        $q = mysqli_query($connect,"SELECT * FROM bookings WHERE id='".$_POST['id']."'");
        $data = mysqli_fetch_array($query);
        echo $data['$status'];
    }
?>