
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      Add Product 
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Add Product</li>
      </ol>
      </h1>
    </section>

 
    <section class="content">
 
      <div class="row">

        <section class="col-lg-12 connectedSortable">
        <div class="box">

            
            <div class="box-header">
                <div calss="row">
                    <!-- <div class="col-lg-6">
                       
                        <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#Import_Product" data-toggle="tooltip" data-placement="top" title="Import Product"><i class="fa fa-upload"></i> Import Product</button>
                    </div> -->

                    <div class="col-lg-12">
                        <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="tooltip" data-placement="top" title="Export Product"><i class="fa fa-download"></i> Export Product</button>
                         <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#Add_client" data-toggle="tooltip" data-placement="top" title="Add New Product"><i class="fa fa-plus-circle"></i> Add Product</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-6 box-body whitee">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="tableth">#</th>
                  <th class="tableth">Added BY</th>
                  <th class="tableth">Category</th>
                  <th class="tableth">Product</th>
                  <th class="tableth">HSN Code</th>
                  <th class="tableth">Quantity</th>
                  <th class="tableth">Price</th>
                  <th class="tableth">Profit Price</th>
                  <th class="tableth">Description</th>
                  <th class="tableth">Tax</th>
                  <th class="tableth">Profit</th>
                  <th class="tableth">Action</th>
                </tr>
                </thead>
                <tbody>
                     <?php setlocale(LC_MONETARY, 'en_IN');
                      $prodct=mysqli_query($con,"SELECT * FROM tapp_product LEFT JOIN  tapp_pro_category  ON tapp_product.category_id = tapp_pro_category.id");
                    $cnt = 1;
                         while($pro=mysqli_fetch_assoc($prodct)) {?>
                        <tr class="text-capitalize">
                          <td class="tabletd"><?php echo $cnt;?></td>
                          <td class="tabletd"><?php $add = explode('@',$pro['added_by']); echo $add[0]; ?></td>
                          <td class="tabletd"><?php echo  $pro['categoryname'];?></td>
                          <td class="tabletd"><?php echo $pro['product_name'];?></td>
                          <td class="tabletd"><?php echo $pro['hsn_code'];?></td>
                          <td class="tabletd"><?php echo number_format($pro['product_quantity']).'&nbsp'. $pro['product_unit'].'</strong>';?></td>
                          <td class="tabletd"><?php echo number_format($pro['product_price']).'  '.'Rs';?></td>
                          <td class="tabletd"><?php echo number_format($pro['profit_price']).'  '.'Rs';?></td>
                          <td class="tabletd"><?php echo $pro['description'];?></td>
                          <td class="tabletd"><?php echo $pro['tax'] . ' %';?></td>
                          <td class="tabletd"><?php echo number_format($pro['product_quantity'] * $pro['profit_price']).'  '.'Rs';?></td>
                          <td class="tabletd">
                            
                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update_client" data-toggle="tooltip" data-placement="top" title="Delete" onclick="pro_update('<?php echo $pro['pro_id'];?>','<?php echo $pro['categoryname'];?>','<?php echo $pro['id']?>','<?php echo $pro['product_name'];?>','<?php echo $pro['hsn_code'];?>','<?php echo $pro['product_quantity'];?>','<?php echo $pro['product_unit'];?>','<?php echo $pro['achual_price'];?>','<?php echo $pro['profit_price'];?>','<?php echo $pro['description'];?>','<?php echo $pro['tax'];?>','<?php echo $pro['protax_name']?>','<?php echo $pro['added_by']?>')" ><i class="fa fa-pencil-square-o"></i></button>

                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal" data-toggle="tooltip" data-placement="top" title="Delete" onclick="delete_prodct('<?php echo $pro['pro_id'];?>')" ><i class="fa fa-trash"></i></button>
                          
                          </td>
                        </tr>
                    <?php $cnt = $cnt+1; } ?>

                
                
                </tfoot>
              </table>
            </div>
        </div> 

                    <!-- Add Modal  -->
                <div class="modal fade" id="Add_client">
                    <div class="modal-dialog" style="width: 870px;">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Product and Services</h4>
                        </div>
                        <div class="modal-body">
                        <form role="form" action="ProductAdd" method="POST">
                            <input type="hidden" name="page_name" value="AddProduct">
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
                                <input type="hidden" id="catid">

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst">Added By</label>
                                    <select class="form-control select2 text-capitalize" name="added_by" style="width: 100%;" onchange="addededby(this.value)" required="">
                                                <option value="">Added By</option>
                                                <option value="SELF">SELF</option>
                                                <option value="VENDEOR">VENDEOR</option>
                                    </select>
                                </div>
                                <div class="form-group vendros col-lg-4" style="display: none;">
                                    <label class="fontsizunst">Vendors</label>
                                    <select class="form-control select2 text-capitalize" name="vendorname" id="vendersssss" style="width: 100%;"  >
                                                <option value="">Select Vendors</option>
                                         <?php $vnder=mysqli_query($con,"SELECT * FROM tapp_vendor;");
                                                     while($vder=mysqli_fetch_assoc($vnder)) {?>
                                                <option value="<?php echo $vder['vendor_email'];?>"><?php echo $vder['vendor_email'];?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                
                                 <div class="form-group col-lg-4 ">
                                   <label class="tax"><input type="radio"  id="newpro" name="productname" value="Newproduct" onclick="product(this.value,'catid')" checked> New Product</label>
                                    <label class="tax"><input type="radio" id="oldpro" name="productname"  value="Oldproduct" onclick="product(this.value,'catid')"> Existing Product </label>  
                                </div>

                                <div class="form-group Newproduct col-lg-4">
                                    <label class="fontsizunst"> Product Name</label>
                                    <input type="text" class="form-control " id="newproducttt" name="pro_name" placeholder="Product Name" required="">
                                </div>

                                 <div class="form-group Oldproduct col-lg-4" style="display: none;" >
                                    <label class="fontsizunst">Product Name</label>
                                    <select class="form-control select2 text-capitalize prdcttname"  id="oldproducttt"  name="pro_name" style="width: 100%;" onchange="fatcholdproduct(this.value)">
                                        <!-- <option value="">Select Product Name</option> -->
                                    </select>
                                </div>


                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst"> Product HSN Code</label>
                                    <input type="text" class="form-control pro_hsn_code" name="pro_hsn_code" placeholder="HSN Code" required="">
                                </div>

                                <div class="form-group col-lg-4 product_name">
                                    <label class="fontsizunst"> Product Quantity</label>
                                    <input type="number" class="form-control pro_input" name="pro_quantity" placeholder="Product Quantity" required="">
                                    <select class="form-control all-units pro_product_unit unitsessss" name="pro_unit" required="">
                                        </select>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst">Product Price (Current Price)</label>
                                    <input type="number" class="form-control pro_product_price" name="pro_price" placeholder="Product Price" required="">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst">Profit Price</label>
                                    <input type="number" class="form-control pro_product_price" name="profit_price" placeholder="Profit Price" required="">
                                </div>

                                
                                <div class="form-group Shipping col-lg-12">
                                    <label class="fontsizunst" >Description</label>
                                    <textarea class="form-control pro_description" rows="2" name="pro_descr" placeholder="Enter Description" ></textarea>
                                </div>

                                <div class="form-group Shipping col-lg-4" id="rates">
                                    <label class="tax"><input type="radio"  id="taxvalue1" name="tax_name" value="InclusiveTax" onclick="gettex(this.value)"> Inclusive Tax</label>
                                    <label class="tax"><input type="radio" id="taxvalue2" name="tax_name"  value="ExclusiveTax" onclick="gettex(this.value)"> Exclusive Tax</label>  
                                </div>

                                <div class="form-group Shipping InclusiveTax col-lg-4" style="display:none;">
                                    <label class="fontsizunst" >Tax</label>
                                    <select class="form-control select2 taxxx " id="in-tax" style="width: 100%;">
                                              <!-- <?php $cat=mysqli_query($con,"SELECT * FROM tapp_pro_category GROUP BY tax_percentage ORDER BY id  ASC ;");
                                                     while($cate=mysqli_fetch_assoc($cat)) {?>
                                                <option value="<?php echo $cate['tax_percentage'];?>"><?php echo $cate['tax_percentage'] . ' %';?></option>
                                            <?php } ?> -->
                                        </select>
                                </div>

                                
                                <div class="form-group Shipping ExclusiveTax col-lg-4" style="display:none;">
                                    <label class="fontsizunst" >Select Taxes %</label>
                                    <select class="form-control select2" id="ex-tax" style="width: 100%;" >
                                    			<option value="">Select Tax</option>
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
                



                <!-- Update Modal -->

                <div class="modal fade" id="update_client">
                    <div class="modal-dialog" style="width: 870px;">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-pencil-square-o"></i> Update Product and Services</h4>
                        </div>
                        <div class="modal-body">
                        <form role="form" action="Productupdate" method="POST">
                            <input type="hidden" name="update_id" id="up_pro_id">
                            <div class=" row box-body ">
                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst">Category</label>
                                    <select class="form-control select2" name="up_pro_category" id="up_categoryname" style="width: 100%;" onchange="category_name1(this.value)" required="">
                                                <!-- <option value="">Select Category</option> -->
                                         <?php $cat=mysqli_query($con,"SELECT * FROM tapp_pro_category GROUP BY categoryname;");
                                                     while($cate=mysqli_fetch_assoc($cat)) {?>
                                                <option value="<?php echo $cate['id'];?>"><?php echo $cate['categoryname'];?></option>
                                            <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst">Added By</label>
                                    <select class="form-control select2 text-capitalize" id="up_addby" name="up_addedby" style="width: 100%;" onchange="upaddededby(this.value)" required="">
                                        <option value="">Added By</option>
                                        <option value="SELF">SELF</option>
                                        <option value="VENDEOR">VENDEOR</option>
                                    </select>
                                </div>

                                 <div class="form-group upvendros col-lg-4" style="display: none;">
                                    <label class="fontsizunst">Vendors</label>
                                    <select class="form-control select2 text-capitalize update_vendor" name="upvendorname"  id="updateededby" style="width: 100%;"  >
										<?php $vnder=mysqli_query($con,"SELECT * FROM tapp_vendor;");
											while($vder=mysqli_fetch_assoc($vnder)) {?>
											<option value="<?php echo $vder['vendor_email'];?>"><?php echo $vder['vendor_email'];?></option>
										<?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-lg-4 ">
                                    <label class="fontsizunst"> Product Name</label>
                                    <input type="text" class="form-control "  name="up_product_name" id="up_product_name" placeholder="Product Name" required="">
                                    
                                    </select>
                                </div>


                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst"> Product HSN Code</label>
                                    <input type="text" class="form-control" name="up_hsn_code" id="up_hsn_code" placeholder="HSN Code" required="">
                                </div>

                                <div class="form-group col-lg-4 product_name">
                                    <label class="fontsizunst"> Product Quantity</label>
                                    <input type="text" class="form-control pro_input" name="up_product_quantity" id="up_product_quantity" placeholder="Product Quantity" required="">
                                    <select class="form-control all-units unitsessss" name="up_product_unit" id="up_product_unit" required="">
                                        </select>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst">Product Price</label>
                                    <input type="text" class="form-control" name="up_product_price" id="up_product_price" placeholder="Product Price" required="">
                                </div>
                                

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst">Profit Price</label>
                                    <input type="text" class="form-control" name="up_profit_price" id="up_profit_price" placeholder="Profit  Price" required="">
                                </div>

                                
                                <div class="form-group Shipping col-lg-12">
                                    <label class="fontsizunst" >Description</label>
                                    <textarea class="form-control" rows="2" name="up_description" id="up_description" placeholder="Enter Description" ></textarea>
                                </div>

                                <div class="form-group Shipping col-lg-4" id="rates">
                                    <label class="tax"><input type="radio"  id="taxvalue1" name="update_tax_name" class="taxvalue1 remove1" value="InclusiveTax" onclick="gettexc(this.value)"> Inclusive Tax</label>
                                    <label class="tax"><input type="radio" id="taxvalue2" name="update_tax_name"  class="taxvalue2 remove2"  value="ExclusiveTax" onclick="gettexc(this.value)"> Exclusive Tax</label> 

                                     
                                </div>
                           
                                <div class="form-group Shipping InclusiveTax1 col-lg-4" style="display:none;">
                                    <label class="fontsizunst" > SelectTax</label>
                                    <select class="form-control select2 taxxx" name="update_inclusivtax" id="up_percentg" style="width: 100%;">
                                              <?php $cat=mysqli_query($con,"SELECT * FROM tapp_pro_category GROUP BY tax_percentage ORDER BY id  ASC ;");
                                                     while($cate=mysqli_fetch_assoc($cat)) {?>
                                                <option value="<?php echo $cate['tax_percentage'];?>"><?php echo $cate['tax_percentage'] . ' %';?></option>
                                            <?php } ?>
                                        </select>
                                </div>

                                
                                <div class="form-group Shipping ExclusiveTax1 col-lg-4" style="display:none;">
                                    <label class="fontsizunst" >Select Taxes %</label>
                                    <select class="form-control select2" style="width: 100%;" id="up_ExclusiveTax" name="up_ExclusiveTax">
                                           <?php $cat=mysqli_query($con,"SELECT * FROM tapp_pro_category GROUP BY tax_percentage ORDER BY id  ASC ;");
                                                     while($cate=mysqli_fetch_assoc($cat)) {?>
                                                <option value="<?php echo $cate['tax_percentage'];?>"><?php echo $cate['tax_percentage'] . ' %';?></option>
                                            <?php } ?>
                                        </select>
                                </div>

                            </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Update Product</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                        </div>
                        </form>

                        </div>
                    </div>
                </div>





            <!-- Import Product Modal -->
            <div class="modal fade" id="Import_Product">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-upload"></i> Import Product</h4>
                            </div>

                            <div class="modal-body">
                                <form role="form">
                                    <div class=" row box-body ">
                                        <div class="form-group col-lg-12">
                                            <label class="fontsizunst" >Import Product</label>
                                            <input type="file" class="form-control" disabled="" >
                                        </div>
                                    </div>
                                </form>    
                            </div>
                            <div class="modal-footer">
                              
                                <button type="button" class="btn btn-primary"><i class="fa fa-upload"></i> Import</button>
                                <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                            </div>
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
                            <form action="deleteprodct" method="POST">
                                <div class="modal-body">
                                    <p class="deletep">Are you sure Want to Delete this Product  &hellip;</p>
                                    <input type="hidden" name="delete_proid" id="delete_id">
                                </div>
                                <div class="modal-footer">
                                  
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-trash"></i> Delete Product</button>
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
  	function product(pvalue,catid){

    // console.log(pvalue);
    if(pvalue == 'Newproduct'){
        var catidd = $('#'+catid).val();
           // console.log(catidd);
        $('.Newproduct').show();
        $('.Oldproduct').hide();

        $('#newproducttt').prop('required',true);
        $('#oldproducttt').prop('required',false);
        

    }else if(pvalue == 'Oldproduct'){
			$('#newproducttt').prop('required', false);
			$('#oldproducttt').prop('required', true);
			
                $('.Newproduct').hide();
                $('.Oldproduct').show();
           var catidd = $('#'+catid).val();
           // console.log(catidd);
            $.ajax({
            url:"getprovalue",
            type:"POST",
            data: {catidd:catidd}, 
            success:function(status){
              // console.log(status)
                var asd = JSON.parse(status);
                var show_karix = '';
                    show_karix += '<option> Select Product </option>';
                  asd.forEach(function(ertry){
                  // console.log(ertry.pro_id);
                  show_karix += '<option value ="'+ertry.product_name +'" >'+ ertry.product_name + '</option>'; 

                  });
                $('.prdcttname').html(show_karix);
            }
            });
    }
   }

   // fatch product
   function fatcholdproduct(prodctid){
   $.ajax({
        url:"getgeninvoicepro",
        type:"POST",
        data: {pro_id:prodctid}, 
        success:function(status){
          // console.log(status);
            let pro_value  = JSON.parse(status);
            // $('#product_name').val(pro_value.product_name);
            $('.pro_hsn_code').val(pro_value.hsn_code);
            $('.pro_product_unit').val(pro_value.product_unit);
            $('.pro_product_price').val(pro_value.product_price); 
            $('.pro_description').val(pro_value.description);
        }
    });


   }
  </script>

  <script>
   function gettex(tax_type){
       if(tax_type == 'InclusiveTax'){
        // $('#tax_name').val('InclusiveTax');
           $('.InclusiveTax').show();
            $('.ExclusiveTax').hide();
            $('#ex-tax').val('');
            $('#in-tax').attr('name','tax_percentg');
            $('#ex-tax').attr('name','');


            // $('#taxvalue1').attr('checked', true);
          // $('#taxvalue2').attr('checked', false);
          
       }else if(tax_type == 'ExclusiveTax'){
        // $('#taxvalue1').attr('checked', false);
          // $('#taxvalue2').attr('checked', true);
        // $('#tax_name').val('ExclusiveTax');
            $('.InclusiveTax').hide();
            $('.ExclusiveTax').show();
            $('#in-tax').val('');
            $('#ex-tax').attr('name','tax_percentg');
            $('#in-tax').attr('name','');



             
       }
       
   }

   function gettexc(type_text){
    console.log(type_text);
    if(type_text == 'InclusiveTax'){
        $('.InclusiveTax1').show();
        $('.ExclusiveTax1').hide();
    $(".remove1").prop('checked', true); 

    $(".remove2").prop('checked', false); 

    }else if(type_text == 'ExclusiveTax'){
        $('.InclusiveTax1').hide();
        $('.ExclusiveTax1').show();
        $("remove2").attr("checked", true);
    $(".remove1").prop('checked', false); 

    }
   
   }




function delete_prodct(val){
    $('#delete_id').val(val);
   }




   function category_name(val){
    $('#catid').val(val);
     $.ajax({
        url:"getcatvalue",
        type:"POST",
        data: {catvalue:val}, 
        success:function(status){
            // console.log(status);
            let gsttax  = JSON.parse(status);
           var  tax = '<option value ="'+  gsttax.tax_percentage  +'" >'+ gsttax.tax_percentage +' % </option><?php $cat=mysqli_query($con,"SELECT * FROM tapp_pro_category GROUP BY tax_percentage ORDER BY id  ASC ;");while($cate=mysqli_fetch_assoc($cat)) {?><option value="<?php echo $cate['tax_percentage'];?>"><?php echo $cate['tax_percentage'] . ' %';?></option><?php } ?>';
            $('.taxxx').html(tax);
             $('#in-tax').attr('name','tax_percentg');
            $('#ex-tax').attr('name','');
            // console.log(gsttax.tax_percentage);

            $('#taxvalue1').attr('checked', true);
            $('.InclusiveTax').show();

            // $('.hsncode').val(product_name.productHSNCode);


        }
    });
   }

    function category_name1(val){
     $.ajax({
        url:"getcatvalue",
        type:"POST",
        data: {catvalue:val}, 
        success:function(status){
            // console.log(status);
            let gsttax  = JSON.parse(status);
           var  tax = '<option value ="'+  gsttax.tax_percentage  +'" >'+ gsttax.tax_percentage +' % </option><?php $cat=mysqli_query($con,"SELECT * FROM tapp_pro_category GROUP BY tax_percentage ORDER BY id  ASC ;");while($cate=mysqli_fetch_assoc($cat)) {?><option value="<?php echo $cate['tax_percentage'];?>"><?php echo $cate['tax_percentage'] . ' %';?></option><?php } ?>';
            $('.taxxx').html(tax);
            // console.log(gsttax.tax_percentage);

            $('#taxvalue1').attr('checked', true);
            $('.InclusiveTax1').show();

            // $('.hsncode').val(product_name.productHSNCode);


        }
    });
   }


   function pro_update(pro_id,categoryname,cat_id,product_name,hsn_code,product_quantity,product_unit,product_price,profitprice,description,tax,protax_name,addby){
    $('#up_pro_id').val(pro_id);
    // console.log(categoryname);
    $('#up_categoryname').html('<option value="'+ cat_id +'">'+categoryname +'</option><?php $cat=mysqli_query($con,"SELECT * FROM tapp_pro_category GROUP BY categoryname;");while($cate=mysqli_fetch_assoc($cat)) {?><option value="<?php echo $cate['id'];?>"><?php echo $cate['categoryname'];?></option><?php } ?>');
    $('#up_categoryname').val(cat_id);
    $('#up_product_name').val(product_name);
    $('#up_hsn_code').val(hsn_code);
    $('#up_product_quantity').val(product_quantity);
    $('#up_product_unit').val(product_unit);
    $('#up_product_price').val(product_price);
    $('#up_profit_price').val(profitprice)
    $('#up_description').val(description);
    $('#up_tax').val(tax);

      if(protax_name == 'InclusiveTax'){
          $('.taxvalue1').attr('checked', true);
          $('.InclusiveTax1').show();
          $('.ExclusiveTax1').hide();

          $('#up_percentg').html('<option value="'+tax +'">'+ tax+' %</option><?php $cat=mysqli_query($con,"SELECT * FROM tapp_pro_category GROUP BY tax_percentage ORDER BY id  ASC ;");while($cate=mysqli_fetch_assoc($cat)) {?><option value="<?php echo $cate['tax_percentage'];?>"><?php echo $cate['tax_percentage'] . ' %';?></option><?php } ?>');
          
          $('.taxvalue2').attr('checked', false);


      }else if(protax_name == 'ExclusiveTax'){
          $('.taxvalue1').attr('checked', false);
          $('.taxvalue2').attr('checked', true);
          $('.ExclusiveTax1').show();
          $('.InclusiveTax1').hide();

          $('#up_ExclusiveTax').html('<option value="'+tax +'">'+ tax+' %</option><?php $cat=mysqli_query($con,"SELECT * FROM tapp_pro_category GROUP BY tax_percentage ORDER BY id  ASC ;");while($cate=mysqli_fetch_assoc($cat)) {?><option value="<?php echo $cate['tax_percentage'];?>"><?php echo $cate['tax_percentage'] . ' %';?></option><?php } ?>');
      }

      if(addby == 'SELF'){
      	$('#up_addby').html('<option value="SELF">SELF</option><option value="VENDEOR">VENDEOR</option>');

      }else{
      		$('#up_addby').html('<option value="VENDEOR">VENDEOR</option><option value="SELF">SELF</option>');
      		$('.upvendros').show();
      	$('.update_vendor').html('<option value="'+ addby +'">'+ addby +'</option><?php $vnder=mysqli_query($con,"SELECT * FROM tapp_vendor;");while($vder=mysqli_fetch_assoc($vnder)) {?><option value="<?php echo $vder['vendor_email'];?>"><?php echo $vder['vendor_email'];?></option><?php } ?>');

      }


   }

       

  </script>
<script>
 function addededby(addvalue){
    // console.log('dsdasds');
    if(addvalue == 'VENDEOR'){
        $('.vendros').show();
        $('#vendersssss').attr('required', true);
    }else{
        $('.vendros').hide();
    // return false;
    }

    }

  function upaddededby(addvalue){
  		if(addvalue == 'VENDEOR'){
        	$('.upvendros').show();
        	$('#updateededby').attr('required', true);

	    }else{
	        $('.upvendros').hide();
	    // return false;
	    }

  }
       
</script>
 
