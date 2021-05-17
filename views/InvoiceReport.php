<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      Invoice Report
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Invoice Report</li>
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
            <div class="col-lg-12 text-center"><h3>Invoice Report</h3></div>

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

                        <div class="col-lg-2">
                            <label class="fontsizunst">Invoice Status</label>
                            <select class="form-control select2" style="width: 100%;" id="invoice_status">
                                <option value="">Select Status</option>
                                <option value="0">Pending</option>
                                <option value="1">Paid</option>
                                <option value="2">Balance</option>
                            </select>   
                        </div>

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
                        <a href="GenerateInvoice" type="button" class="btn btn-primary btn-sm"  data-toggle="tooltip" data-placement="top" title="Add New Invoice "><i class="fa fa-plus-circle"></i> Add New Invoice </a>
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
                  <th class="tableth">Total tax</th>
                  <th class="tableth">Bill Amount </th>
                  <th class="tableth">Total / Balance</th>
                  <th class="tableth">Status</th>
                  <!-- <th class="tableth"style="display: none;" >Payment status</th> -->
                  <th class="tableth">Action</th>
                </tr>
                </thead>
                <tbody class="tbnum">
                  <?php $Category=mysqli_query($con,"SELECT * FROM invoices GROUP BY invoicenumber ");
                    $cnt = 1;
                         while($invoic=mysqli_fetch_assoc($Category)) {?>
                      <tr class="due<?php echo $cnt; ?>" >
                        <td class="tabletd"><?php echo $cnt;?></td>
                        <td class="tabletd"><?php $clinetname = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM tapp_clients WHERE id='".$invoic['clientname']."' "));
                         echo $clinetname['client_name'];?></td>
                        <td class="tabletd"><?php echo $invoic['invoicenumber'];?></td>
                        <td class="tabletd"><?php echo date("d F Y", strtotime($invoic['date']));?></td>
                        <td class="tabletd"><?php echo date("d F Y", strtotime($invoic['date'] . ' + 30 days'));?></td>

                        <td class="tabletd"><?php echo $invoic['totaltax'].'  '.'Rs';?></td>
                        <td class="tabletd"><?php echo $invoic['totalpayment'].'  '.'Rs';?></td>
                        <td class="tabletd" style="font-weight: 900 !important;"> <?php echo $invoic['totalpayment'] - $invoic['balance_payment'].'  '.'Rs' ;?></td>
                        <td class="tabletd"><?php 
                          if($invoic['paymentstatus'] == '0'){ ?>
                             <a class="btn btn-danger btn-xs">Pending</a>
                          <?php }elseif ($invoic['paymentstatus'] == '1') { ?>

                            <a class="btn btn-success btn-xs">Paid</a>
                            <script>$( document ).ready(function() {
                                            var redclass = 'due'+<?php echo $cnt; ?>;
                                              // console.log(redclass);
                                              // $('.'+redclass).addClass('paidpaymet');
                                              // console.log('1');
                                          });</script>
                          <?php }elseif($invoic['paymentstatus'] == '2'){?>
                            <a class="btn btn-warning btn-xs">Balance</a>
                            <script>$( document ).ready(function() {
                                            var redclass = 'due'+<?php echo $cnt; ?>;
                                              // console.log(redclass);
                                              // $('.'+redclass).addClass('balancepaymet');
                                              // console.log('1');
                                  });</script>
                          <?php }?>
                        </td>
                        <!-- <td class="tabletd" style="display: none;"> <?php  echo $duedate = date('Y-m-d', strtotime($invoic['date']. ' + 30 days')); 
                                      // $newdate = date('2021-03-30');
                                      $newdate = date('Y-m-d');
                                      if($duedate <= $newdate){
                                        if($invoic['paymentstatus'] == 0  ){
                                        ?>
                                        <script>
                                          $( document ).ready(function() {
                                            var redclass = 'due'+<?php echo $cnt; ?>;
                                              // console.log(redclass);
                                              $('.'+redclass).addClass('duepaymet');
                                              console.log('0');
                                          });</script>

                                      <?php }elseif ($invoic['paymentstatus'] == 1) { ?>
                                        <script>
                                          $( document ).ready(function() {
                                            var redclass = 'due'+<?php echo $cnt; ?>;
                                              // console.log(redclass);
                                              $('.'+redclass).addClass('paidpaymet');
                                              console.log('1');
                                          });</script>
                                      <?php }elseif ($invoic['paymentstatus'] == 2) {?>
                                         <script>
                                          $( document ).ready(function() {
                                            var redclass = 'due'+<?php echo $cnt; ?>;
                                              // console.log(redclass);
                                              $('.'+redclass).addClass('balancepaymet');
                                              console.log('1');
                                          });</script>


                                      <?php }  }else{
                                        echo 'no due date';
                                      }
                         ?></td> -->

                        <td class="tabletd">
                          <!-- <button type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Update Vendor"><i class="fa fa-pencil-square-o"></i></button> -->
                          <!-- <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" onclick="paymenthistory('<?php echo $invoic['totalpayment']?>','<?php echo $invoic['invoicenumber'];?>','<?php echo $clinetname['client_name'];?>')" data-target="#payment_history" data-toggle="tooltip" data-placement="top" title="Payment History"><i class="fa fa-eye"></i></button> -->

                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" onclick="showpayent('<?php echo $invoic['totalpayment']?>','<?php echo $invoic['invoicenumber'];?>','<?php echo $clinetname['client_name'];?>','<?php echo $invoic['balance_payment']?>')" data-target="#payment" data-toggle="tooltip" data-placement="top" title="Add Payment" ><i class="fa fa-inr"></i></button>
                          <a href="invoice-pdf/<?php echo $invoic['invoicenumber'].'.pdf'; ?>" target="_blank" type="button" class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-print"></i></a>
                        </td>
                      </tr>
                    <?php $cnt = $cnt +1; } ?>
                
                
                </tfoot> 
              </table>
              

            </div>
        </div> 

          <!-- Payment History -->
          <div class="modal fade" id="payment">
                    <div class="modal-dialog" style="width: 800px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-inr"></i> <span id="client_name"></span> Payment  </h4>
                            </div>
                            <form role="form" action="invoice-payment_method" method="POST">
                                <div class="modal-body">
                                
                                    <div class=" row box-body ">
                                        <div class="form-group col-lg-4">
                                          <label class="fontsizunst">Payment Type</label>
                                            <select class="form-control" name="payment_method" required="" >
                                              <option value="">-- Select Payment Type -- </option>
                                              <option value="cash">Cash</option>
                                              <option value="creditcard">Credit Card</option>
                                              <option value="check">Check</option>
                                              <option value="banktransfer">Bank Transfer</option>
                                              <option value="other">Other</option>
                                              </select>
                                        </div>
                                        <input type="hidden" name="invoice_numbaer" id="invoice_numbr">
                                        <input type="hidden" name="balace_payment" id="balancepay">
                                        <div class="form-group col-lg-4">
                                           <label class="fontsizunst">Payment</label>
                                             <select class="form-control" name="payment_type" id="payment_type" onchange="Paymentonehalf(this.value)">
                                                <option value="">-- Select Payment -- </option>
                                                <option value="onehalf">One Half</option>
                                                <option value="full">Full</option>
                                                <option value="UnPiad">UnPiad</option>
                                              </select>
                                        </div>
                                        

                                        <div class="form-group col-lg-4 halfpay"  style="display: none;">
                                            <label class="fontsizunst">Half Payment</label>
                                            <input type="text" class="form-control" name="half_payment" id="half_payment" placeholder="Enter Half Payment">
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label class="fontsizunst"> Total Payment</label>
                                            <input type="text" class="form-control" id="totalpayment" name="totalpayment" placeholder="Enter Total Payment" readonly>
                                        </div>


                                        <div class="form-group col-lg-4">
                                            <label class="fontsizunst"> Payment Date </label>
                                            <input type="text" class="form-control current_date" name="payment_date" placeholder="Payment Date"  id="datepicker2" autocomplete="off">
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label class="fontsizunst"> Notes </label>
                                            <textarea class="form-control" rows="4" name="payment_notes" placeholder="Payment Notes" ></textarea>
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
  <script>
  function Paymentonehalf(val){
    if(val == 'onehalf'){
      $('.halfpay').show();
      $('#half_payment').prop('required', true);

    }else if(val == 'full'){
      $('.halfpay').hide();
      $('#half_payment').prop('required', false);

    }
  }
