
<?php
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

<?php include('include/header.php');?>

        <div id="layoutSidenav">
            <?php include('include/navbar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Datatable</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Datatable</li>
                        </ol>
                            <div class="container box">
                           
                           <div class="table-responsive">
                           <br />
                            <div align="right">
                             <button type="button" name="add" id="add" class="btn btn-info">Add</button>
                            </div>
                            <br />
                            <div id="alert_message"></div>
                            <table id="user_data" class="table table-bordered table-striped">
                             <thead>
                              <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Staff</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Time Slot</th>
                               <th>Status</th>
                               <th>Services Availed</th>
                               <th>Actions</th>
                              </tr>
                             </thead>
                             <tbody id="appointmentTableBody">
                             
                             </tbody>
                            </table>
                            <div class="text-center">
                                <button onclick="window.print()" class="btn btn-primary">Print Report</button>
                            </div>
                           </div>
                          </div>
                        
                    </div> 
                    

                         
                </main>
                     <template id="appointmentRowTemplate">
                     <tr>
                            <td class="name">

                            </td>
                            <td class="email">

                            </td>
                            <td class="staff">

                            </td>
                            <td class="price">

                            </td>
                            <td class="date">

                            </td>
                            <td class="timeslot">

                            </td>
                            <td class="status">

                            </td>   
                            <td>
                               <button class="btn btn-primary view-services"  data-toggle="modal" onclick="fetchServices(this)" data-target="#servicesListModal">View services</button>
                            </td>
                            <td>
                                <div class="actions">
                                         <button class="btn btn-success done" action="done" onclick="markAppointment(this)"><i class="fa fa-check"></i></button>
                                         <button class="btn btn-danger cancel" action="cancel" onclick="markAppointment(this)"><i class="fa fa-times"></i></button>
                                         <button class="btn btn-primary edit" data-toggle="modal"data-target="#editAppointmentModal" onclick="setValues(this)">  <i class="fa fa-pencil" aria-hidden="true"></i></button>
                                </div>
                               <!-- <button class="btn btn-primary view-services"  data-toggle="modal" onclick="fetchServices(this)" data-target="#servicesListModal">View services</button> -->
                            </td>
                        </tr> 
                     </template>
                     <template id="serviceRowTemplate">
                        <tr>
                            <td class="service-name">

                            </td>
                            <td class="service-price">

                            </td>
                            
                        </tr> 
                     </template>


                     <div class="modal" id="servicesListModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Services Availed</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Service
                    </th>
                    <th>
                        Price
                    </th>
                </tr>
            </thead>
            <tbody id="servicesTbody">

            </tbody>
        </table>
        <h3 class="service-total"></h3>
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" id="editAppointmentModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Edit appointment</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                     <form id="editAppointmentForm">
                         <div class="form-group">
                         <select name="time" class="form-control editTimeSelect" required>
                                    <option></option> 
                                    <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
                                      foreach($timeslots as $ts){
                                    ?>
                                        <option value="<?php echo $ts; ?>"><?php echo $ts;?> </option>
                                        <?php
                                      }    
                                    ?>
                                    </select>
                         </div>
                         <div class="form-group">
                                      <label for="reason"></label>
                                  <textarea rows="1" cols="50" wrap="physical"  class="form-control" name="reason"></textarea>
                         </div>
                         <button class="btn btn-primary" type="submit">Update</button>
                     </form>

      </div> 
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>
                 <script>
                     const fetchAppointments = async()=>{
                        const queryString = window.location.search;
                        const urlParams = new URLSearchParams(queryString);
                        let filter = urlParams.get('filter')
                        if(filter == null){
                            filter = "total"  
                        }
                   
                            const request = await fetch(`datatables/fetch.php?filter=${filter}`,{method:"GET"})
                             const response = await request.json();
                     
                        populateTable(response.records)

                     }
                     const populateTable = (data)=>{
                        const rowTemplate = document.querySelector("#appointmentRowTemplate").content
                        const table = document.querySelector("#appointmentTableBody")
                        table.innerHTML = ""
                        data.forEach((d)=>{
                            const tableRow = rowTemplate.cloneNode(true)
                            for (const[key, value] of Object.entries(d)){
                                const tr= tableRow.querySelector(`.${key}`)
                                if(tr){
                                    tr.innerText = value;
                                }
                               
                            }
                            tableRow.querySelector('.view-services').setAttribute('apnt-id', d.id)
                            tableRow.querySelector('.actions').setAttribute('apnt-id', d.id)
                            tableRow.querySelector('.actions').setAttribute('time', d.timeslot)
                            tableRow.querySelector('.actions').setAttribute('client', d.client_id)
                            if(d.status === "done"){
                                        tableRow.querySelector('.actions').querySelector('.done').remove()
                            }
                            if(d.status === "cancel"){
                                        tableRow.querySelector('.actions').querySelector('.cancel').remove()
                            }
                            table.append(tableRow)
                        })
                        
                     }
                 

                     const fetchServices = async(el)=>{

                      const id = el.getAttribute('apnt-id')
                    
                       const request = await fetch(`service_route.php?id=${id}`,{
                           method:"GET"
                       })
                       const response = await request.json()
                       populateServicesTable(response.records)
                       
                     }
                     const populateServicesTable = (data)=>{
                        const servicesTbody = document.querySelector("#servicesTbody")
                        servicesTbody.innerHTML = " ";
                        const rowTemplate = document.querySelector("#serviceRowTemplate").content
                        let accumulator = 0;
                        const serviceTotal = document.querySelector(".service-total")
                        data.forEach((d)=>{
                            const tableRow = rowTemplate.cloneNode(true)
                            // console.log(tableRow.querySelector(".service_name"));
                            tableRow.querySelector(".service-name").innerText = d.name
                            tableRow.querySelector(".service-price").innerText = d.price
                            accumulator += parseInt(d.price)
                            servicesTbody.append(tableRow)
                        })
                        const tableRow = rowTemplate.cloneNode(true)
                        tableRow.querySelector(".service-name").innerHTML = "<strong>Total<strong>"
                        tableRow.querySelector(".service-price").innerHTML = `<strong>${accumulator} ₱<strong>`
                        servicesTbody.append(tableRow)
                        
                     }

                     const markAppointment = (e)=>{
                        const id = e.parentElement.getAttribute('apnt-id')
                        const action = e.getAttribute('action')
                        const text = action == 'done' ?  "Are you sure you want to accept this appointment?" : "Are you sure you want to cancel this appointment?"
                        Swal.fire({
                            title: 'Are you sure?',
                            text: text,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes'
                            }).then(async(result) => {
                            if (result.isConfirmed) {
                                const request = await fetch(`datatables/fetch.php?action=${action}&id=${id}`,{
                                    method:"PUT"
                                })

                                fetchAppointments();
                            }
                            })
                            
                     }
                     fetchAppointments()
                     
                     
                     const setValues = (e)=>{
                         
                            const select = document.querySelector(".editTimeSelect")
                          
                            select.parentElement.parentElement.setAttribute('apnt-id', e.parentElement.getAttribute('apnt-id'))
                            select.parentElement.parentElement.setAttribute('client', e.parentElement.getAttribute('client'))
                            select.value = e.parentElement.getAttribute('time')
                     }
                     const submitUpdates = async(e)=>{
                            e.preventDefault();
                            const id = e.target.getAttribute('apnt-id')
                            const clientId = e.target.getAttribute('client')
                            const form = new FormData(e.target)
                            const time = form.get('time')
                            const reason = form.get('reason')
                            const request = await fetch(`datatables/fetch.php?time=${time}&id=${id}&client_id=${clientId}&reason=${reason}`, {method:"PUT"})
                            const response = await request.text()
                            Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Appointment updated',
                                    showConfirmButton: false,
                                     timer: 1500
                                })
                            fetchAppointments();
                     }
                     document.querySelector('#editAppointmentForm').addEventListener('submit',submitUpdates)
                 </script>
                <?php include('include/footer.php');?>
            </div>
        </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>       
<?php include('include/scripts.php');?>
<?php include('include/endfooter.php');?>