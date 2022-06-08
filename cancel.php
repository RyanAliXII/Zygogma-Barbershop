<?php

    require_once("connection.php");
    $id = $_GET['ID'];
    $query = " select * from bookings where id='".$id."'";
    $result = mysqli_query($con,$query);

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
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="bg-dark">

        <div class="container">
        <a href="view.php" class="back"><button>back </button></a>
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3">Cancel Appointment</h3>
                        </div>
                        <div class="card-body">


                            <form action="update.php?ID=<?php echo $id ?>" method="post">
                                <input  readonly type="text"  class="form-control mb-2" placeholder=" Name " name="name" value="<?php echo $name ?>"></h1>
                                <input readonly type="text" class="form-control mb-2" placeholder=" Haircut " name="haircut" value="<?php echo $haircut ?>">
                                <input readonly type="text" class="form-control mb-2" placeholder=" Hair Treatment " name="hairtreatment" value="<?php echo $hairtreatment ?>">
                                <input readonly type="text" class="form-control mb-2" placeholder=" Staff " name="staff" value="<?php echo $staff ?>">
                                <input readonly type="text" class="form-control mb-2" placeholder=" Total " name="total" value="<?php echo $total ?>">
                                <input readonly type="text" class="form-control mb-2" placeholder=" Date " name="date" value="0000-00-00">
                                <input readonly type="text" class="form-control mb-2" placeholder=" Timeslot " name="timeslot" value="00:00 - 00:00">
                                <input readonly type="text" class="form-control mb-2" placeholder=" Status " name="status" value="<?php echo $status ?>">

                                    <label for="">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Cancel" value="<?php echo $status?>">Cancel</option>
                                    </select>

                                <button class="btn btn-primary" name="update">Submit</button>
                            </form>


                        </div>
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