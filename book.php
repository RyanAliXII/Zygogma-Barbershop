<?php
session_start(); 
$mysqli = new mysqli('localhost', 'root', 'password', 'db');

$duration = 10;
$cleanup = 0;
$start = "09:00";
$end = "15:00";

function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();

    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }

        $slots[] = $intStart->format("H:iA")." - ". $endPeriod->format("H:iA");

    }

    return $slots;
}

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


 

  </head>

  <body>
                            <div class="w-25 mt-5 mx-auto">
                            <form action="" id="appointmentForm" method="post">
                                <div class="form-group">
                                <div class="form-group">

                                    <input type="text" readonly name="time" class="form-control time-input">
                                    <label for="time">Time</label>
                                    <!-- <select name="time" class="form-control"> 
                                    <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
                                      foreach($timeslots as $ts){
                                    ?>
                                        <option value="<?php echo $ts; ?>"><?php echo $ts;?> </option>
                                        <?php
                                      }    
                                    ?>
                                    </select> -->
                                </div>
                                </div>
                                <div class="form-group">
                                    
                                <label for="">Services</label>
                                <select name="hairtreatment" id="hairtreatment" class="form-control select2-services" required multiple>
                                <?php
                                     $fetch_query = "Select * from services";
                                     $records = $mysqli->query($fetch_query ) or die(mysqli_error($connect));
                                      while($row = $records->fetch_assoc()){ 
                                ?>
                                            <option value=<?php  echo $row['service_id']; ?> service-price=<?php  echo $row['price'];?> service-estc=<?php  echo $row['est_completion'];?> service-estc-unit=<?php  echo $row['unit'];?>> <?php  
                                            
                                            $service_name = $row['service_name'];
                                            $price = $row['price'];
                                            echo  "$service_name ($price ₱) "; ?></option>
                                <?php
                            
                                      }
                                ?>
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Staff</label>
                                    <select name="staff" id="staff" class="form-control"  onchange="generateTime(this)" required>
                                    <option></option>
                                    <?php
                                     $fetch_query = "Select * from clientusers where type ='staff'";
                                     $date = $_GET['date'];
                                     $fetch_query_with_time ="
                                     Select staff_id, SUM(est_completion) as total_completion from bookings JOIN clientusers on bookings.staff_id = clientusers.id
                                     JOIN service_booking on bookings.id = service_booking.booking_id
                                      JOIN services on service_booking.services_id = services.service_id where type='staff' and bookings.date = '$date' GROUP BY staff_id 
                                       ";

                                     $result = $mysqli->query($fetch_query_with_time) or die(mysqli_error($connect));


                                     $availability_arr = array();

                                     while($row = $result->fetch_assoc()){
                                         $availability_arr[$row['staff_id']] = intval($row['total_completion']);
                                     }
                                   
                                     $records = $mysqli->query($fetch_query ) or die(mysqli_error($connect));
                                     $MINUTES_OF_OPERATION = 690; //minutes - 11hrs and 30minutes
                                      while($row = $records->fetch_assoc()){ 
                                             $user_id = $row['id'];
                                             $time_consumed_in_this_date = 0;
                                             if(array_key_exists($user_id, $availability_arr)){
                                                $time_consumed_in_this_date = $availability_arr[$user_id]; 
                                               
                                             }
                                          $availability  = ($time_consumed_in_this_date < $MINUTES_OF_OPERATION) ? "Available" : "Fully Booked" ;
                                          $isdisabled  = ($time_consumed_in_this_date < $MINUTES_OF_OPERATION) ? "" : "disabled" ;
                                         ?>
                                            <option value=<?php  echo $row['id']; ?>   <?php  echo $isdisabled?>  tcid=<?php  echo $time_consumed_in_this_date?> > 
                                            <?php 
                                            $name = $row['name'];
                                            echo  " $name - $availability";?>
                                            </option>
                                       
                                       <?php
                            
                                                }
                                         ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="number" value="0" class="form-control" readonly id="total">
                                </div>
                                <div class="form-group">
                                    <label>Estimated time of completion</label>
                                    <input type="text" value="0 minutes" class="form-control" readonly id="estc">
                                </div>
                                <div class="form-group pull-right">
                
                                    <button name="submit" type="submit" class="btn btn-primary mt-2">Submit</button>
                                </div>
                            </form>
                            </div>

                     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(".book").click(function(){
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");
        });
    </script>
    <style>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>

        const totalLabel = document.querySelector("#total")
        const estcLabel = document.querySelector("#estc")
        let estcTotal = 0;
        $(document).ready(function() {
              $('.select2-services').select2();
        });

        $('.select2-services').on('select2:select', function (e) {
            
            const serviceId = e.params.data.id;
            const el = Array.from(e.target.children).find((option)=>{

                    if(option.value == serviceId){
                        // console.log(option.getAttribute("service-price"))
                        return option
                    }
                    // console.log(option.getAttribute("service-price"))
            })
            totalLabel.value = parseInt(totalLabel.value) + parseInt(el.getAttribute("service-price"))

            const estc = parseInt(el.getAttribute('service-estc'))
            const unit =  el.getAttribute('service-estc-unit')
            estcTotal  += parseInt(estc) 
            estcLabel.value = toHoursAndMinutes(estcTotal)

            
});

