<?php
ob_start ();
session_start();
include_once("models/Admin_model.php");

class Controller
{
    public $model;

    public function __construct(){  
//        constructor....
        $this->model = new Admin_Model();
        
    } 
    public function index()
    {
//        login_page first page....
         // session_destroy();
        include 'views/login.php';
        // echo 'yes i am';
    }
    public function login()
    {
        $_SESSION['success'] = "Logout Successfully";
        header('location:index');
        session_destroy();
    }


    
     function logout(){
        $_SESSION['success'] = "Logout Successfully";
        header('location:index');
        session_destroy();
        ob_flush();
        
    }


    function dashboard(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/dashboard.php';
        include 'layouts/footer.php';
    }

    function Clients(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/Clients.php';
        include 'layouts/footer.php';
    }


    function Payment_History(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/Payment_History.php';
        include 'layouts/footer.php';
    }
    function SaleReports(){
         include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/Sales-Reports.php';
        include 'layouts/footer.php';
    }

    function AddCategory(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/AddCategory.php';
        include 'layouts/footer.php';
    }

    function VendorsProduct(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/VendorsProduct.php';
        include 'layouts/footer.php';
    }

    function Addclient(){
        $company_name =$_POST['company_name']; $client_name =$_POST['client_name']; $phone_number = $_POST['phone_number']; $emial_address = $_POST['emial_address'];
        $gst_number = $_POST['gst_number']; $country = $_POST['country'];  $State = $_POST['State']; $city= $_POST['city'];

        $shipping_country = $_POST['shipping_country']; $sjipping_state = $_POST['sjipping_state']; $shipping_city = $_POST['shipping_city']; 
        $sipping_zip_code = $_POST['sipping_zip_code']; $shipping_address = $_POST['shipping_address']; $lst_cst_number = $_POST['lst_cst_number'];

        $page_name = $_POST['page_name'];

         $Addclient = $this->model->Addclient($company_name,$client_name,$phone_number,$emial_address,$gst_number,$country,$State,$city,$shipping_country,$sjipping_state,$shipping_city,$sipping_zip_code,$shipping_address,$lst_cst_number);
         if($Addclient == false){
             $_SESSION['warning'] = "Something Wrong,Please Check";
            
         }elseif($Addclient == 'duplicate'){
              $_SESSION['error'] = "This Client Already Exists";

         }elseif($Addclient == 'ok'){
            $_SESSION['success'] = "Client Add Successfully";
            
         }
         header('location:'.$page_name);

 
    }

    function banclient(){
         $ban_id = $_POST['ban_iddd'];
           $page_name = $_POST['page_name'];
           $page_name = $_POST['page_name'];
           $balacklistvalue = $_POST['balacklistvalue'];
        $banidd = $this->model->banclient($ban_id,$balacklistvalue);
        if($banidd){
            $_SESSION['success'] = "Client Add To BlackListe";
        }else{
            $_SESSION['error'] = "Something Wrong,Please Check";
        }
         header('location:'.$page_name);

    }

    function delete_clit(){
         $dlt_id = $_POST['delte_iddd'];
           $page_name = $_POST['page_name'];
         $delete_clit =$this->model->deleteclit($dlt_id);
         if($delete_clit){
            $_SESSION['success'] = "Client Delete Successfully";
        }else{
            $_SESSION['error'] = "Something Wrong,Please Check";
        }
         header('location:'.$page_name);
    }

    function updateclient(){
         $update_id = $_POST['update_id'];
            $updet_copm_name = $_POST['updet_copm_name'];
            $updet_clint_nam = $_POST['updet_clint_nam'];
            $updet_mobile_num = $_POST['updet_mobile_num'];
            $updet_emial_addrs = $_POST['updet_emial_addrs'];
            $updet_gst_num =$_POST['updet_gst_num'];
            $updet_contry = $_POST['updet_contry'];
            $updet_state = $_POST['updet_state'];
            $updet_city = $_POST['updet_city'];
            $updet_ship_contry = $_POST['updet_ship_contry'];
            $updet_ship_state= $_POST['updet_ship_state'];
            $updet_ship_city =$_POST['updet_ship_city'];
            $updet_sip_z_code = $_POST['updet_sip_z_code'];
            $updet_sip_ddress = $_POST['updet_sip_ddress'];

            $updateclient = $this->model->updateclient($update_id,$updet_copm_name,$updet_clint_nam,$updet_mobile_num,$updet_emial_addrs,$updet_gst_num,$updet_contry,$updet_state,$updet_city,$updet_ship_contry,$updet_ship_state,$updet_ship_city,$updet_sip_z_code,$updet_sip_ddress);
            if($updateclient){
                $_SESSION['success'] = "Client Update Successfully";
            }else{
                $_SESSION['error'] = "Something Wrong,Please Check";
            }
            header('location:Clients');
    }

