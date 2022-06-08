<?php
  
    require_once("connection.php");
    session_start();
    include "session_checker.php";

    $account_type = $_SESSION['type'];
    $query = "select * from bookings ";
    if($account_type == 'user'){
        $user_id = $_SESSION['id'];
        $query = "SELECT bookings.id,staff,date,timeslot,status, email,name,
        (select SUM(price)  from service_booking JOIN services on service_booking.services_id = services.service_id) as total  FROM db.bookings 
        JOIN clientusers on bookings.userid = clientusers.id where bookings.userid = $user_id";
    }
    else{
        
    }
   
    $result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>View Records</title>
</head>
<body>

        <div class="container">
        <a href="home.php" class="back"><button>back </button></a>
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <td> ID </td>
                                <td> Name </td>
                                <td> Email </td>
                                <td> Staff </td>
                                <td> Total </td>
                                <td> Date </td>
                                <td> Timeslot </td>
                                <td> Status </td>
                                <td> Edit  </td>
                                <td> Cancel  </td>
                            </tr>

                            <?php

                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $email = $row['email'];
                                        $staff = $row['staff'];
                                        $total = $row['total'];
                                        $date = $row['date'];
                                        $timeslot = $row['timeslot'];
                                        $status = $row['status'];
                            ?>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $staff ?></td>
                                        <td><?php echo $total ?></td>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $timeslot ?></td>
                                        <td><?php echo $status ?></td>
                                        <td><a href="edit.php?ID=<?php echo $id ?>">Edit</a></td>
                                        <td><a href="cancel.php?ID=<?php echo $id ?>">Cancel</a></td>

                                    </tr>
                            <?php
                                    }
                            ?>


                        </table>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>
<style>
    .container{
        padding-top:50px;
    }

    .back button{
        color: #0a0a0a;
        width: 100px;
        height: 30px;
        font-size: 13px;
        font-weight: bold;
        border-radius: 5px;
    }

    .back button:hover {
        background-color: #389fee;
    }

</style>