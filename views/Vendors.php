<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      Vendors 
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Vendors</li>
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
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Add_client" data-toggle="tooltip" data-placement="top" title="Add New Client"><i class="fa fa-plus-circle"></i> Add Vendors</button>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-6 box-body whitee">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="tableth">#</th>
                  <th class="tableth">Vendor Name</th>
                  <th class="tableth">Vendor Emial</th>
                  <th class="tableth">Mobile</th>
                  <!-- <th>Company Name</th> -->
                  <th class="tableth"> Company</th>
                  <th class="tableth">Address</th> 
                  <!-- <th>Description</th> -->
                  <th class="tableth">Action</th>
                </tr>
                </thead>
                <tbody>
                     <?php $vendor=mysqli_query($con,"SELECT * FROM tapp_vendor ");
                    $cnt = 1;
                         while($vendors=mysqli_fetch_assoc($vendor)) {?>
                            <tr>
                              <td class="tabletd"><?php echo $cnt;?></td>
                              <td class="tabletd"><?php echo $vendors['vendor_name']?></td>
                              <td class="tabletd"><?php echo $vendors['vendor_email']?></td>
                              <td class="tabletd"><?php echo $vendors['vendor_phone']?></td>
                              <!-- <td><?php echo $vendors['vendor_brand']?></td> -->
                              <td class="tabletd"><?php echo $vendors['vondor_company_name']?></td>
                              <td class="tabletd"><?php echo substr($vendors['vendor_address'],0,20).'...';?></td>
                              <!-- <td><?php echo $vendors['vendor_des']?></td> -->
                              <td class="tabletd">
                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update_vendor" data-toggle="tooltip" data-placement="top" title="Update Vendor" onclick="updt_vendor('<?php echo $vendors['id'];?>','<?php echo $vendors['vendor_name'];?>','<?php echo $vendors['vendor_email'];?>','<?php echo $vendors['vendor_phone'];?>','<?php echo $vendors['vendor_brand_name'];?>','<?php echo $vendors['vendor_brand'];?>','<?php echo $vendors['vondor_company_name'];?>','<?php echo $vendors['vendor_address'];?>','<?php echo $vendors['vendor_des'];?>')"><i class="fa fa-pencil-square-o"></i></button>
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deletevndr('<?php echo $vendors['id'];?>')" ><i class="fa fa-trash"></i></button>
                              
                              </td>
                            </tr>
                    <?php $cnt = $cnt+1; } ?>
                </tfoot>
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
                            <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add New Vendors</h4>
                        </div>
                        <div class="modal-body">
                        <form role="form" action="AddVendor" method="POST">
                            <div class=" row box-body ">
                                <div class="form-group col-lg-6">
                                    <label class="fontsizunst" >Vendors Name</label>
                                    <input type="text" class="form-control" name="vendor_name"  placeholder="Company Name">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="fontsizunst" >Email Address</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <input type="email" class="form-control" name="vendor_email" placeholder="Email Address">
                                        </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="fontsizunst"  >Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="number" class="form-control" name="vendor_phone" placeholder="Phone Number" >
                                        </div>
                                    <!-- <input type="text" class="form-control"  placeholder="Phone Number"> -->
                                </div>

                               <!--  
                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Brand Name</label>
                                    <input type="text" class="form-control" name="vendor_brand_name" placeholder="Enter the Brand Name">
                                </div> -->

                               <!--  <div class="form-group col-lg-4">
                                    <label class="fontsizunst" > Product</label>
                                    <input type="text" class="form-control" name="vendor_brand" placeholder="Enter the Vendor Brand">
                                </div> -->

                                <div class="form-group col-lg-6">
                                    <label class="fontsizunst" > Company Name</label>
                                    <input type="text" class="form-control" name="vondor_company_name" placeholder="Enter the Company Name">
                                </div>

                                <div class="form-group Shipping col-lg-12">
                                    <label class="fontsizunst" >Address</label>
                                    <textarea class="form-control" rows="3" name="vendor_address" placeholder="Enter Address" ></textarea>
                                </div>

                               <!--  <div class="form-group Shipping col-lg-12">
                                    <label class="fontsizunst" >Description</label>
                                    <textarea class="form-control" rows="3" name="vendor_des" placeholder="Enter Description" ></textarea>
                                </div> -->

                                
                            </div>
                           
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Vendor</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                        </div>
                        </form>

                        </div>
                    </div>
                </div>


                <!-- Update Modal-->

                    <!-- Add Modal  -->
                <div class="modal fade" id="update_vendor">
                    <div class="modal-dialog" style="width: 800px;">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-pencil-square"></i> Update Vendors</h4>
                        </div>
                        <div class="modal-body">
                        <form role="form" action="updateVendor" method="POST">
                            <div class=" row box-body ">
                                <input type="hidden" name="update_id" id="update_id">
                                <div class="form-group col-lg-6">
                                    <label class="fontsizunst" >Vendors Name</label>
                                    <input type="text" class="form-control" name="update_vendor_name" id="update_vendor_name" placeholder="Company Name">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="fontsizunst" >Email Address</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <input type="text" class="form-control" id="update_vendor_email" name="update_vendor_email" placeholder="Email Address">
                                        </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="fontsizunst"  >Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="text" class="form-control" id="update_vendor_phone" name="update_vendor_phone" placeholder="Phone Number" >
                                        </div>
                                    <!-- <input type="text" class="form-control"  placeholder="Phone Number"> -->
                                </div>

                                
                                <!-- <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Brand Name</label>
                                    <input type="text" class="form-control" name="update_vendor_brand_name" id="update_vendor_brand_name" placeholder="Enter the Brand Name">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" > Product</label>
                                    <input type="text" class="form-control" name="update_vendor_brand" id="update_vendor_brand" placeholder="Enter the Vendor Brand">
                                </div> -->

                                <div class="form-group col-lg-6">
                                    <label class="fontsizunst" > Company Name</label>
                                    <input type="text" class="form-control" name="update_vondor_company_name" id="update_vondor_company_name" placeholder="Enter the Company Name">
                                </div>

                                <div class="form-group Shipping col-lg-12">
                                    <label class="fontsizunst" >Address</label>
                                    <textarea class="form-control" rows="3" name="update_vendor_address" id="update_vendor_address" placeholder="Enter Address" ></textarea>
                                </div>

                                <!-- <div class="form-group Shipping col-lg-12">
                                    <label class="fontsizunst" >Description</label>
                                    <textarea class="form-control" rows="3" name="update_vendor_des" id="update_vendor_des" placeholder="Enter Description" ></textarea>
                                </div> -->

                                
                            </div>
                           
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Update Vendor</button>
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
                            <form action="DelteVendor" method="POST">
                            <div class="modal-body">
                                <p class="deletep">Are you sure Want to Delete this Vendor &hellip;</p>
                                <input type="hidden" name="delete_id" id="delete_id">
                            </div>
                            <div class="modal-footer">
                              
                                <button type="submit" class="btn btn-primary"><i class="fa fa-trash"></i> Delete Vendor</button>
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
  <script type="text/javascript">
      function deletevndr(vlause){
        $('#delete_id').val(vlause);

      }

     function updt_vendor(id,vendor_name,vendor_email,vendor_phone,vendor_brand_name,vendor_brand,vondor_company_name,vendor_address,vendor_des){
        $('#update_id').val(id);
        $('#update_vendor_name').val(vendor_name);
        $('#update_vendor_email').val(vendor_email);
        $('#update_vendor_phone').val(vendor_phone);
        $('#update_vendor_brand_name').val(vendor_brand_name);
        $('#update_vendor_brand').val(vendor_brand);
        $('#update_vondor_company_name').val(vondor_company_name);
        $('#update_vendor_address').val(vendor_address);
        $('#update_vendor_des').val(vendor_des);
        

     }
  </script>

 