    function cliexportdata(){
        $filename = date('Y-m-d')."-'clients'.csv";
        $cliexportdata =$this->model->cliexportdata($filename);
    }



    function Vendors(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/Vendors.php';
        include 'layouts/footer.php';
    }

    function AddVendor(){
        $vendor_name = $_POST['vendor_name'];
        $vendor_email = $_POST['vendor_email'];
        $vendor_phone = $_POST['vendor_phone'];
        $vendor_brand_name = $_POST['vendor_brand_name'];
        $vendor_brand = $_POST['vendor_brand'];
        $vondor_company_name = $_POST['vondor_company_name'];
        $vendor_address = $_POST['vendor_address'];
        $vendor_des = $_POST['vendor_des'];

        $AddVendor = $this->model->AddVendor($vendor_name,$vendor_email,$vendor_phone,$vendor_brand_name,$vendor_brand,$vondor_company_name,$vendor_address,$vendor_des);

            if($AddVendor == 'ok'){
                $_SESSION['success'] = "Vendor Add Successfully";
             }elseif($AddVendor == 'duplicate'){
                  $_SESSION['error'] = "This Vendor Already Exists";
             }elseif($AddVendor == false){
                $_SESSION['warning'] = "Something Wrong,Please Check";
             }
             header('location:Vendors');

    }
    function updateVendor(){
        $update_id = $_POST['update_id'];
        $update_vendor_name = $_POST['update_vendor_name'];
        $update_vendor_email = $_POST['update_vendor_email'];
        $update_vendor_phone = $_POST['update_vendor_phone'];
        $update_vendor_brand_name = $_POST['update_vendor_brand_name'];
        $update_vendor_brand =$_POST['update_vendor_brand'];
        $update_vondor_company_name = $_POST['update_vondor_company_name'];
        $update_vendor_address = $_POST['update_vendor_address'];
        $update_vendor_des = $_POST['update_vendor_des'];

         $updateVendor = $this->model->updateVendor($update_id,$update_vendor_name,$update_vendor_email,$update_vendor_phone,$update_vendor_brand_name,$update_vendor_brand,$update_vondor_company_name,$update_vendor_address,$update_vendor_des);

            if($updateVendor){
                $_SESSION['success'] = "Vendor Update Successfully";
             }else{
                $_SESSION['warning'] = "Something Wrong,Please Check";
             }
             header('location:Vendors');
    }

    function DelteVendor(){
         $delete_id = $_POST['delete_id'];
        $DelteVendor =$this->model->DelteVendor($delete_id);
         if($DelteVendor){
            $_SESSION['success'] = "Vendor Delete Successfully";
        }else{
            $_SESSION['error'] = "Something Wrong,Please Check";
        }
         header('location:Vendors');
    }

    // Product  Fuction Start

    function AddProCategory(){
        $category_name = $_POST['category_name'];
        $tax_name = $_POST['tax_name'];
        $tax_persentage = $_POST['tax_persentage'];
        $product_des = $_POST['product_des'];

        $AddProCategory = $this->model->AddProCategory($category_name,$tax_name,$tax_persentage,$product_des);

            if($AddProCategory){
                $_SESSION['success'] = "Category Add Successfully";
             }else{
                $_SESSION['warning'] = "Something Wrong,Please Check";
             }
             header('location:AddCategory');

    }

    function updateProCategory(){
        $cat_update_id = $_POST['update_id'];
        $up_categoryname = $_POST['up_categoryname'];
        $up_tax_name = $_POST['up_tax_name'];
        $up_tax_persentg = $_POST['up_tax_persentg'];
        $up_productdes = $_POST['up_productdes'];
        
        $updateProCategory = $this->model->updateProCategory($cat_update_id,$up_categoryname,$up_tax_name,$up_tax_persentg,$up_productdes);
          if($updateProCategory){
                $_SESSION['success'] = "Category Update Successfully";
             }else{
                $_SESSION['warning'] = "Something Wrong,Please Check";
             }
             header('location:AddCategory');

    }
    function delete_cat(){
     $catdelete_id = $_POST['catdelete_id'];
     $delete_cat =$this->model->delete_cat($catdelete_id);

        if($delete_cat){
            $_SESSION['success'] = "Category Delete Successfully";
        }else{
            $_SESSION['error'] = "Something Wrong,Please Check";
        }
         header('location:AddCategory');
    }



