<?php

   include "session_checker.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Complete Responsive Dentist Website Design Tutorial</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>

<!-- header section starts  -->

<header class="header fixed-top">

   <div class="container">

      <div class="row align-items-center justify-content-between">

         <a href="#home" class="logo"><img src="icon/logo.png"><span>Zygoma Barbershop</span></a>

         <nav class="nav">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#services">services</a>
            <a href="#reviews">reviews</a>
            <a href="#contact">contact</a>
         </nav>

         <a  href="appointment.php" class="link-btn" id="modal-btn">make appointment</a>
         <div class="dropdown">
            <div class="drop-btn">
            <img src="icon/usericon.png"><span class="fas fa-caret-down"></span>
            </div>
            <div class="tooltip"></div>
            <div class="wrapper">
               <ul class="menu-bar">
                  <li>
                     <a href="view.php">
                        <div class="icon">
                           <span class="fas fa-exchange-alt"></span>
                        </div>
                        Transaction
                     </a>
                  </li>

                  <li>
                     <a href="logout.php">
                        <div class="icon">
                           <span class="fas fa-sign-out-alt"></span>
                        </div>
                        Logout
                     </a>
                  </li>
               </ul>

               </ul>
            </div>
         </div>
      <script>
         const drop_btn = document.querySelector(".drop-btn span");
         const tooltip = document.querySelector(".tooltip");
         const menu_wrapper = document.querySelector(".wrapper");
         const menu_bar = document.querySelector(".menu-bar");
         const setting_drop = document.querySelector(".setting-drop");
         const help_drop = document.querySelector(".help-drop");
         const setting_item = document.querySelector(".setting-item");
         const help_item = document.querySelector(".help-item");
         const setting_btn = document.querySelector(".back-setting-btn");
         const help_btn = document.querySelector(".back-help-btn");
           drop_btn.onclick = (()=>{
             menu_wrapper.classList.toggle("show");
             tooltip.classList.toggle("show");
           });
           setting_item.onclick = (()=>{
             menu_bar.style.marginLeft = "-400px";
             setTimeout(()=>{
               setting_drop.style.display = "block";
             }, 100);
           });
           help_item.onclick = (()=>{
             menu_bar.style.marginLeft = "-400px";
             setTimeout(()=>{
               help_drop.style.display = "block";
             }, 100);
           });
           setting_btn.onclick = (()=>{
             menu_bar.style.marginLeft = "0px";
             setting_drop.style.display = "none";
           });
           help_btn.onclick = (()=>{
             help_drop.style.display = "none";
             menu_bar.style.marginLeft = "0px";
           });
      </script>


         <div id="menu-btn" class="fas fa-bars"></div>

      </div>

   </div>

</header>

<!--<div id="my-modal" class="modal">
   <div class="modal-content">
      <div class="modal-header">
         <span class="close">&times;</span>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">

      </div>
   </div>
</div>-->


