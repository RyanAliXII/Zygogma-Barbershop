<?php
  
    require_once("connection.php");
    session_start();
    include "session_checker.php";

    $account_type = $_SESSION['type'];
    
 
    $user_id = $_SESSION['id'];
    $query = "SELECT bookings.id,staff.name as staff_name,date,timeslot,status, client.email as client_email,client.name as client_name,
    (select SUM(price)  from service_booking JOIN services on service_booking.services_id = services.service_id where service_booking.booking_id = bookings.id ) as total  
    FROM db.bookings 
    INNER JOIN clientusers as client on bookings.userid = client.id
    INNER JOIN clientusers as staff on bookings.staff_id = staff.id 
    WHERE bookings.userid = $user_id";
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
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>  
<title>View Records</title>
</head>
<body>

        <div class="container">
        <!-- <a href="home.php" class="back"><button>back </button></a> -->
        <h3>My Appointments</h3>
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Staff </td>
                                <th> Total </th>
                                <th> Date </th>
                                <th> Timeslot </th>
                                <th> Status </th>
                                <th></th>
                            </tr>

                            <?php

                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $id = $row['id'];
                                        $name = $row['client_name'];
                                        $email = $row['client_email'];
                                        $staff = $row['staff_name'];
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
                                        <td> 
                                            <div class="actions" apnt-id=<?php echo $row['id']?>>
                                            <?php
                                                if($row['status'] == 'pending'){
                                            ?>
                                             <button class="btn btn-danger cancel" action="cancel" onclick="markAppointment(this)"><i class="fa fa-times"></i></button>
                                             <?php
                                             }?>
                                            </div>
                                        </td></td>
                                        
                                       

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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
           const markAppointment = (e)=>{
                        const id = e.parentElement.getAttribute('apnt-id')
                        const action = e.getAttribute('action')
                        const text = action == 'done' ?  "Are you sure you want to accept this appointment?" : "Are you sure you want to cancel this appointment?"
                        Swal.fire({
                            title: 'Are you sure?',
                            text: text,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes'
                            }).then(async(result) => {
                            if (result.isConfirmed) {
                                const request = await fetch(`dashboard/datatables/fetch.php?action=${action}&id=${id}`,{
                                    method:"PUT"
                                })
                                location.reload()
                            }
                            })
                            
                     }
</script>       
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