<?php
$connect = mysqli_connect("sql312.epizy.com", "epiz_31892178", "V0ucZCMaWq", "epiz_31892178_database");
if(isset($_POST["id"]))
{
 
 $total = mysqli_real_escape_string($connect, $_POST["total"]);
 $query = "UPDATE bookings SET ".$_POST["name"]."='".$total."' WHERE id = '".$_POST["id"]."'";  

 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
}
?>