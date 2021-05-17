<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      Payment-History
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Payment-History</li>
      </ol>
      </h1>
    </section>

<style type="text/css">
  .duepaymet{
    background-color: #D73925 !important;
    color: white;
  }
   .paidpaymet{
    background-color: #008D4C !important;
    color: white;
  }

   .balancepaymet{
    background-color: #E08E0B !important;
    color: white;
  }
</style>
 
    <section class="content">
 
      <div class="row">
        <section class="col-lg-12 connectedSortable">
        <div class="box">
            <div class="col-lg-12 text-center"><h3>Payment-History</h3></div>

            <div class="box-header ">
                <form >
                    <div class=" row box-body ">
                        <div class="col-lg-3">
                            <label class="fontsizunst" >Client</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user-o"></i>
                                    </div>
                                    <select class="form-control select2" id="client_name" style="width: 100%;text-transform: capitalize;">
                                        <option value="">Select Clients</option>
                                         <?php $clictname=mysqli_query($con,"SELECT * FROm tapp_clients ");
                                          while($clict=mysqli_fetch_assoc($clictname)) {?>
                                          <option value="<?php echo $clict['id']?>"><?php echo $clict['client_name']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                        </div>

                        <!-- <div class="col-lg-2">
                            <label class="fontsizunst">Invoice Status</label>
                            <select class="form-control select2" style="width: 100%;" id="invoice_status">
                                <option value="">Select Status</option>
                                <option value="0">Pending</option>
                                <option value="1">Paid</option>
                                <option value="2">Balance</option>
                            </select>   
                        </div> -->

                        <div class="col-lg-2">
                            <label class="fontsizunst">From</label>
                            <input type="text" class="form-control form_date" placeholder="Issue From" id="datepicker" >
                        </div>

                        <div class="col-lg-2">
                            <label class="fontsizunst">To</label>
                            <input type="text" class="form-control to_date"  placeholder="Issue To" id="datepicker1" >
                        </div>
                        <div class="col-lg-1">
                        <button type="button" class="btn btn-primary btn-sm productsrcbtn " id="search" data-toggle="tooltip" data-placement="top" title="Search Cheque"><i class="fa fa-search-plus"></i> Search</button>
                        </div>
                    </div>                       
                        <hr class="hrline">
                </form>
            </div>

            <div class="box-header">
                <div calss="row" style="float:right;">
                    <div class="col-lg-12">
                        <!-- <a href="GenerateInvoice" type="button" class="btn btn-primary btn-sm"  data-toggle="tooltip" data-placement="top" title="Add New Invoice "><i class="fa fa-plus-circle"></i> Add New Invoice </a> -->
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Export Report"><i class="fa fa-download"></i> Export Report(Excel)</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-6 box-body whitee">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr >
                  <th class="tableth">#</th>
                  <th class="tableth">Client</th>
                  <th class="tableth">Invoice No</th>
                  <th class="tableth">Issue Date</th>
                  <th class="tableth">Due Date</th>
                  <!-- <th class="tableth">Total tax</th> -->
                  <th class="tableth">Bill Amount </th>
                  <th class="tableth">Total / Balance</th>
                  <th class="tableth">Total Pay</th>
                  <!-- <th class="tableth">Pay Date</th> -->
                  <!-- <th class="tableth">Action</th> -->
                </tr>
                </thead>
                <tbody class="tbnum">
                  <?php $Category=mysqli_query($con,"SELECT * FROM invoices GROUP BY invoicenumber ");
                    $cnt = 1;
                         while($invoic=mysqli_fetch_assoc($Category)) {
                          if($invoic['balance_payment'] !=  ''){
                          ?>
                      <tr class="due<?php echo $cnt; ?>" >
                        <td class="tabletd"><?php echo $cnt;?></td>
                        <td class="tabletd"><?php $clinetname = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM tapp_clients WHERE id='".$invoic['clientname']."' "));
                         echo $clinetname['client_name'];?></td>
                        <td class="tabletd"><?php echo $invoic['invoicenumber'];?></td>
                        <td class="tabletd"><?php echo date("d F Y", strtotime($invoic['date']));?></td>
                        <td class="tabletd"><?php echo date("d F Y", strtotime($invoic['date'] . ' + 30 days'));?></td>

                        <!-- <td class="tabletd"><?php echo $invoic['totaltax'].'  '.'Rs';?></td> -->
                        <td class="tabletd"><?php echo $invoic['totalpayment'].'  '.'Rs';?></td>
                        <td class="tabletd" style="font-weight: 900 !important;"> <?php echo $invoic['totalpayment'] - $invoic['balance_payment'].'  '.'Rs' ;?></td>
                        <td class="tabletd"><?php echo $invoic['balance_payment'];?></td>
                        <!-- <td class="tabletd">Paydate</td> -->
                      

                        <!-- <td class="tabletd">
                          <button type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Update Vendor"><i class="fa fa-pencil-square-o"></i></button>
                          <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" onclick="paymenthistory('<?php echo $invoic['totalpayment']?>','<?php echo $invoic['invoicenumber'];?>','<?php echo $clinetname['client_name'];?>')" data-target="#payment_history" data-toggle="tooltip" data-placement="top" title="Payment History"><i class="fa fa-eye"></i></button>

                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" onclick="showpayent('<?php echo $invoic['totalpayment']?>','<?php echo $invoic['invoicenumber'];?>','<?php echo $clinetname['client_name'];?>')" data-target="#payment" data-toggle="tooltip" data-placement="top" title="Add Payment" ><i class="fa fa-inr"></i></button>
                          <a href="invoice-pdf/<?php echo $invoic['invoicenumber'].'.pdf'; ?>" target="_blank" type="button" class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-print"></i></a>
                        </td> -->
                      </tr>
                    <?php $cnt = $cnt +1; } }?>
                
                
                </tfoot> 
              </table>
              

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
                                <p class="deletep">Are you sure Want to Delete this Vendor &hellip;</p>
                            </div>
                            <div class="modal-footer">
                              
                                <button type="button" class="btn btn-primary"><i class="fa fa-trash"></i> Delete Vendor</button>
                                <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                



        </section>
      
      </div>
    

    </section>

  </div>

  <script type="text/javascript">
    $("#search").click(function(){
      var cliname = $("#client_name").val(); var invoice_status = $("#invoice_status").val();
      var ford = new Date( $(".form_date").val() ); var formonth =ford.getMonth()+1;  var todate = new Date( $(".to_date").val() ); var tomonth = todate.getMonth()+1;
      var form_date = ford.getFullYear()+'-'+formonth+'-'+ ford.getDate();
      var to_date = todate.getFullYear()+'-'+tomonth+'-'+ todate.getDate();
      // console.log(to_date);
      // var date = new Date(form_date).toDateString("yyyy-MM-dd");

      // console.log(date); console.log(to_date);
      $('.tbnum').html('<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty"><img src="ZKZx.gif" class="loadercss"></td></tr>');

      $.ajax({
        url:"search-payment-reports",
        type:"POST",
        data: {cliid:cliname,payment_type:invoice_status,form_date:form_date,to_date:to_date}, 
        success:function(status){
          // console.log(status);
          if(status != ''){
          jQuery('#example1').dataTable().fnDestroy();
            $('.tbnum').html(status);
          jQuery('#example1').dataTable();
        }else{
          $('.tbnum').html('<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No Payment History Available For This Client</td></tr>');
        }
        }
      });
      // console.log(cliname);

    })
  </script>
  