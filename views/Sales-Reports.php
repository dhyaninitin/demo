<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
     Sales Reports
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Sales Reports</li>
      </ol>
      </h1>
    </section>


 
    <section class="content">
 
      <div class="row">
        <section class="col-lg-12 connectedSortable">
        <div class="box">
            <div class="col-lg-12 text-center"><h3>Sales Reports</h3></div>

            <div class="box-header ">
                <form>
                    <div class=" row box-body ">
                        <div class="col-lg-3">
                            <label class="fontsizunst" >Client</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user-o"></i>
                                    </div>
                                    <select class="form-control select2" id="client_name" style="width: 100%;">
                                        <option value="">Select Clients</option>
                                         <?php $clictname=mysqli_query($con,"SELECT * FROm tapp_clients ");
                                          while($clict=mysqli_fetch_assoc($clictname)) {?>
                                          <option value="<?php echo $clict['id']?>"><?php echo $clict['client_name']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                        </div>

                        <div class="col-lg-3">
                            <label class="fontsizunst" >Invoice Number</label>
                            <input type="text" class="form-control" id="invoice_number" placeholder="Invoice Number" >
                            
                        </div>

                        <div class="col-lg-2">
                            <label class="fontsizunst">Issue From</label>
                            <input type="text" class="form-control form_date" placeholder="Issue From" id="datepicker" >
                        </div>

                        <div class="col-lg-2">
                            <label class="fontsizunst">Due From</label>
                            <input type="text" class="form-control to_date" placeholder="Issue To" id="datepicker1" >
                        </div>
                        <div class="col-lg-2">
                        <button type="button" class="btn btn-primary btn-sm productsrcbtn" id="search" data-toggle="tooltip" data-placement="top" title="Search Cheque"><i class="fa fa-search-plus"></i> Search</button>
                        </div>
                    </div>                       
                        <hr class="hrline">
                </form>
               
            </div>

            <div class="box-header">
                <!-- <div calss="row" style="float:right;">
                    <div class="col-lg-12">
                        <a href="NewQuotation" type="button" class="btn btn-primary btn-sm"  data-toggle="tooltip" data-placement="top" title="Add New Invoice "><i class="fa fa-plus-circle"></i> Add New Quotation </a>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Export Report"><i class="fa fa-download"></i> Export Report(Excel)</button>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-12 col-xs-6 box-body whitee">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr >
                  <th class="tableth">#</th>
                  <th class="tableth">Invoice No</th>
                  <th class="tableth">Client Name</th>
                  <th class="tableth">Product Name</th>
                  <th class="tableth">Quantity</th>
                  <th class="tableth">Price</th>
                  <th class="tableth">Tax</th>
                  <th class="tableth">Tax Amount</th>
                  <th class="tableth">Total Amount</th>
                  <th class="tableth">Sale Date</th>
                  <!-- <th class="tableth">Action</th> -->
                </tr>
                </thead>
                <tbody class="tbnum">
                  <?php $Category=mysqli_query($con,"SELECT * FROM invoices  ORDER BY date DESC ");
                    $cnt = 1;
                         while($invoic=mysqli_fetch_assoc($Category)) {?>
                      <tr class="due<?php echo $cnt; ?>" >
                        <td class="tabletd"><?php echo $cnt;?></td>
                        <td class="tabletd"><?php echo $invoic['invoicenumber'];?></td>
                        <td class="tabletd"><?php $clinetname = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM tapp_clients WHERE id='".$invoic['clientname']."' "));
                         echo $clinetname['client_name'];?></td>
                        <td class="tabletd"><?php echo $invoic['product'];;?></td>
                        <td class="tabletd"><?php echo $invoic['quantity'];;?></td>
                        <td class="tabletd"><?php echo $invoic['unit_price'].'  '.'Rs';?></td>
                        <td class="tabletd"><?php echo $invoic['gst'].'  '.'%';?></td>
                        <td class="tabletd"><?php echo $invoic['totaltax'].'  '.'Rs';?></td>
                        <td class="tabletd"><?php echo $invoic['value'].'  '.'Rs';?></td>

                        <td class="tabletd"><?php echo date("d F Y", strtotime($invoic['date']));?></td>
                      
                      </tr>
                    <?php $cnt = $cnt +1; } ?>

                </tfoot> 
              </table>
              

            </div>
        </div> 




        </section>
      
      </div>
    

    </section>

  </div>
  


  <script type="text/javascript">
     $("#search").click(function(){
      var cliname = $("#client_name").val(); 
      var invoice_status = $("#invoice_number").val();
      var ford = new Date( $(".form_date").val() ); var formonth =ford.getMonth()+1;  var todate = new Date( $(".to_date").val() ); var tomonth = todate.getMonth()+1;
      var form_date = ford.getFullYear()+'-'+formonth+'-'+ ford.getDate();
      var to_date = todate.getFullYear()+'-'+tomonth+'-'+ todate.getDate();
      // console.log(to_date);
      // var date = new Date(form_date).toDateString("yyyy-MM-dd");

      // console.log(date); console.log(to_date);
      $('.tbnum').html('<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty"><img src="ZKZx.gif" class="loadercss"></td></tr>');

      $.ajax({
        url:"search-sale-reports",
        type:"POST",
        data: {cliid:cliname,invoice_number:invoice_status,form_date:form_date,to_date:to_date}, 
        success:function(status){
          console.log(status);
          if(status != ''){
          jQuery('#example1').dataTable().fnDestroy();
            $('.tbnum').html(status);
          jQuery('#example1').dataTable();
        }else{
          $('.tbnum').html('<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No Quotation Report Available For This Client</td></tr>');
        }
        }
      });
      // console.log(cliname);
    })

  </script>

 
