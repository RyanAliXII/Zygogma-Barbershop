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
                 <script>
                     const fetchAppointments = async()=>{
                        const request = await fetch("datatables/fetch.php",{method:"GET"})
                        const response = await request.json();
                        populateTable(response.records)

                     }
                     const populateTable = (data)=>{
                        const rowTemplate = document.querySelector("#appointmentRowTemplate").content
                        const table = document.querySelector("#appointmentTableBody")
                        data.forEach((d)=>{
                            const tableRow = rowTemplate.cloneNode(true)
                            for (const[key, value] of Object.entries(d)){
                                const tr= tableRow.querySelector(`.${key}`)
                                if(tr){
                                    tr.innerText = value;
                                }
                               
                            }
                            tableRow.querySelector('.view-services').setAttribute('apnt-id', d.id)
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
                     fetchAppointments()
                 </script>
                <?php include('include/footer.php');?>
            </div>
        </div>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <?php include('include/scripts.php');?>
<?php include('include/endfooter.php');?>