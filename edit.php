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

    $haircutvalue = "";
switch($haircut){
    case "50":
        $haircutvalue = "Men";;
    break;
    case "60":
        $haircutvalue = "Women";
    break;
    default:
        $haircutvalue = "none";
}

$haircuttreatmentvalue = "";
switch($hairtreatment){
    case "700":
        $haircuttreatmentvalue = "Hair Rebonding (Short)";
    break;
    case "900":
        $haircuttreatmentvalue = "Hair Rebonding (Regular)";
    break;
    case "1000":
        $haircuttreatmentvalue = "Hair Rebonding (Long)";
    break;
    case "1200":
        $haircuttreatmentvalue = "Brazilian Blowouts (Short)";
    break;
    case "1300":
        $haircuttreatmentvalue = "Brazilian Blowouts (Regular)";
    break;
    case "1500":
        $haircuttreatmentvalue = "razilian Blowouts (Long)";
    break;
    case "200":
        $haircuttreatmentvalue = "Hair Spa";
    break;
    case "300":
        $haircuttreatmentvalue = "Hair Oil";
    break;
    case "200":
        $haircuttreatmentvalue = "Hair Dye (Vshort)";
    break;
    case "400":
        $haircuttreatmentvalue = "Hair Dye (Short)";
    break;
    case "600":
        $haircuttreatmentvalue = "Hair Dye (Regular)";
    break;
    case "800":
        $haircuttreatmentvalue = "Hair Dye (Long)";
    break;
    default:
        $haircuttreatmentvalue = "none";
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>
	<script type="text/javascript">
		
		$(function() {

			function autoCalcSetup() {
				$('form#cart').jAutoCalc('destroy');
				$('form#cart tr.line_items').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
				$('form#cart').jAutoCalc({decimalPlaces: 2});
			}
			autoCalcSetup();


			$('button.row-remove').on("click", function(e) {
				e.preventDefault();

				var form = $(this).parents('form')
				$(this).parents('tr').remove();
				autoCalcSetup();

			});

			$('button.row-add').on("click", function(e) {
				e.preventDefault();

				var $table = $(this).parents('table');
				var $top = $table.find('tr.line_items').first();
				var $new = $top.clone(true);

				$new.jAutoCalc('destroy');
				$new.insertBefore($top);
				$new.find('input[type=text]').val('');
				autoCalcSetup();

			});

		});
		//-->
	</script>
</head>
<body class="bg-dark">

        <div class="container">
        <a href="view.php" class="back"><button>back </button></a>
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3">Edit Appointment</h3>
                        </div>
                        <div class="card-body">


                        <form id="cart" action="update.php?ID=<?php echo $id ?>" method="post">
                            <table name="cart">
                                    
                                <label for="">Name</label>
                                <input type="text"  class="form-control mb-2" name="name" value="<?php echo $name ?>"></h1>
                                <label for="">Email</label>
                                <input type="text"  class="form-control mb-2" name="email" value="<?php echo $email ?>"></h1>
                                <label for="">Hair Cut</label>
                                <input readonly type="text"  class="form-control mb-2" value="<?php echo $haircutvalue ?>">
                                <label for="">Hair Treatment</label>
                                <input readonly type="text" class="form-control mb-2" value="<?php echo $haircuttreatmentvalue ?>">

                                <label for="">Staff</label>
                                <input readonly type="text" class="form-control mb-2" name="staff" value="<?php echo $staff ?>">
                                <select name="staff" id="staff" class="form-control"  >
                                    <option value="<?php echo $staff ?>"></option>
                                    <option value="MeRobert Albaon">Robert Albao</option>
                                    <option value="Saneil Celso">Saneil Celso</option>
                                    <option value="Carlo Balean">Carlo Balean</option>
                                    <option value="ark Anthony Betito">Mark Anthony Betito</option>
                                </select>
                                <label for="">total</label>
                                <input readonly type="text" class="form-control mb-2"  value="<?php echo $total ?>">
                                <label for="">Date</label>
                                <input readonly type="text" class="form-control mb-2" name="date" value="<?php echo $date ?>">
                                <label for="">Time</label>
                                <input readonly type="text" class="form-control mb-2" name="timeslot" value="<?php echo $timeslot ?>">
                                <label for="">status</label>
                                <input readonly type="text" class="form-control mb-2" name="status" value="<?php echo $status ?>">
                                <ul class ="list-design">
                                        <li class="font">Choose Your service here: </li>
                                        <li>Hair Cut</li>
                                        <li><select name="haircut" id="haircut" class="form-control" >
                                                <option value="<?php echo $haircut ?>"></option>
                                                <option value="50">Men</option>
                                                <option value="60">Women</option>
                                            </select>
                                        </li>
                                        <li>Hair treatment</li>
                                        <li><select name="hairtreatment" id="hairtreatment" class="form-control" >
                                                <option value="<?php echo $hairtreatment ?>" ></option>
                                                <option value="700">Hair Rebonding (Short)</option>
                                                <option value="900">Hair Rebonding (Regular)</option>
                                                <option value="1000">Hair Rebonding (Long)</option>
                                                <option value="1200">Brazilian Blowouts (Short)</option>
                                                <option value="1300">Brazilian Blowouts (Regular)</option>
                                                <option value="1500">Brazilian Blowouts (Long)</option>
                                                <option value="200">Hair Spa</option>
                                                <option value="300">Hair Oil</option>
                                                <option value="200">Hair Dye (Vshort)</option>
                                                <option value="400">Hair Dye (Short)</option>
                                                <option value="600">Hair Dye (Regular)</option>
                                                <option value="800">Hair Dye (Long)</option>
                                            </select>
                                        </li>
                                        <li>Total</li>
                                        <li><input type="text" class="form-control mb-2" name="total" value="<?php echo $total ?>" jAutoCalc="{haircut} + {hairtreatment}"></li>
                                </ul>

                                <button class="btn btn-primary" name="update" value="update">Submit</button>
                            </table>
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

    .list-design {
        list-style-type: none;
    }
    .font{
        font-weight: bold;
        font-size: 20px;
    }

</style>