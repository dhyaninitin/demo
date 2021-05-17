<?php
// session_start();
class Admin_Model {
    private $conn;
     public function Model()
     {
       error_reporting(E_ALL & ~E_NOTICE);
     }
    public function connect(){
        $connect = mysqli_connect('localhost','root','','soft_ebilling');
        return $connect;
    }
    function __construct(){
        $this->conn = $this->connect();
    }

    function Addclient($company_name,$client_name,$phone_number,$emial_address,$gst_number,$country,$State,$city,$shipping_country,$sjipping_state,$shipping_city,$sipping_zip_code,$shipping_address,$lst_cst_number){

         $check_client = mysqli_query($this->conn,"SELECT * FROM `tapp_clients` WHERE `email_address` = '$emial_address'");
            if(mysqli_num_rows($check_client) > 0){
               return 'duplicate';
              
            }else{
               $folio_number =  rand(0,100000);
             $login_query = mysqli_query($this->conn,"INSERT INTO tapp_clients (company_name,client_name,phone_number,email_address,gst_number,country,state,city,shipping_country,shipping_state,shipping_city,shipping_zip_code,shipping_address,current_date_time,folio_number) VALUES('$company_name','$client_name','$phone_number','$emial_address','$gst_number','$country','$State','$city','$shipping_country','$sjipping_state','$shipping_city','$sipping_zip_code','$shipping_address',now() ,'$folio_number')");
                if($login_query){
                    return 'ok';
                }else{
                    return false;
                }
            }
    }


    function banclient($ban_id,$balacklistvalue){
        
        $ban_client = mysqli_query($this->conn,"UPDATE `tapp_clients` SET `black_list` = '$balacklistvalue' WHERE id = '$ban_id' ");

        if($ban_client){
            // echo 'yes';
            return $ban_client;
        }else{
            return false;
            // echo 'no';
        }

    }   

    function deleteclit($dlt_id) {
        $deleteclit = mysqli_query($this->conn,"DELETE FROM `tapp_clients` WHERE  id = '$dlt_id' ");
        if($deleteclit){
            // echo 'yes';
            return $deleteclit;
        }else{
            return false;
            // echo 'no';
        }
    }

    function updateclient($update_id,$updet_copm_name,$updet_clint_nam,$updet_mobile_num,$updet_emial_addrs,$updet_gst_num,$updet_contry,$updet_state,$updet_city,$updet_ship_contry,$updet_ship_state,$updet_ship_city,$updet_sip_z_code,$updet_sip_ddress){

         $updateclient = mysqli_query($this->conn,"UPDATE tapp_clients SET company_name = '$updet_copm_name',client_name = '$updet_clint_nam',phone_number = '$updet_mobile_num' ,email_address = '$updet_emial_addrs',gst_number = '$updet_gst_num',country = '$updet_contry',state = '$updet_state',city = '$updet_city',shipping_country = '$updet_ship_contry',shipping_state = '$updet_ship_state',shipping_city = '$updet_ship_city',shipping_zip_code = '$updet_sip_z_code',shipping_address = '$updet_sip_ddress' WHERE id = '$update_id' ");
                if($updateclient){
                    return $updateclient;
                }else{
                    return false;
                }
    }

    function cliexportdata($filename){
        ob_clean();
        header( 'Content-Type: text/csv' );
        header( 'Content-Disposition: attachment;filename='.trim($filename));
        //set the column names
        $cells[] = array('S.No.', 'CompanyName','ClientName','MobileNumber','EmailAddress',  'GSTNumber' ,'AddDate');
        $file = fopen('php://output', 'w');
        $cliexportdata=mysqli_query($this->conn,"SELECT * FROM tapp_clients WHERE black_list ='0'");
        $i=1;
           while($row=mysqli_fetch_array($cliexportdata)){
        //pass all the form values
        $cells[] = array( $i, $row['company_name'],$row['client_name'], $row['phone_number'] ,$row['email_address'], $row['gst_number'], $row['current_date_time']);
        $i++;
        }
        foreach($cells as $cell)
        {
            fputcsv($file,$cell);
        } 
        fclose($file);

    }

    // vendor model start

