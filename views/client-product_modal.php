
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
                            <div class=" row box-body ">
                                 <input type="hidden" name="page_name" value="GenerateInvoice">
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

                <!-- product modal -->




                <div class="modal fade" id="Add_product">
                    <div class="modal-dialog" style="width: 800px;">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Product and Services</h4>
                        </div>
                        <div class="modal-body">
                        <form role="form" action="ProductAdd" method="POST">
                            <input type="hidden" name="page_name" value="GenerateInvoice">
                            <div class=" row box-body ">
                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst">Category</label>
                                    <select class="form-control select2 text-capitalize" name="pro_category" style="width: 100%;" onchange="category_name(this.value)" required="">
                                                <option value="">Select Category</option>
                                         <?php $cat=mysqli_query($con,"SELECT * FROM tapp_pro_category GROUP BY categoryname;");
                                                     while($cate=mysqli_fetch_assoc($cat)) {?>
                                                <option value="<?php echo $cate['id'];?>"><?php echo $cate['categoryname'];?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-5 ">
                                    <label class="fontsizunst"> Product Name</label>
                                    <input type="text" class="form-control "  name="pro_name" placeholder="Product Name" required="">
                                    
                                    </select>
                                </div>


                                <div class="form-group col-lg-3">
                                    <label class="fontsizunst"> Product HSN Code</label>
                                    <input type="text" class="form-control" name="pro_hsn_code" placeholder="HSN Code" required="">
                                </div>

                                <div class="form-group col-lg-4 product_name">
                                    <label class="fontsizunst"> Product Quantity</label>
                                    <input type="text" class="form-control pro_input" name="pro_quantity" placeholder="Product Quantity" required="">
                                    <select class="form-control all-units unitsessss" name="pro_unit" required="">
                                        </select>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst">Product Price</label>
                                    <input type="text" class="form-control" name="pro_price" placeholder="Product Price" required="">
                                </div>

                                
                                <div class="form-group Shipping col-lg-12">
                                    <label class="fontsizunst" >Description</label>
                                    <textarea class="form-control" rows="2" name="pro_descr" placeholder="Enter Description" ></textarea>
                                </div>

                                <div class="form-group Shipping col-lg-4" id="rates">
                                    <label class="tax"><input type="radio"  id="taxvalue1" name="tax_name" value="InclusiveTax" onclick="gettex(this.value)"> Inclusive Tax</label>
                                    <label class="tax"><input type="radio" id="taxvalue2" name="tax_name"  value="ExclusiveTax" onclick="gettex(this.value)"> Exclusive Tax</label>  
                                </div>

                                <div class="form-group Shipping InclusiveTax col-lg-4" style="display:none;">
                                    <label class="fontsizunst" >Tax</label>
                                    <select class="form-control select2 taxxx" name="tax_percentg" style="width: 100%;">
                                              <?php $cat=mysqli_query($con,"SELECT * FROM tapp_pro_category GROUP BY tax_percentage ORDER BY id  ASC ;");
                                                     while($cate=mysqli_fetch_assoc($cat)) {?>
                                                <option value="<?php echo $cate['tax_percentage'];?>"><?php echo $cate['tax_percentage'] . ' %';?></option>
                                            <?php } ?>
                                        </select>
                                </div>

                                
                                <div class="form-group Shipping ExclusiveTax col-lg-4" style="display:none;">
                                    <label class="fontsizunst" >Select Taxes %</label>
                                    <select class="form-control select2" style="width: 100%;" name="tax_percentg">
                                           <?php $cat=mysqli_query($con,"SELECT * FROM tapp_pro_category GROUP BY tax_percentage ORDER BY id  ASC ;");
                                                     while($cate=mysqli_fetch_assoc($cat)) {?>
                                                <option value="<?php echo $cate['tax_percentage'];?>"><?php echo $cate['tax_percentage'] . ' %';?></option>
                                            <?php } ?>
                                        </select>
                                </div>

                            </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Product</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                        </div>
                        </form>

                        </div>
                    </div>
                </div>