const generateTime = (e)=>{
    const time = e.options[e.selectedIndex].getAttribute('tcid')
    let c = new Date(2021, 11, 25, 8, 0)
    c.setMinutes(c.getMinutes() + parseInt(time));
    const AM_PM = c.getHours() >= 12 ? 'PM': 'AM'
    let min = c.getMinutes()
        if (min < 10) { // or min = min < 10 ? '0' + min : min;
        min = '0' + min;
        } else {
        min = min + '';
        }
    const availableTime = `${c.getHours()}:${min}${AM_PM}`
     document.querySelector(".time-input").value = availableTime
}
$('.select2-services').on('select2:unselect', function (e) {
            
            const serviceId = e.params.data.id;
            const el = Array.from(e.target.children).find((option)=>{

                    if(option.value == serviceId){
                        // console.log(option.getAttribute("service-price"))
                        return option
                    }
                    // console.log(option.getAttribute("service-price"))
            })
            totalLabel.value = parseInt(totalLabel.value) - parseInt(el.getAttribute("service-price"))
           
            const estc = parseInt(el.getAttribute('service-estc'))
            const unit =  el.getAttribute('service-estc-unit')
            estcTotal  -= parseInt(estc) 
            estcLabel.value = toHoursAndMinutes(estcTotal)
            
});

            const toHoursAndMinutes = (totalMinutes)=> {
                const minutes = totalMinutes % 60;
                const hours = Math.floor(totalMinutes / 60);
                minute_unit = minutes > 1 ? 'minutes' : 'minute'
                hour_unit = hours > 1  ? 'hours': 'hour'
                return `${hours} ${hour_unit} ${minutes} ${minute_unit}`;
                }




    const appointmentForm = document.querySelector("#appointmentForm");
    const submitAppointment = async(event)=>{
            event.preventDefault()
            const formData = new FormData(event.target)
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const date = urlParams.get('date')

            const formJSON = {
                time: formData.get('time'),
                services: $('.select2-services').select2("val"),
                staff: formData.get('staff'),
                date
            }
            
        const request = await fetch("book_route.php",{
            method:"POST",
            headers: {
              "Content-Type": "application/json",  // sent request
                "Accept":       "application/json"   // expected data sent back
             },
            body: JSON.stringify(formJSON)
        })
        // const response = await request.text()
        const  r = await request.text();
        Swal.fire({
         position: 'center',
        icon: 'success',
         title: 'Appointment Created',
        showConfirmButton: false,
          timer: 1500
        })
       
    }
    appointmentForm.addEventListener("submit" , submitAppointment)
  


    </script>
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