    function AddVendor($vendor_name,$vendor_email,$vendor_phone,$vendor_brand_name,$vendor_brand,$vondor_company_name,$vendor_address,$vendor_des){
         $check_vendor = mysqli_query($this->conn,"SELECT * FROM `tapp_vendor` WHERE `vendor_email` = '$vendor_email'");
            if(mysqli_num_rows($check_vendor) > 0){
               return 'duplicate';
              
            }else{
             $AddVendor = mysqli_query($this->conn,"INSERT INTO tapp_vendor (vendor_name,vendor_email,vendor_phone,vendor_brand_name,vendor_brand,vondor_company_name,vendor_address,vendor_des,add_date) VALUES('$vendor_name','$vendor_email','$vendor_phone','$vendor_brand_name','$vendor_brand','$vondor_company_name','$vendor_address','$vendor_des',now())");
                if($AddVendor){
                    return 'ok';
                }else{
                    return false;
                }
            }
    }

    function updateVendor($update_id,$update_vendor_name,$update_vendor_email,$update_vendor_phone,$update_vendor_brand_name,$update_vendor_brand,$update_vondor_company_name,$update_vendor_address,$update_vendor_des){
         $updateVendor = mysqli_query($this->conn,"UPDATE tapp_vendor SET  vendor_name = '$update_vendor_name',vendor_email = '$update_vendor_email',vendor_phone = '$update_vendor_phone',vendor_brand_name = '$update_vendor_brand_name',vendor_brand = '$update_vendor_brand',vondor_company_name = '$update_vondor_company_name',vendor_address = '$update_vendor_address',vendor_des = '$update_vendor_des' WHERE id = '$update_id' ");
                if($updateVendor){
                    return $updateVendor;
                }else{
                    return false;
                }

    }

     function DelteVendor($delete_id) {
        $DelteVendor = mysqli_query($this->conn,"DELETE FROM `tapp_vendor` WHERE  id = '$delete_id' ");
        if($DelteVendor){
            return $DelteVendor;
        }else{
            return false;
        }


    }

    // Product Category Start 

    function AddProCategory($category_name,$tax_name,$tax_persentage,$product_des){
            // echo "INSERT INTO tapp_pro_category (categoryname,productname,productunit,productHSNCode,add_date) VALUES('$category_name','$product_name','$productunit','$produt_hsncode',now())";
        $check_ProCategory = mysqli_query($this->conn,"SELECT * FROM `tapp_pro_category` WHERE `categoryname` = '$category_name'");
            if(mysqli_num_rows($check_ProCategory) > 0){
               echo 'duplicate';
              
            }else{
             $AddProCategory = mysqli_query($this->conn,"INSERT INTO tapp_pro_category(categoryname,tax_name,tax_percentage,product_des,add_date) VALUES('$category_name','$tax_name','$tax_persentage','$product_des',now())");
                if($AddProCategory){
                    return $AddProCategory;
                }else{
                    echo false;
                }
            }

    }

    function updateProCategory($cat_update_id,$up_categoryname,$up_tax_name,$up_tax_persentg,$up_productdes){
        // $check_ProCategory = mysqli_query($this->conn,"SELECT * FROM `tapp_pro_category` WHERE `categoryname` = '$up_categoryname'");
        //     if(mysqli_num_rows($check_ProCategory) > 0){
        //        echo 'duplicate';
        //     }else{
                $updateProCategory = mysqli_query($this->conn,"UPDATE tapp_pro_category SET categoryname = '$up_categoryname' ,tax_name = '$up_tax_name' ,tax_percentage = '$up_tax_persentg' ,product_des = '$up_productdes' WHERE id = '$cat_update_id' ");
                        if($updateProCategory){
                            return $updateProCategory;
                        }else{
                            echo false;
                        }
            // }

    }

    function delete_cat($catdelete_id){
        $delete_cat = mysqli_query($this->conn,"DELETE FROM `tapp_pro_category` WHERE  id = '$catdelete_id' ");
        if($delete_cat){
            return $delete_cat;
        }else{
            return false;
        }


    }

    function fatch_units($units){
        $fatch_units = mysqli_query($this->conn,"SELECT * FROM `all_units` ");
        if($fatch_units){
            return $fatch_units;
        }else{
            return false;
        }


    }

    function getcatvalue($catvalue){
        $getcatvalue = mysqli_query($this->conn,"SELECT * FROM `tapp_pro_category` WHERE  id = '$catvalue'  ");

        if($getcatvalue){
            return $getcatvalue;
        }else{
            return false;
        }

    }