    function AddProduct(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/AddProduct.php';
        include 'layouts/footer.php';
    }

    function ProductAdd(){
        $pro_category_id = $_POST['pro_category'];
        $pro_unit = $_POST['pro_unit'];
        $tax_name = $_POST['tax_name'];
        $pro_name = $_POST['pro_name'];
        $pro_hsn_code = $_POST['pro_hsn_code'];
        $pro_quantity = $_POST['pro_quantity'];
        $pro_price = $_POST['pro_price'];
        $pro_descr = $_POST['pro_descr'];
        $tax_percentg = $_POST['tax_percentg'];
        $page_name = $_POST['page_name'];
        $added_by = $_POST['added_by']; 
        $profit_price = $_POST['profit_price'];
        if($added_by == 'SELF'){
            $addedby = 'SELF';
        }else{
             $addedby = $_POST['vendorname'];
        }
       

        $ProductAdd =$this->model->ProductAdd($pro_category_id,$pro_unit,$pro_name,$pro_hsn_code,$pro_quantity,$pro_price,$pro_descr,$tax_percentg,$tax_name,$addedby,$profit_price);
            if($ProductAdd){
                $_SESSION['success'] = " Product Add Successfully";
            }else{
                $_SESSION['error'] = "Something Wrong,Please Check";
            }
             header('location:'.$page_name);

    }


    function Productupdate(){
        $update_id = $_POST['update_id'];
        $up_pro_category = $_POST['up_pro_category'];
        $up_product_name = $_POST['up_product_name'];
        $up_hsn_code = $_POST['up_hsn_code'];
        $up_product_quantity = $_POST['up_product_quantity'];
        $up_product_unit = $_POST['up_product_unit'];
        $up_product_price = $_POST['up_product_price'];
        $up_description = $_POST['up_description'];
        $update_tax_name = $_POST['update_tax_name'];
        $up_addedby = $_POST['up_addedby'];
        $up_profit_price = $_POST['up_profit_price'];
        if($up_addedby == 'SELF'){
            $up_addedby = 'SELF';
        }else{
             $up_addedby = $_POST['upvendorname'];
        }


        // $up_inpercentg = $_POST['up_percentg'];
        // $up_expercentg = $_POST['up_expercentg'];
        if($update_tax_name == 'InclusiveTax'){
            $up_percentg = $_POST['update_inclusivtax'];
        }elseif($update_tax_name == 'ExclusiveTax'){
            $up_percentg = $_POST['up_ExclusiveTax'];
        }

        $Productupdate =$this->model->Productupdate($update_id,$up_pro_category,$up_product_name,$up_hsn_code,$up_product_quantity,$up_product_unit,$up_product_price,$up_description,$update_tax_name,$up_percentg,$up_addedby,$up_profit_price);

        if($Productupdate){
                $_SESSION['success'] = " Product Update Successfully";
            }else{
                $_SESSION['error'] = "Something Wrong,Please Check";
            }
             header('location:AddProduct');





    }

    function deleteprodct(){
        $delete_proid = $_POST['delete_proid'];
        $delete_proid =$this->model->delete_proid($delete_proid);

        if($delete_proid){
            $_SESSION['success'] = "Product Delete Successfully";
        }else{
            $_SESSION['error'] = "Something Wrong,Please Check";
        }
         header('location:AddProduct');

    }






    function fatch_units(){
        $units = $_POST['units'];
        if($units == 'units'){
            $fatch_units = $this->model->fatch_units($units);
                $units=[];
                $cr=0;
                    while($pro=mysqli_fetch_assoc($fatch_units)){
                        $units[$cr]['units'] = $pro['units_name'];
                        $cr++;
                    }
                echo json_encode($units); 
        }else{

        }
       
    }

    function getgolinum(){
        $clint_id = $_POST['clint_id'];
        $getgolinum = $this->model->getgolinum($clint_id);
         echo json_encode(mysqli_fetch_object($getgolinum));
        

    }

