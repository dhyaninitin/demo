<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      Vendors Product Stock 
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Vendors Product Stock</li>
      </ol>
      </h1>
    </section>
<style type="text/css">
/*.nav-tabs-custom>.nav-tabs>li.active {
border-top-color: #3c8dbc;
border-bottom-color: #3c8dbc;
border-left-color: #3c8dbc;
border-right-color: #3c8dbc;
}
.nav-tabs-custom>.nav-tabs>li {
    border-top: 3px solid transparent;
    border-right: 3px solid transparent;
    border-left: 3px solid transparent;
    margin-right: 5px;
}*/

</style>
 
    <section class="content">
 
      <div class="row">

        <section class="col-lg-12 connectedSortable">
        <div class="box">
        <!-- <div class="box-header productsearch">
                <div calss="row">
                    <form>
                        <div class="col-lg-4">
                            <label class="fontsizunst" > Unit Measurement</label>
                                <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                                </select>
                        </div>
                        <div class="col-lg-2">
                            <label class="fontsizunst" > Unit pricet</label>
                            <input type="text" class="form-control" placeholder="Unit pricet">
                        </div>
                        <div class="col-lg-2">
                            <label class="fontsizunst" > &nbsp;</label>
                            <input type="text" class="form-control" placeholder="Unit pricet">
                        </div>

                        <div class="col-lg-2">
                            <button type="button" class="btn btn-primary btn-sm productsrcbtn " data-toggle="tooltip" data-placement="top" title="Search Product"><i class="fa fa-search-plus"></i> Search</button>
                        </div>
                    </form>
                </div>
            </div>
                 -->



            <div class="box-header">
                <!-- <div calss="row">
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Add_client" data-toggle="tooltip" data-placement="top" title="Add New Product"><i class="fa fa-plus-circle"></i> Add Product</button>
                        <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#Import_Product" data-toggle="tooltip" data-placement="top" title="Import Product"><i class="fa fa-upload"></i> Import Product</button>
                    </div>

                    <div class="col-lg-6">
                       
                        <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="tooltip" data-placement="top" title="Export Product"><i class="fa fa-download"></i> Export Product</button>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-12 col-xs-6 box-body whitee">
                <div class="nav-tabs-custom">
                    <!-- <ul class="nav nav-tabs" style="font-size: 16px;font-weight: 700;padding-bottom: 8px">
                        <li class="active"><a href="#activity" data-toggle="tab" class="normaltext">Combine Product Stock</a></li>
                        <li><a href="#timeline" data-toggle="tab" class="normaltext">Details Product Stock</a></li>
                    </ul> -->
                    <!-- <div class="tab-content"> -->
                        <!-- <div class="active tab-pane" id="activity"> -->
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr >
                                    <th class="tableth">#</th>
                                    <th class="tableth">Category</th>
                                    <th class="tableth">Product</th>
                                    <th class="tableth">HSN Code</th>
                                    <th class="tableth">Total Quantity</th>
                                    <th class="tableth">Balance</th>
                                    <th class="tableth">Latest Price</th>
                                    <th class="tableth">Description</th>
                                    <th class="tableth">Tax</th>
                                    <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $current_year = date("Y");  $current_month = date("m"); $prodct=mysqli_query($con,"SELECT *,SUM(product_quantity),SUM(purchase_quantity) FROM tapp_product WHERE added_by != 'SELF' GROUP BY product_name   ");
                                        $cnt = 1;
                                         while($pro=mysqli_fetch_assoc($prodct)) {?>
                                        <tr>
                                          <td class="tabletd"><?php echo $cnt;?></td>
                                          <td class="tabletd"><?php 
                                            $cat=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM tapp_pro_category WHERE id ='".$pro['category_id']."' ")); 
                                            echo $cat['categoryname'];?>
                                          </td>
                                          <td class="tabletd text-capitalize"><?php echo $pro['product_name'];?></td>
                                          <td class="tabletd"><?php echo $pro['hsn_code'];?></td>
                                          <td class="tabletd"><?php echo $pro['SUM(product_quantity)'].'&nbsp'.'<strong>'. $pro['product_unit'].'</strong>';?></td>
                                          <td class="tabletd"><?php echo $pro['SUM(product_quantity)'] - $pro['SUM(purchase_quantity)'].'&nbsp'.'<strong>'. $pro['product_unit'].'</strong>'; ?></td>
                                          <td class="tabletd"><?php 
                                              $price=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `tapp_product` WHERE  product_name = '".$pro['product_name']."' AND YEAR(add_date) = '$current_year' AND MONTH(add_date) = '$current_month' ORDER BY add_date DESC LIMIT 1 "));  
                                              echo $price['product_price'];?>
                                            </td>
                                          <td class="tabletd"><?php echo $pro['description'];?></td>
                                          <td class="tabletd"><?php echo $pro['tax'] . ' %';?></td>
                                          <!-- <td>
                                            
                                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update_client" data-toggle="tooltip" data-placement="top" title="Delete" onclick="pro_update('<?php echo $pro['pro_id'];?>','<?php echo $pro['categoryname'];?>','<?php echo $pro['id']?>','<?php echo $pro['product_name'];?>','<?php echo $pro['hsn_code'];?>','<?php echo $pro['product_quantity'];?>','<?php echo $pro['product_unit'];?>','<?php echo $pro['product_price'];?>','<?php echo $pro['description'];?>','<?php echo $pro['tax'];?>','<?php echo $pro['protax_name']?>','<?php echo $pro['added_by']?>')" ><i class="fa fa-pencil-square-o"></i></button>

                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal" data-toggle="tooltip" data-placement="top" title="Delete" onclick="delete_prodct('<?php echo $pro['pro_id'];?>')" ><i class="fa fa-trash"></i></button>
                                          
                                          </td> -->
                                        </tr>
                                    <?php $cnt = $cnt+1; } ?>
                                </tbody>
                            </table>
                        <!-- </div> -->
                        <!-- <div class="tab-pane" id="timeline">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Added BY</th>
                                    <th>Category</th>
                                    <th>Product</th>
                                    <th>HSN Code</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Tax</th>
                                    <th>Add/Update Date</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $prodct=mysqli_query($con,"SELECT * FROM tapp_product LEFT JOIN  tapp_pro_category  ON tapp_product.category_id = tapp_pro_category.id WHERE tapp_product.added_by != 'SELF'");
                                        $cnt = 1;
                                         while($pro=mysqli_fetch_assoc($prodct)) {?>
                                        <tr>
                                          <td><?php echo $cnt;?></td>
                                          <td><?php echo substr($pro['added_by'],0,12).'...';?></td>
                                          <td><?php echo $pro['categoryname'];?></td>
                                          <td><?php echo $pro['product_name'];?></td>
                                          <td><?php echo $pro['hsn_code'];?></td>
                                          <td><?php echo $pro['product_quantity'].'&nbsp'.'<strong>'. $pro['product_unit'].'</strong>';?></td>
                                          <td><?php echo $pro['product_price'];?></td>
                                          <td><?php echo $pro['description'];?></td>
                                          <td><?php echo $pro['tax'] . ' %';?></td>
                                          <td><?php echo date("d F Y", strtotime($pro['add_date']));?></td>

                                        
                                        </tr>
                                    <?php $cnt = $cnt+1; } ?>
                                </tbody>
                            </table>
                        </div> -->
                    </div>
                </div>
            </div>
        </div> 

            

        </section>
      
      </div>
    

    </section>

  </div>


 