    function catproduct(){
         $catid = $_POST['catname'];
        $catproduct = mysqli_query($this->conn,"SELECT product_name ,pro_id FROM `tapp_product` WHERE category_id = '$catid'  ");
        if($catproduct){
            return $catproduct;
        }else{
            return false;
        }
    }

    function searchproductstock(){
        $searchproductstock = $_POST['catnameeee']; $productt = $_POST['productt'];
        // echo "SELECT *,SUM(product_quantity),SUM(purchase_quantity) FROM tapp_product WHERE category_id  LIKE '".$searchproductstock."%' GROUP BY product_name ";
        // exit();
        if($productt != ''){
            $catproduct = mysqli_query($this->conn,"SELECT *,SUM(product_quantity),SUM(purchase_quantity) FROM tapp_product WHERE category_id = '$searchproductstock' and pro_id ='$productt' GROUP BY product_name");
        }else{
        $catproduct = mysqli_query($this->conn,"SELECT *,SUM(product_quantity),SUM(purchase_quantity) FROM tapp_product WHERE category_id = '$searchproductstock' GROUP BY product_name");
        }

        if($catproduct){
            $current_year = date("Y");  $current_month = date("m");
            $cnt = 1;
        while($pro=mysqli_fetch_array($catproduct)){ ?>
             <tr>
                <td class="tabletd"><?php echo $cnt;?></td>
                <td class="tabletd"><?php 
                  $cat=mysqli_fetch_assoc(mysqli_query($this->conn,"SELECT * FROM tapp_pro_category WHERE id ='".$pro['category_id']."' ")); 
                  echo $cat['categoryname'];?>
                </td>
                <td class="tabletd text-capitalize"><?php echo $pro['product_name'];?></td>
                <td class="tabletd"><?php echo $pro['description'];?></td>
                <td class="tabletd"><?php echo $pro['hsn_code'];?></td>
               
                <td class="tabletd"><?php echo number_format($pro['SUM(product_quantity)']).'&nbsp'. $pro['product_unit'];?></td>
                <td class="tabletd"><?php 
                    $price=mysqli_fetch_assoc(mysqli_query($this->conn,"SELECT * FROM `tapp_product` WHERE  product_name = '".$pro['product_name']."' AND YEAR(add_date) = '$current_year' AND MONTH(add_date) = '$current_month' ORDER BY add_date DESC LIMIT 1 "));  
                    echo number_format($price['product_price']).' '.'Rs';?>
                  </td>
                   <td class="tabletd"><?php  echo number_format($price['profit_price']).' '.'Rs';?></td>
                   <td class="tabletd"><?php  $balnce =  $pro['SUM(product_quantity)'] - $pro['SUM(purchase_quantity)']; echo number_format($balnce).'&nbsp'. $pro['product_unit'];?></td>
                   <td class="tabletd"><?php echo number_format($balnce * $price['profit_price']).' '.'Rs' ;?></td>
                <td class="tabletd"><?php echo $pro['tax'] . ' %';?></td>
            </tr>
        <?php $cnt = $cnt+1; } }else{
            return false;
        }

    }