    function getcatvalue(){
         $catvalue = $_POST['catvalue'];
         $getcatvalue = $this->model->getcatvalue($catvalue);
        echo json_encode(mysqli_fetch_assoc($getcatvalue));
    }


    function catproduct(){
        $catproduct = $this->model->catproduct();
        $proooo=[];
        $crr=0;
            while($proo=mysqli_fetch_assoc($catproduct)){
                $proooo[$crr]['pro_id'] = $proo['pro_id'];
                $proooo[$crr]['product_name'] = $proo['product_name'];
                $crr++;
            }
        echo json_encode($proooo);
    }



    function searchproductstock(){
        $searchproductstock = $this->model->searchproductstock();        
    }

    function searchinvoicereports(){
        $this->model->searchinvoicereports();
    }

    function searchquotationreports(){
        $this->model->searchquotationreports();
    }

    function searchsalereports(){
        $this->model->searchsalereports();
    }

     function searchpaymentreports(){
        $this->model->searchpaymentreports();
    }
    

    function getprovalue(){
          $provalue = $_POST['catidd'];
         $getprovalue = $this->model->getprovalue($provalue);
        // echo json_encode(mysqli_fetch_($getprovalue));
         $response=array();
         while($row=mysqli_fetch_array($getprovalue)){
            array_push($response, $row);
         }
         echo json_encode($response);
    }

    

    function getgeninvoicepro(){
         $pro_id = $_POST['pro_id'];
         $getgeninvoicepro = $this->model->getgeninvoicepro($pro_id);
         echo json_encode(mysqli_fetch_array($getgeninvoicepro));
    }

    function invoice_payment_method(){
        $payment_method = $_POST['payment_method'];
        $invoice_numbaer = $_POST['invoice_numbaer'];
        $payment_type = $_POST['payment_type'];
        $half_payment = $_POST['half_payment'];
        $totalpayment = $_POST['totalpayment'];
        $payment_date = $_POST['payment_date'];
        $payment_notes = $_POST['payment_notes'];
        $balace_payment = $_POST['balace_payment'];
       $invoice_payment_method = $this->model->invoice_payment_method($payment_method,$invoice_numbaer,$payment_type,$half_payment,$totalpayment,$payment_date,$payment_notes,$balace_payment);

        // if($invoice_payment_method == true){
        //     $_SESSION['success'] = "Payment Add  Successfully";
        // }else{
        //     $_SESSION['error'] = "Something Wrong,Please Check";
        // }
         header('location:InvoiceReport');
    }

    function addinvoice(){

         $addinvoice = $this->model->addinvoice();

    }

    function newpdfquotation(){
        $newpdfquotation = $this->model->newpdfquotation();
    }


    function genratepdf(){
         include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/genratepdf.php';
        include 'layouts/footer.php';
    }


    function genratequotationpdf(){
         include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/genratequotationpdf.php';
        include 'layouts/footer.php';
    }





    function ProductStock(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/ProductStock.php';
        include 'layouts/footer.php';
    }

    function ChequePayment(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/ChequePayment.php';
        include 'layouts/footer.php';
    }

    function CashPayment(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/CashPayment.php';
        include 'layouts/footer.php';
    }

    function GenerateInvoice(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/GenerateInvoice.php';
        include 'layouts/footer.php';
    }

    function NewQuotation(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/NewQuotation.php';
        include 'layouts/footer.php';
    }

    function InvoiceEntry(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/InvoiceEntry.php';
        include 'layouts/footer.php';
    }
    function InvoiceReport(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/InvoiceReport.php';
        include 'layouts/footer.php';
    }
    function ClientsReports(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/ClientsReports.php';
        include 'layouts/footer.php';
    }
    function BlacklistClients(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/BlacklistClients.php';
        include 'layouts/footer.php';
    }
    function ManageUsers(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/ManageUsers.php';
        include 'layouts/footer.php';
    }
    function Taxes(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/Taxes.php';
        include 'layouts/footer.php';
    }
    function Profile(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/Profile.php';
        include 'layouts/footer.php';
    }
     function notfound(){
        include 'views/404.php';
     }

     function Quotation_Report(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/Quotation-Report.php';
        include 'layouts/footer.php';
     }

     function Client_allReports(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/Client-allReports.php';
        include 'layouts/footer.php';
     }











}
    ?>