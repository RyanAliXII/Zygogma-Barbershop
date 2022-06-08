<?php
$connect = mysqli_connect("sql312.epizy.com", "epiz_31892178", "V0ucZCMaWq", "epiz_31892178_database");
if(isset($_POST["name"], $_POST["email"], $_POST["haircut"], $_POST["hairtreatment"], $_POST["staff"], $_POST["total"], $_POST["date"], $_POST["timeslot"]))
{
 $name = mysqli_real_escape_string($connect, $_POST["name"]);
 $email = mysqli_real_escape_string($connect, $_POST["email"]);
 $haircut = mysqli_real_escape_string($connect, $_POST["haircut"]);
 $hairtreatment = mysqli_real_escape_string($connect, $_POST["hairtreatment"]);
 $staff = mysqli_real_escape_string($connect, $_POST["staff"]);
 $total = mysqli_real_escape_string($connect, $_POST["total"]);
 $date = mysqli_real_escape_string($connect, $_POST["date"]);
 $timeslot = mysqli_real_escape_string($connect, $_POST["timeslot"]);

 $query = "INSERT INTO bookings(name, email, haircut, hairtreatment, staff, total, date, timeslot) VALUES('$name', '$email', '$haircut', '$hairtreatment', '$staff', '$total', '$date', '$timeslot')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>