    function searchinvoicereports(){
         $cliid = $_POST['cliid']; echo $payment_type = $_POST['payment_type'];
         $form_date = $_POST['form_date']; $to_date = $_POST['to_date'];
        // OR paymentstatus = '$payment_type';
        if($payment_type == '' &&  $form_date == 'NaN-NaN-NaN' && $to_date == 'NaN-NaN-NaN' ){
            $catproduct = mysqli_query($this->conn,"SELECT * FROM invoices  WHERE clientname = '$cliid' GROUP BY invoicenumber ");
        }elseif($cliid == '' &&  $form_date == 'NaN-NaN-NaN' && $to_date == 'NaN-NaN-NaN' ){
            $catproduct = mysqli_query($this->conn,"SELECT * FROM invoices  WHERE paymentstatus = '$payment_type' GROUP BY invoicenumber ");
        }
        elseif($cliid == '' && $payment_type == '' ){
            $catproduct = mysqli_query($this->conn,"SELECT * FROM invoices  WHERE date between '$form_date' AND '$to_date' GROUP BY invoicenumber ");
        }else if($form_date == 'NaN-NaN-NaN' && $to_date == 'NaN-NaN-NaN' ){
            $catproduct = mysqli_query($this->conn,"SELECT * FROM invoices  WHERE clientname = '$cliid' AND paymentstatus = '$payment_type' GROUP BY invoicenumber ");
        }else if($payment_type == ''){
            $catproduct = mysqli_query($this->conn,"SELECT * FROM invoices  WHERE clientname = '$cliid' AND date between '$form_date' AND '$to_date' GROUP BY invoicenumber ");

        }
            $cnt = 1; while($invoic=mysqli_fetch_assoc($catproduct)){?>

            <tr class="due<?php echo $cnt; ?>" >
                <td class="tabletd"><?php echo $cnt;?></td>
                <td class="tabletd"><?php $clinetname = mysqli_fetch_assoc(mysqli_query($this->conn,"SELECT * FROM tapp_clients WHERE id='".$invoic['clientname']."' "));
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


                <td class="tabletd">
                  <!-- <button type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Update Vendor"><i class="fa fa-pencil-square-o"></i></button> -->
                  <!-- <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" onclick="paymenthistory('<?php echo $invoic['totalpayment']?>','<?php echo $invoic['invoicenumber'];?>','<?php echo $clinetname['client_name'];?>')" data-target="#payment_history" data-toggle="tooltip" data-placement="top" title="Payment History"><i class="fa fa-eye"></i></button> -->

                  <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" onclick="showpayent('<?php echo $invoic['totalpayment']?>','<?php echo $invoic['invoicenumber'];?>','<?php echo $clinetname['client_name'];?>')" data-target="#payment" data-toggle="tooltip" data-placement="top" title="Add Payment" ><i class="fa fa-inr"></i></button>
                  <a href="invoice-pdf/<?php echo $invoic['invoicenumber'].'.pdf'; ?>" target="_blank" type="button" class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-print"></i></a>
                </td>
              </tr>
            <?php $cnt = $cnt +1;  } 
    }




    function searchpaymentreports(){
         $cliid = $_POST['cliid']; echo $payment_type = $_POST['payment_type'];
         $form_date = $_POST['form_date']; $to_date = $_POST['to_date'];
        // OR paymentstatus = '$payment_type';
        if($payment_type == '' &&  $form_date == 'NaN-NaN-NaN' && $to_date == 'NaN-NaN-NaN' ){
            $catproduct = mysqli_query($this->conn,"SELECT * FROM invoices  WHERE clientname = '$cliid' GROUP BY invoicenumber ");
        }elseif($cliid == '' &&  $form_date == 'NaN-NaN-NaN' && $to_date == 'NaN-NaN-NaN' ){
            $catproduct = mysqli_query($this->conn,"SELECT * FROM invoices  WHERE paymentstatus = '$payment_type' GROUP BY invoicenumber ");
        }
        elseif($cliid == '' && $payment_type == '' ){
            $catproduct = mysqli_query($this->conn,"SELECT * FROM invoices  WHERE date between '$form_date' AND '$to_date' GROUP BY invoicenumber ");
        }else if($form_date == 'NaN-NaN-NaN' && $to_date == 'NaN-NaN-NaN' ){
            $catproduct = mysqli_query($this->conn,"SELECT * FROM invoices  WHERE clientname = '$cliid' AND paymentstatus = '$payment_type' GROUP BY invoicenumber ");
        }else if($payment_type == ''){
            $catproduct = mysqli_query($this->conn,"SELECT * FROM invoices  WHERE clientname = '$cliid' AND date between '$form_date' AND '$to_date' GROUP BY invoicenumber ");

        }
            $cnt = 1; while($invoic=mysqli_fetch_assoc($catproduct)){ if($invoic['balance_payment'] !=  ''){?>

            <tr class="due<?php echo $cnt; ?>" >
                        <td class="tabletd"><?php echo $cnt;?></td>
                        <td class="tabletd"><?php $clinetname = mysqli_fetch_assoc(mysqli_query($this->conn,"SELECT * FROM tapp_clients WHERE id='".$invoic['clientname']."' "));
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
            <?php $cnt = $cnt +1; } } 
    }


