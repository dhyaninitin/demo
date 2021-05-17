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
                        <a type="button" href="cliexportdata" class="btn btn-warning btn-sm"  data-toggle="tooltip" data-placement="top" title="Export Client"><i class="fa fa-download"></i> Export Data(Excel)</a>
                    
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-6 box-body whitee">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="tableth">#</th>
                  <th class="tableth">Co. Name</th>
                  <th class="tableth">Client Name</th>
                  <th class="tableth">Mobile</th>
                  <th class="tableth">Email</th>
                  <th class="tableth">GST</th>
                  <th class="tableth">Creation Date</th>
                  <th class="tableth">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $client=mysqli_query($con,"SELECT * FROM tapp_clients WHERE black_list ='0'");
                    $cnt = 1;
                         while($clients=mysqli_fetch_assoc($client)) {?>
                            <tr>
                              <td class="tabletd"><?php echo  $cnt;?></td>
                              <td class="tabletd"><?php echo $clients['company_name'];?></td>
                              <td class="tabletd"><?php echo $clients['client_name'];?></td>
                               <td class="tabletd"><?php echo $clients['phone_number'];?></td>
                               <td class="tabletd"><?php echo $clients['email_address'];?></td>
                              <td class="tabletd"><?php echo $clients['gst_number'];?></td>
                               <td class="tabletd"><?php echo $newDate = date("d F Y", strtotime($clients['current_date_time'])); ?></td>
                              <td class="tabletd">
                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update_client"  data-toggle="tooltip" data-placement="top" title="Update Client" onclick="updteclit('<?php echo $clients['id'];?>','<?php echo $clients['company_name'];?>','<?php echo $clients['client_name'];?>','<?php echo $clients['phone_number'];?>','<?php echo $clients['email_address'];?>','<?php echo $clients['gst_number'];?>','<?php echo $clients['country'];?>','<?php echo $clients['state'];?>','<?php echo $clients['city'];?>','<?php echo $clients['shipping_country'];?>','<?php echo $clients['shipping_state'];?>','<?php echo $clients['shipping_city'];?>','<?php echo $clients['shipping_zip_code'];?>','<?php echo $clients['shipping_address'];?>')"><i class="fa fa-pencil-square-o"></i></button>

                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deletclient('<?php echo $clients['id']?>')" ><i class="fa fa-trash"></i></button>
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#ban_client" data-toggle="tooltip" data-placement="top" title="Add to Black List" onclick="blacklistclient('<?php echo $clients['id']?>','1')"><i class="fa fa-ban"></i></button>
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
                            <input type="hidden" name="page_name" value="Clients">
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

                <!-- update Modal -->

                <div class="modal fade" id="update_client">
                    <div class="modal-dialog" style="width: 800px;">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-plus-circle"></i>Update Client</h4>
                        </div>
                        <div class="modal-body">
                        <form role="form" action="updateclient" method="POST">
                            <div class=" row box-body ">
                                <input type="hidden" name="update_id" id="updet_id">
                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Company Name</label>
                                    <input type="text" class="form-control" name="updet_copm_name" id="updet_copm_name"  placeholder="Company Name" required="">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Client Name</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control" id="updet_clint_nam"  name="updet_clint_nam" placeholder="Contact Name" required="">
                                        </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst"  >Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="number" class="form-control" id="updet_mobile_num" name="updet_mobile_num" placeholder="Phone Number" required="">
                                        </div>
                                    <!-- <input type="text" class="form-control"  placeholder="Phone Number"> -->
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Email Address</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <input type="email" class="form-control" id="updet_emial_addrs" name="updet_emial_addrs" placeholder="Email Address" required="">
                                        </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >GST Number</label>
                                    <input type="text" class="form-control" id="updet_gst_numer" name="updet_gst_num" placeholder="GST Number" required="">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Country</label>
                                        <select class="form-control select2" name="updet_contry" id="updet_contry" style="width: 100%;" >
                                            <option selected="India">India</option>
                                        </select>
                                </div>
                            </div>
                             <div class=" row box-body ">
                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >State</label>
                                        <select class="form-control select2" style="width: 100%;" name="updet_state" id="updet_state" required="">
                                            <?php $stat=mysqli_query($con,"SELECT * FROM uk_state;");
                                                     while($state=mysqli_fetch_assoc($stat)) {?>
                                                <option value="<?php echo $state['state_name'];?>"><?php echo $state['state_name'];?></option>
                                            <?php } ?>
                                        </select>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >City</label>
                                        <select class="form-control select2" id="updet_city" name="updet_city" style="width: 100%;" required="">
                                            <option value="Rishikesh">Rishikesh</option>
                                            <option value="Dehradun">Dehradun</option>
                                        </select>
                                </div>
                                <div class="form-group col-lg-12">
                                    <div class="checkbox">
                                        <label><input type="checkbox"  value="chekd" id="diffrent_updateredd">Ship to a different Address:</label>
                                    </div>
                                </div>

                                <div class="form-group upShipping col-lg-3" style="display:none;">
                                    <label class="fontsizunst " >Shipping Country</label>
                                    <input type="text" class="form-control" name="updet_ship_contry" id="updet_ship_contry" value="INDIA" placeholder="Shipping Country">
                                </div>

                                <div class="form-group upShipping col-lg-3"  style="display:none;">
                                    <label class="fontsizunst"  >Shipping State</label>
                                     <select class="form-control select2" style="width: 100%;" id="updet_ship_state" name="updet_ship_state">
                                            <?php $stat=mysqli_query($con,"SELECT * FROM uk_state;");
                                                     while($state=mysqli_fetch_assoc($stat)) {?>
                                                <option value="<?php echo $state['state_name'];?>"><?php echo $state['state_name'];?></option>
                                            <?php } ?>
                                        </select>
                                </div>

                                <div class="form-group upShipping col-lg-3"  style="display:none;">
                                    <label class="fontsizunst" >Shipping City</label>
                                    <input type="text" class="form-control" name="updet_ship_city" id="updet_ship_city" placeholder="Shipping City">
                                </div>

                                <div class="form-group upShipping col-lg-3"  style="display:none;">
                                    <label class="fontsizunst" >Shipping Zip Code</label>
                                    <input type="number" class="form-control" name="updet_sip_z_code" id="updet_sip_z_code" placeholder="Shipping Zip Code">
                                </div>

                                <div class="form-group upShipping col-lg-12"  style="display:none;">
                                    <label class="fontsizunst" >Shipping Address</label>
                                    <textarea class="form-control" rows="3" name="updet_sip_ddress" id="updet_sip_ddress" placeholder="Enter Shipping Address" ></textarea>
                                </div>

                                    
                            </div>
                           
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Update Client</button>
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
                            <form role="form" action="delete_clit" method="POST">
                                <div class="modal-body">
                                    <p class="deletep">Are you sure Want to Delete this Clients &hellip;</p>
                                    <input type="hidden" name="delte_iddd" id="delte_id">
                                    <input type="hidden" name="page_name" value="Clients">

                                </div>

                                <div class="modal-footer">
                                  
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-trash"></i> Delete Clients</button>
                                    <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ban_client">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" action="banclient" method="POST">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-ban"></i> Blacklist</h4>
                            </div>

                            <div class="modal-body">
                                <p class="deletep">Are you sure you want to add this client to blacklist &hellip;</p>
                                <input type="hidden" name="ban_iddd" id="black_id">
                                <input type="hidden" name="page_name" value="Clients">
                                 <input type="hidden" name="balacklistvalue" id="balacklistvalue">
                            </div>
                            <div class="modal-footer">
                              
                                <button type="submit" class="btn btn-primary"><i class="fa fa-ban"></i> Blacklist</button>
                                <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                            </div>
                            </form>
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
    $("#diffrent_updateredd").change(function(){
        var chk_vlu = this.value;
        if(chk_vlu == 'chekd'){
            // alert(chk_vlu);
            $('.upShipping').show();
            $('#diffrent_updateredd').val('');
        }else{
            $('.upShipping').hide();
            $('#diffrent_updateredd').val('chekd');
        }
    });



    function deletclient(value){
        $('#delte_id').val(value);
        // alert(value);
    }
    function blacklistclient(value,val){
        $('#black_id').val(value);
        $('#balacklistvalue').val(val);
        // alert(value);
    }

    function updteclit(id,copm_name,clint_nam,mobile_num,emial_addrs,gst_num,contry,state,city,ship_contry,ship_state,ship_city,sip_z_code,sip_ddress){
        $('#updet_id').val(id);
        $('#updet_copm_name').val(copm_name);
        $('#updet_clint_nam').val(clint_nam);
        $('#updet_mobile_num').val(mobile_num);
        $('#updet_emial_addrs').val(emial_addrs);
        $('#updet_gst_numer').val(gst_num);
        $('#updet_contry').val(contry);

        $('#updet_state').html('<option selected="'+state+'">'+state+'</option><?php $stat=mysqli_query($con,"SELECT * FROM uk_state;");while($state=mysqli_fetch_assoc($stat)) {?><option value="<?php echo $state['state_name'];?>"><?php echo $state['state_name'];?></option><?php } ?>');

        $('#updet_city').html('<option selected="'+city+'">'+city+'</option><option value="Rishikesh">Rishikesh</option><option value="Dehradun">Dehradun</option>');
        $('#updet_ship_contry').val(ship_contry);
        $('#updet_ship_state').html('<option selected="'+ship_state+'">'+ship_state+'</option><?php $stat=mysqli_query($con,"SELECT * FROM uk_state;");while($state=mysqli_fetch_assoc($stat)) {?><option value="<?php echo $state['state_name'];?>"><?php echo $state['state_name'];?></option><?php } ?>');
        $('#updet_ship_city').val(ship_city);
        $('#updet_sip_z_code').val(sip_z_code);
        $('#updet_sip_ddress').val(sip_ddress);
        }
  </script>