<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

   <div class="container">

      <div class="row min-vh-100 align-items-center">
         <div class="content text-center text-md-left">
            <h3>We make the best deal for you.</h3>
            <p>Come forth and Do Yourself a Favor. Our service is not limited to any member of our society, all members of the public regardlessof race, gender and sexual orientation.</p>
            <a href="appointment.php" class="link-btn">make appointment</a>
         </div>
      </div>

   </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="BarbershopPic/owner.jpg" class="w-100 mb-5 mb-md-0" alt="">
            <img src="Barbershop/signature.png" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <span>about us</span>
            <h3>True Healthcare For Your Family</h3>
            <p>The Zygoma Barbershop was founded on the year 2011 by a bicolano
               Businessman bornand raised in Santo Domingo, Albay named Roger L.
               Pano after seeing small town need for a barbershop that would offer
               quality hairdressing and services at reasonable customer-friendly price.
               He opened the shop at Market Site Santo Domingo, Albay, His second eldest
               son, John Emil Dominc B. Siapno taken the full responsibility and
               management of the business on 2011 and now pursuing the mission of the
               barbershop to be the leading barbershop in their town in Albay.</p>
               <hr>
               <p>When Zygoma Barbershop had founded it only has 2 staff running the
                  business. The floor size of the barbershop is 215 sq. foot, considering
                  that the barbershop is located on lease establishment renovation is necessary
                  before opening a new business to make it attractive to more client.
                  The total cost of renovation including the equipment and materials
                  needed was ranging from 30-40 thousand pesos.
               </p>

            <a href="appointment.php" class="link-btn">make appointment</a>
         </div>
      </div>
   </div>

   <div class="container">
      <div class="row align-items-center">
         <div class="col-md-6 content">
            <h3>Our Mission</h3>
            <p>Remember to talk about your mission
               Why are you bulding this project?
               Who are you building this for/
               Why do you care so much about solving this problem
               Why should people care?
            </p>
         </div>
      </div>
   </div>
   <hr>

   <div class="container">
      <div class="row align-items-center">
         <div class="col-md-6 content">
            <h3>Team</h3>
            <p>Meet the People of the barbershop</p>
         </div>
         <div class="col-md-6 content">
            <div class="box-container container">
               <div class="box1">
                  <img src="BarbershopPic/john1.png" class="pic" alt="">
                  <h3>JOHN EMIL DOMINIC SIAPNO</h3>
                  <p>Manger & Owner</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row align-items-center">

         <div class="col-md-6 content">
            <div class="box-container container">
               <div class="box1">
                  <img src="BarbershopPic/monica1.png" class="pic" alt="">
                  <h3>MONICA GUERERO</h3>
                  <p>Manager & Owner</p>
               </div>
            </div>
         </div>

         <div class="col-md-6 content">
            <div class="box-container container">
               <div class="box1">
                  <img src="BarbershopPic/saniel2.jpg"class="pic" alt="" >
                  <h3>SANIEL S. CELZO</h3>
                  <p>Hairstylist & Beautician</p>
               </div>
            </div>
         </div>

         <div class="col-md-6 content">
            <div class="box-container container">
               <div class="box1">
                  <img src="BarbershopPic/robert1.jpg" class="pic" alt="">
                  <h3>ROBERT ALBAO</h3>
                  <p>Barber</p>
               </div>
            </div>
         </div>

         <div class="col-md-6 content">
            <div class="box-container container">
               <div class="box1">
                  <img src="BarbershopPic/carlo.jpg" class="pic" alt="">
                  <h3 >CARLO BALEAN</h3>
                  <p>Part Time Hairstylist & Beautician</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- about section ends -->


<!-- services section starts  -->

<section class="services" id="services">

   <h1 class="heading">Services & Pricing</h1>
   <h3>Our pricing is not expensive, but it's not
cheap either, it's exactly what it should be</h3>

   <div class="box-container container">

      <div class="box">
         <img src="BarbershopPic/treatment.jpg" alt="">
         <h3>Hair Treatment</h3>

      </div>

      <div class="box">
         <img src="BarbershopPic/cut7.jpg" alt="">
         <h3>Haircut For Women</h3>

      </div>

      <div class="box">
         <img src="BarbershopPic/cut.jpg" alt="">
         <h3>Haircut For Men</h3>

      </div>

      <div class="box2">
         <h3>Haircut</h3>
         <ul>
            <li>Haircut for Men       P50.00</li>
            <li>Haircut for Women starts P60.00</li>
         </ul>
      </div>

      <div class="box3">
         <h3>Hair Treatment</h3>
         <ul>
            <li>Hair Rebonding starts @
               <ul class="alignment">
                  <li>P700.00 (Short)</li>
                  <li>P900.00 (Regular)br><br></li>
                  <li>P1000.00 (Long)<br><br></li>
               </ul>
            </li>
            <li>Brazilian Blowouts starts @
               <ul class="alignment">
                  <li>P1,200.00 (Short)</li>
                  <li>P1,300.00 (Regular)</li>
                  <li>P1,500.00 (Long)</li>
               </ul>
            </li>
            <li>Hair Spa @ P200.00</li>
            <li>Hot Oil @ P300.00 </li>
            <li>Hair Dye
               <ul class="alignment">
                  <li>P200.00 (Vshort)</li>
                  <li>P400.00 (Short)</li>
                  <li>P600.00 (Regular)</li>
                  <li>P800.00 (Long)</li>
               </ul>
            </li>
         </ul>
      </div>

   </div>