    function searchquotationreports(){
         $cliid = $_POST['cliid']; echo $payment_type = $_POST['payment_type'];
         $form_date = $_POST['form_date']; $to_date = $_POST['to_date'];


         if($payment_type == '' &&  $form_date == 'NaN-NaN-NaN' && $to_date == 'NaN-NaN-NaN' ){
            $qutoation = mysqli_query($this->conn,"SELECT * FROM newquotation  WHERE clientname = '$cliid' GROUP BY invoicenumber ");
        }elseif($cliid == '' &&  $form_date == 'NaN-NaN-NaN' && $to_date == 'NaN-NaN-NaN' ){
            $qutoation = mysqli_query($this->conn,"SELECT * FROM newquotation  WHERE invoice_status = '$payment_type' GROUP BY invoicenumber ");
        }
        elseif($cliid == '' && $payment_type == '' ){
            $qutoation = mysqli_query($this->conn,"SELECT * FROM newquotation  WHERE date between '$form_date' AND '$to_date' GROUP BY invoicenumber ");
        }else if($form_date == 'NaN-NaN-NaN' && $to_date == 'NaN-NaN-NaN' ){
            $qutoation = mysqli_query($this->conn,"SELECT * FROM newquotation  WHERE clientname = '$cliid' AND invoice_status = '$payment_type' GROUP BY invoicenumber ");
        }else if($payment_type == ''){
            $qutoation = mysqli_query($this->conn,"SELECT * FROM newquotation  WHERE clientname = '$cliid' AND date between '$form_date' AND '$to_date' GROUP BY invoicenumber ");

        }

         // $qutoation=mysqli_query($this->conn,"SELECT * FROM newquotation WHERE clientname = '$cliid'  GROUP BY invoicenumber ");


            $cnt = 1; while($invoic=mysqli_fetch_assoc($qutoation)) {?>
            <tr class="due<?php echo $cnt; ?>" >
                <td class="tabletd"><?php echo $cnt;?></td>
                <td class="tabletd"><?php $clinetname = mysqli_fetch_assoc(mysqli_query($this->conn,"SELECT * FROM tapp_clients WHERE id='".$invoic['clientname']."' "));
                 echo $clinetname['client_name'];?></td>
                <td class="tabletd"><?php echo $invoic['invoicenumber'];?></td>
                <td class="tabletd"><?php echo date("d F Y", strtotime($invoic['date']));?></td>
                <td class="tabletd"><?php echo date("d F Y", strtotime($invoic['date'] . ' + 30 days'));?></td>

                <td class="tabletd"><?php echo $invoic['totaltax'].'  '.'Rs';?></td>
                <td class="tabletd"><?php echo $invoic['totalpayment'].'  '.'Rs';?></td>
                <td class="tabletd" style="font-weight: 900 !important;"> <?php echo $invoic['totalpayment'] - $invoic['balance_payment'].'  '.'Rs' ;?></td>
                <td class="tabletd"><?php if($invoic['invoice_status'] == 0 ){?> <span class="label label-info">Save</span>
                                    <?php }else if($invoic['invoice_status'] == 1 ){?>
                                        <span class="label label-success">Generate</span>
                                    <?php }?>
                </td>
                <td class="tabletd">
                  <a href="newquotation-pdf/<?php echo $invoic['invoicenumber'].'.pdf'; ?>" target="_blank" type="button" class="btn btn-primary btn-xs"  data-toggle="tooltip" data-placement="top" title="Show <?php echo $clinetname['client_name'];?> Quotation Pdf" ><i class="fa fa-file-pdf-o"></i></a>
                  <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete Quotation"><i class="fa fa-pencil-square-o"></i></button>
                </td>
            </tr>

        <?php $cnt = $cnt +1; } 
    }



