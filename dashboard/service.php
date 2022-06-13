<?php include('include/header.php');?>


<?php 






?>
        <div id="layoutSidenav">
            <?php include('include/navbar.php');?>
            <div id="layoutSidenav_content">
                <main>
                <!-- Button trigger modal -->
                <div style="width:75%; margin:5vh auto;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                 Add new service
                </button>
                <div style="width:50%">
                <table id="user_data" class="table table-bordered table-striped mt-5">
                             <thead>
                              <tr>
                                <th>Service name</th>
                                <th>Price</th>
                                <th>Estimated time of completion</th>
                              </tr>
                             </thead>
                             <tbody id="appointmentTableBody">
                             <?php
                             $fetch_query = "Select * from services";
                             $MINUTES_IN_HOURS = 60;
                             $records = mysqli_query($connect, $fetch_query ) or die(mysqli_error($connect));
                               while($row = mysqli_fetch_assoc($records)){ 
                             ?>
                            
                                    <tr>
                                        <td>
                                            <?php echo $row['service_name'];?>
                                        </td>
                                        <td>
                                            <?php echo $row['price'];?>
                                        </td>
                                        <td class="est-completion">
                                        <?php 
                                        
                                        
                                        $unit = $row['unit'];
                                        $estc = $row['est_completion'];
                                        if($unit == 'hour' ){
                                          $estc = $estc / $MINUTES_IN_HOURS;
                                          if($estc <= 1){
                                            echo "$estc $unit";
                                          }
                                          else{
                                            echo "$estc hours";
                                          }
                                         
                                        }
                                        else{
                                          if($estc <= 1){
                                            echo "$estc $unit";
                                          }
                                          else{
                                            echo "$estc minutes";
                                          }
                                        }
                                        
                                        
                                        
                                        ?>
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
        <h3 class="modal-title" id="exampleModalLongTitle">Add service</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST"  action="service_route.php">
  <div class="form-group">
    <label for="name">Service name</label>
    <input type="text" class="form-control" name="name"  placeholder="Enter service name">
    
  </div>
  <div class="form-group">
    <label for="price">Service price</label>
    <input type="number" class="form-control" name="price" placeholder="Price">
  </div>
  <label class="d-block">Estimated time of completion</label>
  <div class="form-group">
         
          <input type="number" name="service_completion" class="form-control" value="1">
          <select  name="unit" class="form-control mt-1">
            <option value="minute">Minutes</option>
            <option  value="hour">Hours</option>
          </select>                    

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
                            <td class="est-completion">

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