<?php
include("db_conn.php");
extract($_POST);
$sql = "INSERT INTO `contactdata`(`firstname`, `lastname`, `email`, `message`) VALUES ('".$firstname."','".$lastname."','".$email."','".$message."')";
$result = $conn->query($sql);
if(!$result){
    die("Couldn't enter data: ".$conn->error);
}
/*echo "Thank You For Contacting Us ";*/
header("Location: index.php");
$conn->close();
?>