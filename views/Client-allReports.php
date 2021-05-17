<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      Clients Invoice & Quotation Reports 
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Invoice & Quotation Reports  <?php echo $_GET['Client'];?> </li>
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
    background-color: #00ACD6 !important;
    color: white;
  }
</style>
 
    <section class="content">
 
      <div class="row">
       
        <section class="col-lg-12 connectedSortable">
        <div class="box">

            <div class="row" style="margin-left: 15px;margin-right: 15px;">
                <div class="col-lg-6 col-xs-6 box-body whitee" style="margin-bottom: 34px;">
                        <div class="box-header">
                            <div calss="row ">
                                <div class="col-lg-12 text-center">
                                <h4>Invoice Report</h4>
                                </div>
                            </div>
                        </div>
                   <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th class="tableth">#</th>
                              <th class="tableth">Invoice</th>
                              <th class="tableth">Payment</th>
                              <th class="tableth">Payment-By</th>
                              <th class="tableth">Status</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php $invoice=mysqli_query($con,"SELECT * FROM invoices WHERE clientname = '".$_GET['Client']."'  GROUP BY invoicenumber ");
                        $cnt = 1;
                             while($inv=mysqli_fetch_assoc($invoice)) {?>
                                <tr class="due<?php echo $cnt; ?>">
                                    <td class="tabletd"><?php echo  $cnt;?></td>
                                    <td class="tabletd"><?php echo $inv['invoicenumber'];?></td>
                                    <td class="tabletd"><?php echo $inv['totalpayment']; ?></td>
                                    <td class="tabletd"><?php echo $inv['payment_method']; ?></td>
                                   <td class="tabletd"><?php 
                                      if($inv['paymentstatus'] == '0'){ ?>
                                         <a class="btn btn-danger btn-xs">Pending</a>
                                      <?php }elseif ($inv['paymentstatus'] == '1') { ?>

                                        <a class="btn btn-success btn-xs">Paid</a>
                                        
                                      <?php }elseif($inv['paymentstatus'] == '2'){?>
                                        <a class="btn btn-info btn-xs">Balance</a>
                                        
                                      <?php }?>
                                    </td>

                                </tr>
                        <?php $cnt = $cnt+1; } ?>
                    </tbody>
                  </table>
                </div>

                <div class="col-lg-6 col-xs-6 box-body whitee" style="margin-bottom: 34px;">
                     <div class="box-header">
                            <div calss="row" >
                                <div class="col-lg-12 text-center">
                                <h4>Quotation Report</h4>
                                </div>
                            </div>
                        </div>
                       <table id="example2" class="table table-bordered table-striped">
                        <thead> 
                        <tr>
                          <th class="tableth">#</th>
                          <th class="tableth">Invoice</th>
                          <th class="tableth">Payment</th>
                          <!-- <th class="tableth">Payment-By</th> -->
                          <th class="tableth">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $Category=mysqli_query($con,"SELECT * FROM newquotation GROUP BY invoicenumber ");
                              $cnt = 1;
                                   while($invoic=mysqli_fetch_assoc($Category)) {?>
                                <tr class="due<?php echo $cnt; ?>" >
                                  <td class="tabletd"><?php echo $cnt;?></td>
                                  <td class="tabletd"><?php echo $invoic['invoicenumber'];?></td>
                                  <td class="tabletd"><?php echo $invoic['totalpayment'].'  '.'Rs';?></td>
                                  <td class="tabletd"><?php if($invoic['invoice_status'] == 0 ){?> <span class="label label-info">Save</span>
                                            <?php }else if($invoic['invoice_status'] == 1 ){?>
                                              <span class="label label-success">Generate</span>
                                            <?php }?>
                                  </td>
                                 
                                </tr>
                    <?php $cnt = $cnt +1; } ?>
                        </tbody>
                      </table>
                </div>
            </div>
        </div> 

        
        </section>
      
      </div>
    

    </section>

  </div>

<!--   <script>
    $( document ).ready(function() {
      $("#example1_length").attr("style", "display:block");
      $("#example1_filter").attr("style", "display:block");
    alert('ready');
    });
  </script>
 -->
