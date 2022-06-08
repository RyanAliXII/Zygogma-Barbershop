<?php include('include/header.php');?>

        <div id="layoutSidenav">
            <?php include('include/navbar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Acitvity Log</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Activity Log Record</li>
                        </ol>
                        <div class="container box">
                        <?php

require_once("db_conn.php");
$query = " select * from contactdata ";
$result = mysqli_query($conn,$query);

?>



                        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                    <h2>Contact Us Records</h2>
                        <table class="table table-bordered">
                            <tr>
                                <td> ID </td>
                                <td> First Name </td>
                                <td> Last Name </td>
                                <td> Email </td>
                                <td> Message </td>
                            </tr>

                            <?php

                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $id = $row['id'];
                                        $firstname = $row['firstname'];
                                        $lastname = $row['lastname'];
                                        $email = $row['email'];
                                        $message = $row['message'];
                            ?>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $firstname ?></td>
                                        <td><?php echo $lastname ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $message ?></td>
                                    </tr>
                            <?php
                                    }
                            ?>


                        </table>
                    </div>
                </div>
            </div>
        </div>





                        <?php

require_once("db_conn.php");
$query = " select * from bookings ";
$result = mysqli_query($conn,$query);

?>


                        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                    <h2>Client Booking Records</h2>
                        <table class="table table-bordered">
                            <tr>
                                <td> ID </td>
                                <td> Name </td>
                                <td> Email </td>
                                <td> Hair Cut  </td>
                                <td> Hair Treatment </td>
                                <td> Staff </td>
                                <td> Total </td>
                                <td> Date </td>
                                <td> Timeslot </td>
                                <td> Satus </td>


                            </tr>

                            <?php

                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $email = $row['email'];
                                        $haircut = $row['haircut'];
                                        $hairtreatment = $row['hairtreatment'];
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
                                        <td><?php echo $haircut ?></td>
                                        <td><?php echo $hairtreatment ?></td>
                                        <td><?php echo $staff ?></td>
                                        <td><?php echo $total ?></td>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $timeslot ?></td>
                                        <td><?php echo $status ?></td>


                                    </tr>
                            <?php
                                    }
                            ?>


                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php

    require_once("db_conn.php");
    $query = " select * from clientusers ";
    $result = mysqli_query($conn,$query);

?>

        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                    <h2>Client Data Records</h2>
                        <table class="table table-bordered">
                            <tr>
                                <td> ID </td>
                                <td> Name </td>
                                <td> Password </td>
                                <td> Name </td>
                            </tr>

                            <?php

                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $id = $row['id'];
                                        $user_name = $row['user_name'];
                                        $password = $row['password'];
                                        $name = $row['name'];
                            ?>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $user_name ?></td>
                                        <td><?php echo $password ?></td>
                                        <td><?php echo $name ?></td>
                                    </tr>
                            <?php
                                    }
                            ?>


                        </table>
                    </div>
                </div>
            </div>
        </div>


        <?php

    require_once("db_conn.php");
    $query = " select * from adminusers ";
    $result = mysqli_query($conn,$query);

?>

        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                    <h2>Admin Records</h2>
                        <table class="table table-bordered">
                            <tr>
                                <td> ID </td>
                                <td> Name </td>
                                <td> Password </td>
                                <td> Name </td>
                            </tr>

                            <?php

                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $id = $row['id'];
                                        $user_name = $row['user_name'];
                                        $password = $row['password'];
                                        $name = $row['name'];
                            ?>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $user_name ?></td>
                                        <td><?php echo $password ?></td>
                                        <td><?php echo $name ?></td>
                                    </tr>
                            <?php
                                    }
                            ?>


                        </table>
                    </div>
                </div>
            </div>
        </div>


                        </div>
                    </div>
                </main>
                <?php include('include/footer.php');?>
            </div>
        </div>
        <?php include('include/scripts.php');?>
<?php include('include/endfooter.php');?>