</section>

<!-- services section ends -->

<!-- process section starts  -->

<section class="process">

   <h1 class="heading">OUR GALLERY</h1>
   <hr>
   <h2>HAIRCUT</h2>
   <div class="box-container container">
      <div class="box">
         <img src="BarbershopPic/cut1.jpg" alt="">
      </div>

      <div class="box">
         <img src="BarbershopPic/cut2.jpg" alt="">
      </div>

      <div class="box">
         <img src="BarbershopPic/cut2.jpg" alt="">
      </div>

   </div>
   <h2>HAIR TREATMENT</h2>
   <div class="box-container container">
      <div class="box">
         <img src="BarbershopPic/treat1.jpg" alt="">
      </div>

      <div class="box">
         <img src="BarbershopPic/treat2.jpg" alt="">
      </div>

      <div class="box">
         <img src="BarbershopPic/treat3.jpg" alt="">
      </div>

   </div>

</section>

<!-- process section ends -->

<!-- reviews section starts  -->

<section class="reviews" id="reviews">

<div class="container">
    	<h1 class="mt-5 mb-5">Zygoma Barbershop Reviews and Rating</h1>
    	<div class="card">
    		<div class="card-header">Reviews and Rating</div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Review</h3>
    				</div>
    				<div class="col-sm-4">
    					      <p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					      <p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>
                        </p>
    					      <p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>
                        </p>
    					      <p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>
                        </p>
    					      <p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>
                        </p>
    				</div>
    				<div class="col-sm-4 text-center">
    					<h3 class="mt-4 mb-3">Click Review Here</h3>
    					<button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    </div>

</section>


<!-- reviews section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

<div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h2 class="text-center py-2"> Contact Us </h2>
                            <hr>
                        <div class="card-body">
                            <form action="contactusprocess.php" method="POST">
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" name="lastname" id="lastname" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <input type="text" name="message" id="message" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                    <button class="btn btn-danger" type="reset">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

</section>
<section class="contact" id="contact">
<h1 class="heading"> Zygoma  Barbershop Location</h1>
   <div class = "colorbox1">
      <p class = "map"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3883.8192531679247!2d123.7744869140461!3d13.236657012589907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a1ab24be139be7%3A0x36f99ca9a479e1!2sZygoma%20Barbershop%20for%20Men%20and%20Women!5e0!3m2!1sen!2sph!4v1641658947648!5m2!1sen!2sph" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
   </div>


</section>

<!-- contact section ends -->

<!-- footer section starts  -->

<section class="footer">

   <div class="box-container container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>phone number</h3>
         <p>0946 577 4642</p>
         <p>Mon - Sun , 8:00 - 7:30 pm</p>
      </div>

      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>our address</h3>
         <p>Public Market, Ground Floor, Marketsite, Santo Domingo, Albay</p>
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>opening hours</h3>
         <p>00:07am to 10:00pm</p>
      </div>

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>email address</h3>
         <p>johnsiapno01@gmail.com</p>
      </div>

   </div>

   <div class="credit"> &copy; Website @ <?php echo date('Y'); ?> by <span>Zygoma Barbershop</span>  </div>

</section>

<!-- footer section ends -->










<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

<style>
.rounded-circle{
   text-align: center;
}
.rounded-circle .text-center{
   font-size: 30px;
}
.container{
   font-size: 20px;
}
.text-center h3{
   font-size: 20px;
}
.mb-5{
    text-align: center;
}