    function searchsalereports(){
        $cliid = $_POST['cliid']; $invoice_number = $_POST['invoice_number'];
         $form_date = $_POST['form_date']; $to_date = $_POST['to_date'];

         if($invoice_number == '' &&  $form_date == 'NaN-NaN-NaN' && $to_date == 'NaN-NaN-NaN' ){
            $salereport = mysqli_query($this->conn,"SELECT * FROM invoices  WHERE clientname = '$cliid' ORDER BY date DESC ");
        }elseif($cliid == '' &&  $form_date == 'NaN-NaN-NaN' && $to_date == 'NaN-NaN-NaN' ){
            $salereport = mysqli_query($this->conn,"SELECT * FROM invoices  WHERE invoicenumber  = '$invoice_number' ORDER BY date DESC ");
        }elseif($cliid == '' && $invoice_number == '' ){
            $salereport = mysqli_query($this->conn,"SELECT * FROM invoices  WHERE date between '$form_date' AND '$to_date' ORDER BY date DESC ");
        }else if($form_date == 'NaN-NaN-NaN' && $to_date == 'NaN-NaN-NaN' ){
            $salereport = mysqli_query($this->conn,"SELECT * FROM invoices  WHERE clientname = '$cliid' AND invoicenumber = '$invoice_number' ORDER BY date DESC ");
        }else if($invoice_number == ''){
            $salereport = mysqli_query($this->conn,"SELECT * FROM invoices  WHERE clientname = '$cliid' AND date between '$form_date' AND '$to_date' ORDER BY date DESC ");

        }


         // $salereport=mysqli_query($this->conn,"SELECT * FROM invoices   ORDER BY date DESC ");
         $cnt = 1;while($saler=mysqli_fetch_assoc($salereport)) {?>
            <tr class="due<?php echo $cnt; ?>" >
                <td class="tabletd"><?php echo $cnt;?></td>
                <td class="tabletd"><?php echo $saler['invoicenumber'];?></td>
                <td class="tabletd"><?php $clinetname = mysqli_fetch_assoc(mysqli_query($this->conn,"SELECT * FROM tapp_clients WHERE id='".$saler['clientname']."' "));
                 echo $clinetname['client_name'];?></td>
                <td class="tabletd"><?php echo $saler['product'];;?></td>
                <td class="tabletd"><?php echo $saler['quantity'];;?></td>
                <td class="tabletd"><?php echo $saler['unit_price'].'  '.'Rs';?></td>
                <td class="tabletd"><?php echo $saler['gst'].'  '.'%';?></td>
                <td class="tabletd"><?php echo $saler['totaltax'].'  '.'Rs';?></td>
                <td class="tabletd"><?php echo $saler['value'].'  '.'Rs';?></td>
                <td class="tabletd"><?php echo date("d F Y", strtotime($saler['date']));?></td>
              </tr>
        <?php  $cnt = $cnt +1;}
    }








     function getprovalue($provalue){
        $getprovalue = mysqli_query($this->conn,"SELECT * FROM `tapp_product` WHERE category_id = '$provalue' GROUP BY product_name");

        if($getprovalue){
            return $getprovalue;
        }else{
            return false;
        }

    }

    // function getprovalue($catvalue){
    //       $productnm = mysqli_query($this->conn,"SELECT * FROM `tapp_product` WHERE  pro_id = '$catvalue' ");
    //     if($productnm){
    //         return $productnm;
    //     }else{
    //         return false;
    //     }
    // }


    function ProductAdd($pro_category_id,$pro_unit,$pro_name,$pro_hsn_code,$pro_quantity,$pro_price,$pro_descr,$tax_percentg,$tax_name,$addedby,$profit_price){
        $total_price = $profit_price +  $pro_price;

         $ProductAdd = mysqli_query($this->conn,"INSERT INTO tapp_product(category_id,product_name,product_unit,hsn_code,product_quantity,product_price,description,tax,protax_name,added_by,add_date,profit_price,achual_price) VALUES('$pro_category_id','$pro_name','$pro_unit','$pro_hsn_code','$pro_quantity','$total_price','$pro_descr','$tax_percentg' ,'$tax_name','$addedby', now(),'$profit_price','$pro_price')");
                if($ProductAdd){
                    return $ProductAdd;
                }else{
                    echo false;
                }


    }

    function Productupdate($update_id,$up_pro_category,$up_product_name,$up_hsn_code,$up_product_quantity,$up_product_unit,$up_product_price,$up_description,$update_tax_name,$up_percentg,$up_addedby,$up_profit_price){
        $up_total_price = $up_profit_price +  $up_product_price;

        $Productupdate = mysqli_query($this->conn,"UPDATE tapp_product SET category_id = '$up_pro_category',product_name = '$up_product_name',product_unit = '$up_product_unit' ,hsn_code = '$up_hsn_code' ,product_quantity = '$up_product_quantity',product_price = '$up_total_price' ,description = '$up_description' ,tax = '$up_percentg' ,protax_name = '$update_tax_name',added_by ='$up_addedby',add_date = now(),profit_price='$up_profit_price',achual_price='$up_product_price' WHERE pro_id = '$update_id' ");
                if($Productupdate){
                    return $Productupdate;
                }else{
                    echo false;
                }
    }


    function delete_proid($delete_proid){
         $delete_proid = mysqli_query($this->conn,"DELETE FROM `tapp_product` WHERE  pro_id = '$delete_proid' ");
        if($delete_proid){
            return $delete_proid;
        }else{
            return false;
        }

    }

