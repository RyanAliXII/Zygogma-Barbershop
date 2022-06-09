
<?php
include '../db_conn.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){  
    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $service_completion = $_POST['service_completion'];
    $unit = $_POST['unit'];

    $MINUTES_PER_HOUR = 60;
    if($unit == 'hour'){
        $service_completion = $service_completion *  $MINUTES_PER_HOUR;
    }

    $query = "INSERT INTO services(service_name, price, est_completion, unit) VALUES('$name', $price, $service_completion, '$unit')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    // if (mysqli_query($connect, $sql)) {
    //     echo "New record created successfully";
    //   } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    //   }
    header("Location: service.php");
}



if($_SERVER['REQUEST_METHOD'] == "GET"){
      $id = $_GET['id'];
      $query = "SELECT * FROM service_booking JOIN services on service_booking.services_id = services.service_id WHERE booking_id = $id";

      $result = mysqli_query($conn, $query);
    
    $list_of_services = array();
    $list_of_services['records'] = array();
       while($r = mysqli_fetch_assoc($result)) {
            extract($r);
       
            $service= array(
                "name"=>$service_name,
                "price"=> $price,
                "est_completion"=> $est_completion
    
            );
                array_push($list_of_services["records"], $service);
    
        }
    
    echo json_encode($list_of_services);
}

?>