</script>

  <script>
   function gettex(tax_type){
       if(tax_type == 'InclusiveTax'){
           $('.InclusiveTax').show();
            $('.ExclusiveTax').hide();


       }else if(tax_type == 'ExclusiveTax'){
            $('.InclusiveTax').hide();
            $('.ExclusiveTax').show();
       }
       
   }


   function showpayent(totalpayment,invoice_numbr,client_name,balanec_paymet){
    $('#client_name').html(client_name);
    $('#invoice_numbr').val(invoice_numbr);
    $('#totalpayment').val(totalpayment);
    $('#balancepay').val(balanec_paymet);
   }

    $(document).ready(function() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        today = mm + '/' + dd + '/' + yyyy;
        $('.current_date').val(today);

     });



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
        url:"search-invoice-reports",
        type:"POST",
        data: {cliid:cliname,payment_type:invoice_status,form_date:form_date,to_date:to_date}, 
        success:function(status){
          // console.log(status);
          if(status != ''){
          jQuery('#example1').dataTable().fnDestroy();
            $('.tbnum').html(status);
          jQuery('#example1').dataTable();
        }else{
          $('.tbnum').html('<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No Invoice Report Available For This Client</td></tr>');
        }
        }
      });
      // console.log(cliname);

    })
  </script>

 