    function getgeninvoicepro($pro_id){
        // echo 'yes';
         $current_year = date("Y");  $current_month = date("m");
     
        $getgeninvoicepro = mysqli_query($this->conn,"SELECT * FROM `tapp_product` WHERE  product_name = '$pro_id' AND YEAR(add_date) = '$current_year' AND MONTH(add_date) = '$current_month' ORDER BY add_date DESC LIMIT 1 ");
        if($getgeninvoicepro){
            return $getgeninvoicepro;
        }else{
            return false;
        }
    }

    function getgolinum($clint_id){
        $getgolinum = mysqli_query($this->conn,"SELECT folio_number FROM `tapp_clients` WHERE  id = '$clint_id' ");
        if($getgolinum){
            return $getgolinum;
        }else{
            return false;
        }
    }

    function addinvoice(){
        $clientname=$_POST['clientname'];
        $invoicenumber=$_POST['invoicenumber'];
        $totalpayment=$_POST['totalpayment'];
        $creditBalance=$_POST['CreditBalance'];
        $invoicePaidmethod=$_POST['InvoicePaidmethod'];
        $shippingpack=$_POST['shippingpack'];
        $extradiscount=$_POST['extradiscount'];
        $totaltax=$_POST['totaltax'];
        $subtotal=$_POST['subtotal'];
       $tbl_data=$_POST['tbl_data'];
       // $tbl_data=json_encode($tbl_data);    
    $tbl_data=array($tbl_data);
// print_r($tbl_data);
    $datas=array();
       foreach($tbl_data[0] as $data){
            if($data['proname']=='' or empty($data['proname'])){
                continue;
            }
     $query="INSERT INTO invoices (invoicenumber,clientname,product,description,quantity,unit_price,value,gst,tax_value,totalpayment,creditBalance,invoicePaidmethod,shippingpack,extradiscount,totaltax,subtotal,date) VALUES ('$invoicenumber','$clientname','".$data['proname']."','".$data['prodesc']."','".preg_replace('/[^A-Za-z0-9\-]/', '',$data['proquantity'])."','".preg_replace('/[^A-Za-z0-9\-]/', '',$data['proprice'])."','".preg_replace('/[^A-Za-z0-9\-]/', '',$data['prototalvalue'])."','".preg_replace('/[^A-Za-z0-9\-]/', '',$data['prodgsttax'])."','".$data['prototaltaxvalue']."','$totalpayment','$creditBalance','$invoicePaidmethod','$shippingpack','$extradiscount','$totaltax','$subtotal',now())";
        $insertinvoice = mysqli_query($this->conn,$query);

        
        $ids['invoicenumber']=mysqli_insert_id($this->conn);
        array_push($datas, $ids);

        // mysqli_query($this->conn,"UPDATE tapp_product SET purchase_quantity = '".preg_replace('/[^A-Za-z0-9\-]/', '',$data['proquantity'])."' WHERE product_name = '".$data['proname']."' ");
         $proseletc = mysqli_fetch_assoc(mysqli_query($this->conn,"SELECT *,SUM(purchase_quantity) FROM tapp_product WHERE product_name = '".$data['proname']."' GROUP  BY product_name "  ) );
        $totalpurc = $proseletc['SUM(purchase_quantity)'] + preg_replace('/[^A-Za-z0-9\-]/', '',$data['proquantity']);

          $selectpro = mysqli_query($this->conn,"SELECT * FROM tapp_product WHERE product_name = '".$data['proname']."'  ORDER BY add_date DESC LIMIT 1  "  ) ;
          $pro=mysqli_fetch_assoc($selectpro);
     
             mysqli_query($this->conn,"UPDATE tapp_product SET purchase_quantity = '$totalpurc' WHERE pro_id = '".$pro['pro_id']."' ");
}

//   foreach($tbl_data[0] as $data){
//     if($data['proname']=='' or empty($data['proname'])){
//         continue;
//     }

   
// }

$_SESSION['invoices'] = $datas;
echo 'yes ok';
    }




