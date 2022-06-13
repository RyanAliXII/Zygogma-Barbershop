
<?php

if(session_id() == ''){
    session_start();
}
if(!isset($_SESSION['id']) && empty($_SESSION['id'] &&  $_SESSION['type'] == 'user')){
    header("Location: index.php");
}



?>