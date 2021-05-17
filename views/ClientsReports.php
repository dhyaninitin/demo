<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      Clients 
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Clients</li>
      </ol>
      </h1>
    </section>

 
    <section class="content">
 
      <div class="row">
       
        <section class="col-lg-12 connectedSortable">
        <div class="box">
            <div class="box-header">
                <div calss="row" style="float:right;">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Add_client" data-toggle="tooltip" data-placement="top" title="Add New Client"><i class="fa fa-plus-circle"></i> Add Client</button>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Export Client"><i class="fa fa-download"></i> Export Data(Excel)</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-6 box-body whitee">
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Co. Name</th>
                  <th>Client Name</th>
                  <th>Mobile</th>
                  <th>No INV</th>
                  <th>No Quote </th>
                  <th>Total Payment</th>
                  <th>Balance Payment</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $client=mysqli_query($con,"SELECT * FROM tapp_clients WHERE black_list ='0'");
                    $cnt = 1;
                         while($clients=mysqli_fetch_assoc($client)) {?>
                            <tr>
                              <td><?php echo  $cnt;?></td>
                              <td><?php echo $clients['company_name'];?></td>
                              <td><?php echo $clients['client_name'];?></td>
                               <td><?php echo $clients['phone_number'];?></td>
                               <td><?php $invoice = mysqli_query($con,"SELECT * FROM invoices WHERE clientname ='".$clients['id']."' GROUP BY invoicenumber ");
                                                
                                echo mysqli_num_rows($invoice); ?></td>
                              <td><?php echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM newquotation WHERE clientname ='".$clients['id']."' GROUP BY invoicenumber ")); ?></td>

                              <td><?php $a=0; while($invoi=mysqli_fetch_assoc($invoice)) { $a+=floatval($invoi['totalpayment']);} echo $a;   ?></td>
                               <td><?php $b=0; while($invoi=mysqli_fetch_assoc($invoice)) { $b+=floatval($invoi['balance_payment']);} echo floatval($a) - floatval($b);   ?></td>
                              <td>
                                <!-- <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deletclient('<?php echo $clients['id']?>')" ><i class="fa fa-trash"></i></button> -->
                                <a href="Client-allReports&Client=<?php echo $clients['id']; ?>" type="submit" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Check <?php echo $clients['client_name'];?> Report"><i class="fa fa-list"></i></a>

                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#ban_client" data-toggle="tooltip" data-placement="top" title="Add to Black List" onclick="blacklistclient('<?php echo $clients['id']?>')"><i class="fa fa-ban"></i></button>
                              </td>
                            </tr>
                    <?php $cnt = $cnt+1; } ?>
                </tbody>
              </table>
            </div>
        </div> 

                    <!-- Add Modal  -->
                <div class="modal fade" id="Add_client">
                    <div class="modal-dialog" style="width: 800px;">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add New Client</h4>
                        </div>
                        <div class="modal-body">
                        <form role="form" action="Addclient" method="POST">
                            <input type="hidden" name="page_name" value="ClientsReports">
                            <div class=" row box-body ">
                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Company Name</label>
                                    <input type="text" class="form-control" name="company_name"  placeholder="Company Name" required="">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Client Name</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control"  name="client_name" placeholder="Contact Name" required="">
                                        </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst"  >Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="number" class="form-control" name="phone_number" placeholder="Phone Number" required="">
                                        </div>
                                    <!-- <input type="text" class="form-control"  placeholder="Phone Number"> -->
                                </div>
                            </div>
                            <div class=" row box-body ">

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Email Address</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <input type="email" class="form-control" name="emial_address" placeholder="Email Address" required="">
                                        </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >GST Number</label>
                                    <input type="text" class="form-control" name="gst_number" placeholder="GST Number" required="">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Country</label>
                                        <select class="form-control select2" name="country" style="width: 100%;" >
                                            <option selected="India">India</option>
                                        </select>
                                </div>
                            </div>
                             <div class=" row box-body ">
                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >State</label>
                                        <select class="form-control select2" style="width: 100%;" name="State" required="">
                                            <?php $stat=mysqli_query($con,"SELECT * FROM uk_state;");
                                                     while($state=mysqli_fetch_assoc($stat)) {?>
                                                <option value="<?php echo $state['state_name'];?>"><?php echo $state['state_name'];?></option>
                                            <?php } ?>
                                        </select>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >City</label>
                                        <select class="form-control select2" name="city" style="width: 100%;" required="">
                                            <option>Rishikesh</option>
                                            <option>Dehradun</option>
                                        </select>
                                </div>
                                <div class="form-group col-lg-12">
                                    <div class="checkbox">
                                        <label><input type="checkbox"  value="chekd" id="diffrent_addredd">Ship to a different Address:</label>
                                    </div>
                                </div>

                                <div class="form-group Shipping col-lg-3" style="display:none;">
                                    <label class="fontsizunst " >Shipping Country</label>
                                    <input type="text" class="form-control" name="shipping_country" value="INDIA" placeholder="Shipping Country">
                                </div>

                                <div class="form-group Shipping col-lg-3"  style="display:none;">
                                    <label class="fontsizunst"  >Shipping State</label>
                                     <select class="form-control select2" style="width: 100%;" name="sjipping_state">
                                            <?php $stat=mysqli_query($con,"SELECT * FROM uk_state;");
                                                     while($state=mysqli_fetch_assoc($stat)) {?>
                                                <option value="<?php echo $state['state_name'];?>"><?php echo $state['state_name'];?></option>
                                            <?php } ?>
                                        </select>
                                </div>

                                <div class="form-group Shipping col-lg-3"  style="display:none;">
                                    <label class="fontsizunst" >Shipping City</label>
                                    <input type="text" class="form-control" name="shipping_city"  placeholder="Shipping City">
                                </div>

                                <div class="form-group Shipping col-lg-3"  style="display:none;">
                                    <label class="fontsizunst" >Shipping Zip Code</label>
                                    <input type="number" class="form-control" name="sipping_zip_code" placeholder="Shipping Zip Code">
                                </div>

                                <div class="form-group Shipping col-lg-12"  style="display:none;">
                                    <label class="fontsizunst" >Shipping Address</label>
                                    <textarea class="form-control" rows="3" name="shipping_address" placeholder="Enter Shipping Address" ></textarea>
                                </div>

                                
                            </div>
                           
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Client</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                        </div>
                        </form>

                        </div>
                    </div>
                </div>



            
            <!-- Delete modal  -->
                <div class="modal fade" id="delete_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-trash"></i> Delete Data</h4>
                            </div>

                            <div class="modal-body">
                                <p class="deletep">Are you sure Want to Delete this Clients &hellip;</p>
                            </div>
                            <div class="modal-footer">
                              
                                <button type="button" class="btn btn-primary"><i class="fa fa-trash"></i> Delete Clients</button>
                                <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ban_client">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-ban"></i> Delete Data</h4>
                            </div>

                            <div class="modal-body">
                                <p class="deletep">Are you sure you want to add this client to blacklist &hellip;</p>
                            </div>
                            <div class="modal-footer">
                              
                                <button type="button" class="btn btn-primary"><i class="fa fa-ban"></i> Blacklist</button>
                                <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>




        </section>
      
      </div>
    

    </section>

  </div>

  <script>
    $("#diffrent_addredd").change(function(){
        var chk_vlu = this.value;
        if(chk_vlu == 'chekd'){
            // alert(chk_vlu);
            $('.Shipping').show();
            $('#diffrent_addredd').val('');
        }else{
            $('.Shipping').hide();
            $('#diffrent_addredd').val('chekd');
        }
    });

    

    
  </script>
