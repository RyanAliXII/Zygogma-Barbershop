<?php

    require_once("connection.php");

    if(isset($_POST['update']))
    {
        $id = $_GET['ID'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $haircut = $_POST['haircut'];
        $hairtreatment = $_POST['hairtreatment'];
        $staff = $_POST['staff'];
        $total = $_POST['total'];
        $date = $_POST['date'];
        $timeslot = $_POST['timeslot'];
        $status = $_POST['status'];
        $query = " update bookings set name = '".$name."', email='".$email."',haircut='".$haircut."',hairtreatment='".$hairtreatment."',staff='".$staff."',total='".$total."',date='".$date."',timeslot='".$timeslot."',status='".$status."' where id='".$id."'";
        $result = mysqli_query($con,$query);
        if($result)
        {
            header("location:view.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("location:view.php");
    }


?>