    function newpdfquotation(){
        $clientname=$_POST['clientname'];
        $invoicenumber=$_POST['invoicenumber'];
        $totalpayment=$_POST['totalpayment'];
        $invoivestatus = $_POST['invoivestatus'];
        $totaltax=$_POST['totaltax'];
        $subtotal=$_POST['subtotal'];
       $tbl_data=$_POST['tbl_data'];
       // $tbl_data=json_encode($tbl_data);    
    $tbl_data=array($tbl_data);
// print_r($tbl_data);
    $datas=array();
       foreach($tbl_data[0] as $data){
            if($data['proname']=='' or empty($data['proname'])){
                continue;
            }
     $query="INSERT INTO newquotation (invoicenumber,clientname,product,description,quantity,unit_price,value,gst,tax_value,totalpayment,totaltax,subtotal,date,invoice_status) VALUES ('$invoicenumber','$clientname','".$data['proname']."','".$data['prodesc']."','".preg_replace('/[^A-Za-z0-9\-]/', '',$data['proquantity'])."','".preg_replace('/[^A-Za-z0-9\-]/', '',$data['proprice'])."','".preg_replace('/[^A-Za-z0-9\-]/', '',$data['prototalvalue'])."','".preg_replace('/[^A-Za-z0-9\-]/', '',$data['prodgsttax'])."','".$data['prototaltaxvalue']."','$totalpayment','$totaltax','$subtotal',now(),'$invoivestatus')";
        $insertinvoice = mysqli_query($this->conn,$query);

        
        $ids['invoicenumber']=mysqli_insert_id($this->conn);
        array_push($datas, $ids);

        // mysqli_query($this->conn,"UPDATE tapp_product SET purchase_quantity = '".preg_replace('/[^A-Za-z0-9\-]/', '',$data['proquantity'])."' WHERE product_name = '".$data['proname']."' ");
        
         $proseletc = mysqli_fetch_assoc(mysqli_query($this->conn,"SELECT *,SUM(purchase_quantity) FROM tapp_product WHERE product_name = '".$data['proname']."' GROUP  BY product_name "  ) );
        $totalpurc = $proseletc['SUM(purchase_quantity)'] + preg_replace('/[^A-Za-z0-9\-]/', '',$data['proquantity']);

          $selectpro = mysqli_query($this->conn,"SELECT * FROM tapp_product WHERE product_name = '".$data['proname']."'  ORDER BY add_date DESC LIMIT 1  "  ) ;
          $pro=mysqli_fetch_assoc($selectpro);
     
             mysqli_query($this->conn,"UPDATE tapp_product SET purchase_quantity = '$totalpurc' WHERE pro_id = '".$pro['pro_id']."' ");
}

//   foreach($tbl_data[0] as $data){
//     if($data['proname']=='' or empty($data['proname'])){
//         continue;
//     }

   
// }

$_SESSION['newquotation'] = $datas;
echo 'yes ok';
    }










    function invoice_payment_method($payment_method,$invoice_numbaer,$payment_type,$half_payment,$totalpayment,$payment_date,$payment_notes,$balace_payment){
        


        if($payment_type == 'onehalf'){
            $paymentstatus = '2';
            // echo "UPDATE invoices SET paymentstatus = '$paymentstatus',payment_method = '$payment_method',payment_type ='$payment_type',payment_date ='$payment_date',notes = '$payment_notes'  WHERE invoicenumber = '$invoice_numbaer'";
             $balace_payment;  $half_payment; 
             $paymenttt = $balace_payment + $half_payment ;
            $change_invoice = mysqli_query($this->conn,"UPDATE invoices SET paymentstatus = '$paymentstatus',payment_method = '$payment_method',payment_type ='$payment_type',payment_date ='$payment_date',notes = '$payment_notes',balance_payment = '$paymenttt'  WHERE invoicenumber = '$invoice_numbaer' ");
        
        }else if($payment_type == 'full'){
            $paymentstatus = '1';
            $change_invoice =   mysqli_query($this->conn,"UPDATE invoices SET paymentstatus = '$paymentstatus',payment_method = '$payment_method',payment_type ='$payment_type',payment_date ='$payment_date',notes = '$payment_notes'  WHERE invoicenumber = '$invoice_numbaer' ");
        }
        else if($payment_type == 'UnPiad'){
            $paymentstatus = '0';
            $change_invoice =   mysqli_query($this->conn,"UPDATE invoices SET paymentstatus = '$paymentstatus',payment_method = '$payment_method',payment_type ='$payment_type',payment_date ='$payment_date',notes = '$payment_notes'  WHERE invoicenumber = '$invoice_numbaer' ");
        }

        if($change_invoice){
            $_SESSION['success'] = "Payment Add  Successfully";
            return true;
        }else{
            $_SESSION['error'] = "Something Wrong,Please Check";
            return false;
        }

     



      }  
        


      



    










    

}
?>