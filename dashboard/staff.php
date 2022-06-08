

<?php include('include/header.php');?>

         


        <div id="layoutSidenav">
            <?php include('include/navbar.php');?>
            <div id="layoutSidenav_content">
                <main>
                <!-- Button trigger modal -->
                <div style="width:75%; margin:5vh auto;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Add staff
                </button>
                <div style="width:50%">
                <table id="user_data" class="table table-bordered table-striped mt-5">
                             <thead>
                              <tr>
                                <th>Staff name</th>
                                <th>Email</th>
                               
                              </tr>
                             </thead>
                             <tbody id="appointmentTableBody">
                             <?php
                            $fetch_query = "SELECT * from clientusers where type = 'staff' ";
                             $records = mysqli_query($connect, $fetch_query ) or die(mysqli_error($connect));
                               while($row = mysqli_fetch_assoc($records)){ 
                             ?>
                            
                                    <tr>
                                        <td>
                                            <?php echo $row['name'];?>
                                        </td>
                                        <td>
                                            <?php echo $row['email'];?>
                                        </td>
                                    </tr>
                                <?php
                               }
                                ?>
                             </tbody>
                            </table>
                </div>
           

                </div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Add staff</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST"  action="staff_route.php">
  <div class="form-group">
    <label for="name">Staff name</label>
    <input type="text" class="form-control" name="name"  placeholder="Enter staff name">
    
  </div>
  <div class="form-group">
    <label for="price">Staff email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="price">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


                        
                         

                         
                </main>
                     <template id="appointmentRowTemplate">
                     <tr>
                            <td class="service-name">

                            </td>
                            <td class="service-price">

                            </td>
                            
                        </tr> 
                     </template>
                 <script>

                 </script>

                 
                <?php include('include/footer.php');?>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <?php include('include/scripts.php');?>
<?php include('include/endfooter.php');?>