.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
</style>

<script>

$(document).ready(function(){

	var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        $.ajax({
            url:"submit_rating.php",
            method:"POST",
            data:{action:'load_data'},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

});

</script>
<!--<script>
    // Get DOM Elements
const modal = document.querySelector('#my-modal');
const modalBtn = document.querySelector('#modal-btn');
const closeBtn = document.querySelector('.close');

// Events
modalBtn.addEventListener('click', openModal);
closeBtn.addEventListener('click', closeModal);
window.addEventListener('click', outsideClick);

// Open
function openModal() {
  modal.style.display = 'block';
}

// Close
function closeModal() {
  modal.style.display = 'none';
}

// Close If Outside Click
function outsideClick(e) {
  if (e.target == modal) {
    modal.style.display = 'none';
  }
}

</script>-->
<style>

/*.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;

  width: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  margin: 10% auto;
  width: 100%;
  box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 7px 20px 0 rgba(0, 0, 0, 0.17);
  animation-name: modalopen;
  animation-duration: var(--modal-duration);
}

.modal-header h2,
.modal-footer h3 {
  margin: 0;
}

.modal-header {
  background: var(--modal-color);
  padding: 15px;
  color: #000000;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.modal-body {
  padding: 10px 20px;
  background: #fff;
}

.modal-footer {
  background: var(--modal-color);
  padding: 10px;
  color: #000000;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}
.modal-footer h3{
  text-align: center;
}

.close {
  color: #000000;
  float: right;
  font-size: 30px;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

@keyframes modalopen {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}*/



.dropdown img{
   float: center;
   width: 40px;

}
.dropdown .drop-btn{
  width: 75px;
  background: #242526;
  border-radius: 50px;
  line-height: 30px;
  font-size: 20px;
  font-weight: 500;
  color: #b0b3b8;
  padding: 5px 5px;
}
.dropdown .drop-btn span{
  float: right;
  line-height: 50px;
  font-size: 28px;
  cursor: pointer;
}
.dropdown .tooltip{
  position: absolute;
  right: 20px;
  bottom: -20px;
  height: 15px;
  width: 15px;
  background: #242526;;
  transform: rotate(45deg);
  display: none;
}
.dropdown .tooltip.show{
  display: block;
}
.dropdown .wrapper{
  position: absolute;
  top: 65px;
  right: 0;
  display: flex;
  width: 200px;
  overflow: hidden;
  border-radius: 5px;
  background: #242526;
  display: none;
  transition: all 0.3s ease;
}
.dropdown .wrapper.show{
  display: block;
  display: flex;
}
.wrapper ul{
  width: 400px;
  list-style: none;
  padding: 10px;
  transition: all 0.3s ease;
}
.wrapper ul li{
  line-height: 55px;
}
.wrapper ul li a{
  position: relative;
  color: #b0b3b8;
  font-size: 18px;
  font-weight: 500;
  padding: 0 10px;
  display: flex;
  border-radius: 8px;
  align-items: center;
  text-decoration: none;
}
.wrapper ul li:hover a{
  background: #3A3B3C;
}
ul li a .icon{
  height: 40px;
  width: 40px;
  margin-right: 13px;
  background: #ffffff1a;
  display: flex;
  justify-content: center;
  text-align: center;
  border-radius: 50%;
}
ul li a .icon span{
  line-height: 40px;
  font-size: 20px;
  color: #b0b3b8;
}
ul li a i{
  position: absolute;
  right: 10px;
  font-size: 25px;
  pointer-events: none;
}
.wrapper ul.setting-drop,
.wrapper ul.help-drop{
  display: none;
}
.wrapper .arrow{
  padding-left: 10px;
  font-size: 20px;
  font-weight: 500;
  color: #b0b3b8;
  cursor: pointer;
}
.wrapper .arrow span{
  margin-right: 15px;
}
</style>