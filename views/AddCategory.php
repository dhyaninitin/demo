<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      Add Category 
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> Add Category </li>
      </ol>
      </h1>
    </section>

 
    <section class="content">
 
      <div class="row">

        <section class="col-lg-12 connectedSortable">
        <div class="box">
        
            <div class="box-header">
                <div calss="row">
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Add_Category" data-toggle="tooltip" data-placement="top" title="Add New Category"><i class="fa fa-plus-circle"></i> Add Category</button>
                        <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#Import_Product" data-toggle="tooltip" data-placement="top" title="Import Product"><i class="fa fa-upload"></i> Import Category</button>
                    </div>

                    <div class="col-lg-6">
                       
                        <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="tooltip" data-placement="top" title="Export Product"><i class="fa fa-download"></i> Export Category</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-6 box-body whitee">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="tableth">#</th>
                  <th class="tableth">Category Name</th>
                  <th class="tableth">Tax Name</th>
                  <th class="tableth">Tax % </th>
                  <th class="tableth">Description</th>
                  <th class="tableth">Add Date</th>
                  <th class="tableth">Action</th>
                </tr>
                </thead>
                <tbody>
                     <?php $Category=mysqli_query($con,"SELECT * FROM tapp_pro_category ");
                    $cnt = 1;
                         while($categorys=mysqli_fetch_assoc($Category)) {?>
                        <tr>
                          <td class="tabletd"><?php echo $cnt;?></td>
                          <td class="tabletd"><?php echo $categorys['categoryname'];?></td>
                          <td class="tabletd"><?php echo $categorys['tax_name'];?></td>
                         <td class="tabletd"><?php echo $categorys['tax_percentage'] . ' %';?></td>
                          <td class="tabletd"><?php echo $categorys['product_des'];?></td>
                          <td class="tabletd"><?php echo date("d F Y", strtotime($categorys['add_date']));?></td> 
                          <td class="tabletd">
                           <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update_category" data-toggle="tooltip" data-placement="top" title="Delete" onclick="update_cat('<?php echo $categorys['id']; ?>','<?php echo $categorys['categoryname']; ?>','<?php echo $categorys['tax_name']; ?>','<?php echo $categorys['tax_percentage']; ?>','<?php echo $categorys['product_des']; ?>')"><i class="fa fa-pencil-square-o"></i></button>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal" data-toggle="tooltip" data-placement="top" title="Delete" onclick="delet_cat('<?php echo $categorys['id'];?>')" ><i class="fa fa-trash"></i></button>
                          
                          </td> 
                        </tr>
                    <?php $cnt = $cnt+1; } ?>
                </tfoot>
              </table>
            </div>
        </div> 

                    <!-- Add Modal  -->
                <div class="modal fade" id="Add_Category">
                    <div class="modal-dialog" style="width: 800px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add New Category</h4>
                            </div>
                            <form role="form" action="AddProCategory" method="POST">
                                <div class="modal-body">
                                
                                    <div class=" row box-body ">
                                        <div class="form-group col-lg-4">
                                            <label class="fontsizunst">Category Name</label>
                                            <input type="text" class="form-control" name="category_name"  placeholder="Category Name" required="">
                                        </div>
                                        
                                        <div class="form-group col-lg-4">
                                            <label class="fontsizunst">Tax Name</label>
                                            <input type="text" class="form-control" name="tax_name" placeholder="Tax Name" required="">
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label class="fontsizunst"> Tax Percentage</label>
                                            <input type="text" class="form-control" name="tax_persentage" placeholder="Tax Percentage" required="">
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label class="fontsizunst"> Product Description </label>
                                            <textarea class="form-control" rows="4" name="product_des" placeholder="Product Description " ></textarea>
                                    </div>
                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Category</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                                </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>



                <!-- Update Modal  -->

                <div class="modal fade" id="update_category">
                    <div class="modal-dialog" style="width: 800px;">
                        <div class="modal-content">
                            <form role="form" action="updateProCategory" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="update_id" id="up_id">
                                    <div class=" row box-body ">
                                        <div class="form-group col-lg-4">
                                            <label class="fontsizunst">Category Name</label>
                                            <input type="text" class="form-control" name="up_categoryname" id="up_catname" placeholder="Enter Category Name" required="">
                                        </div>
                                        
                                        <div class="form-group col-lg-4">
                                            <label class="fontsizunst" >Tax Name</label>
                                            <input type="text" class="form-control" name="up_tax_name" id="up_taxname" placeholder="Enter the Tax Name" required="">
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label class="fontsizunst" > Tax Percentage</label>
                                            <input type="text" class="form-control" name="up_tax_persentg" id="up_taxpersentg" placeholder="Enter the Tax Percentage" required="">
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label class="fontsizunst" > Product Description </label>
                                             <textarea class="form-control" rows="4" name="up_productdes" id="up_productdes" placeholder="Product Description " ></textarea>
                                        </div>

                                    </div>
                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Update Category</button>
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
                                            <input type="file" class="form-control"  disabled="">
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
                            <form action="delete_cat" method="POST">
                                <div class="modal-body">
                                    <p class="deletep">Are you sure Want to Delete this Product  &hellip;</p>
                                    <input type="hidden" name="catdelete_id" id="delete_id">
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
      function delet_cat(value){
        $('#delete_id').val(value);
      }

      function update_cat(id,catname,taxname,taxpersentg,productdes){
        $('#up_id').val(id);
        $('#up_catname').val(catname);
        $('#up_taxname').val(taxname);
        $('#up_taxpersentg').val(taxpersentg);
        $('#up_productdes').val(productdes);
      }
  </script>

 
