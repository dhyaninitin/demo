<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      Product Stock 
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Product Stock</li>
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
.loader11{
    border: 6px solid #f3f3f3;
    border-radius: 50%;
    border-top: 6px solid #563f4f;
    width: 70px;
    height: 70px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
  }
</style>
 
    <section class="content">
 
      <div class="row">


        <section class="col-lg-12 connectedSortable">
        <div class="box">
           <div class="box-header ">
                <form id="searchproduct" method="post">
                    <div class=" row box-body ">
                        <div class="col-lg-4">
                            <label class="fontsizunst" >Category</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user-o"></i>
                                    </div>
                                    <select class="form-control select2" style="width: 100%;" name="select-category" id="catnamee" onchange="category(this.value)">
                                        <option value="">Select Category</option>
                                        <?php $cate=mysqli_query($con,"SELECT * FROm tapp_pro_category  ");
                                          while($cateeeee=mysqli_fetch_assoc($cate)) {?>
                                          <option value="<?php echo $cateeeee['id']?>"><?php echo $cateeeee['categoryname']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                        </div>
                        <div class="col-lg-1 loaderdiv" id="loder1" style="display: none">
                            <img src="ZKZx.gif" class="loadercss">
                        </div>

                        <div class="col-lg-4">
                            <label class="fontsizunst" >Product</label>
                            <select class="form-control select2 product_name" id="product_nameee"  style="width: 100%;" >
                                <option value="">Select Product</option>
                            </select>   
                        </div>

                        <div class="col-lg-2">
                        <button type="button" class="btn btn-primary btn-sm productsrcbtn" id="search" data-toggle="tooltip" data-placement="top" title="Search Cheque"><i class="fa fa-search-plus"></i> Search</button>
                        </div>
                    </div>                       
                        <hr class="hrline">
                </form>
               
            </div>
            <div class="col-lg-12 col-xs-6 box-body whitee">
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr >
                      <th class="tableth">#</th>
                      <th class="tableth">Category</th>
                      <th class="tableth">Product</th>
                      <th class="tableth">Description</th>
                      <th class="tableth">HSN Code</th>
                      <th class="tableth">Total Quantity</th>
                      <th class="tableth">Sell Price</th>
                      <th class="tableth"> Profit Price</th>
                      <th class="tableth">Balance</th>
                      <th class="tableth">Profit Rs</th>
                      <th class="tableth">Tax</th>
                      <!-- <th>Action</th> -->
                      </tr>
                  </thead>
                  <tbody class="tbnum">
                      <?php $current_year = date("Y");  $current_month = date("m");
                       $prodct=mysqli_query($con,"SELECT *,SUM(product_quantity),SUM(purchase_quantity) FROM tapp_product GROUP BY product_name   ");
                          $cnt = 1;
                           while($pro=mysqli_fetch_assoc($prodct)) {?>
                          <tr>
                            <td class="tabletd"><?php echo $cnt;?></td>
                            <td class="tabletd"><?php 
                              $cat=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM tapp_pro_category WHERE id ='".$pro['category_id']."' ")); 
                              echo $cat['categoryname'];?>
                            </td>
                            <td class="tabletd text-capitalize"><?php echo $pro['product_name'];?></td>
                            <td class="tabletd"><?php echo $pro['description'];?></td>
                            <td class="tabletd"><?php echo $pro['hsn_code'];?></td>
                           
                            <td class="tabletd"><?php echo number_format($pro['SUM(product_quantity)']).'&nbsp'. $pro['product_unit'];?></td>
                            <td class="tabletd"><?php 
                                $price=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `tapp_product` WHERE  product_name = '".$pro['product_name']."' AND YEAR(add_date) = '$current_year' AND MONTH(add_date) = '$current_month' ORDER BY add_date DESC LIMIT 1 "));  
                                echo number_format($price['product_price']).' '.'Rs';?>
                              </td>
                               <td class="tabletd"><?php  echo number_format($price['profit_price']).' '.'Rs';?></td>
                               <td class="tabletd"><?php  $balnce =  $pro['SUM(product_quantity)'] - $pro['SUM(purchase_quantity)']; echo number_format($balnce).'&nbsp'. $pro['product_unit'];?></td>
                               <td class="tabletd"><?php echo number_format($balnce * $price['profit_price']).' '.'Rs' ;?></td>
                            <td class="tabletd"><?php echo $pro['tax'] . ' %';?></td>
                           
                          </tr>
                      <?php $cnt = $cnt+1; } ?>
                  </tbody>
              </table>
            </div>  

        </div> 

            

        </section>
      
      </div>
    

    </section>

  </div>

<script type="text/javascript">
    function category(catvalue){
      $("#loder1").show();
      // alert(catvalue);
      // console.log(catvalue);
      $.ajax({
        url:"cat-product",
        type:"POST",
        data: {catname:catvalue}, 
        success:function(status){
            // console.log(status);
            //check the array length

          if(status != '' ){
              let product  = JSON.parse(status);
              var all_product = '';
              all_product += '<option value ="" > Select Product </option>';
              product.forEach(function (productss){
              all_product += '<option value ="'+productss.pro_id +'" >'+ productss.product_name + '</option>'; 
              });
              // console.log(all_product);
              $('.product_name').html(all_product);

          }else{
              var audio = new Audio("warning.mp3");
              var context = 'warning';
              var message = 'No Product Available for this Category';
              var position = 'top-right';
              toastr.remove();
              toastr[context](message, '', {
                positionClass: 'toast-top-right'
              });
              audio.play(); 
          }

        $("#loder1").hide();
        }
    });


    }


  $("#search").click(function(){
      $('.tbnum').html('<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty"><img src="ZKZx.gif" class="loadercss"></td></tr>');

      var catnameeeeee = $("#catnamee").val(); var product_nameee = $("#product_nameee").val();
      // console.log(catnameeeeee); console.log(product_nameee);

       $.ajax({
        url:"search-product-stock",
        type:"POST",
        data: {catnameeee:catnameeeeee,productt:product_nameee }, 
        success:function(status){
          console.log(status);
          if(status != ''){
          jQuery('#example1').dataTable().fnDestroy();
            $('.tbnum').html(status);
          jQuery('#example1').dataTable();
        }else{
          $('.tbnum').html('<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No Product Available</td></tr>');
        }
        }
      });




  });
</script>
 
