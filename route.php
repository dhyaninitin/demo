<?php
error_reporting(0);
include_once("controllers/Login.php");
// include_once("controllers/controllerUser.php");
include_once("controllers/controller.php");

session_start();
$login = new Login();
// $controllerUsr = new ControllerUser();
$controller = new Controller();

if(isset($_GET['param'])){

    if($_GET['param'] == 'check_login'){
        $login->check_login();
    }elseif($_GET['param'] =='logout'){
        $controller->logout();

    }elseif($_GET['param'] =='index'){
        $controller->index();

    }elseif($_GET['param'] =='dashboard'){
        $controller->dashboard();

    }elseif($_GET['param'] =='check_login'){
        $login->check_login();

    }elseif($_GET['param'] =='Clients'){
        $controller->Clients();

    }elseif($_GET['param'] =='Addclient'){
        $controller->Addclient();

    }elseif($_GET['param'] =='banclient'){
        $controller->banclient();

    }elseif($_GET['param'] =='Sale-Reports'){
        $controller->SaleReports();

    }elseif($_GET['param'] == 'Payment-History'){
        $controller->Payment_History();
    }
    elseif ($_GET['param'] == 'delete_clit') {
         $controller->delete_clit();
    }elseif ($_GET['param']== 'updateclient') {
        $controller->updateclient();
    }elseif($_GET['param'] == 'cliexportdata'){
        $controller->cliexportdata();
    }elseif($_GET['param'] =='Vendors'){
        $controller->Vendors();
    }elseif($_GET['param'] == 'AddVendor') {
        $controller->AddVendor();
    }elseif ($_GET['param'] == 'updateVendor') {
       $controller->updateVendor();
    }elseif($_GET['param'] == 'DelteVendor'){
        $controller->DelteVendor();
    }elseif($_GET['param'] =='ProductStock'){
        $controller->ProductStock();
    }elseif ($_GET['param'] == 'AddCategory'){
       $controller->AddCategory();
    }elseif ($_GET['param'] == 'AddProCategory') {
        $controller->AddProCategory();
    }elseif ($_GET['param'] == 'updateProCategory') {
        $controller->updateProCategory();
    }elseif ($_GET['param'] == 'delete_cat') {
        $controller->delete_cat();
    }elseif ($_GET['param'] == 'AddProduct') {
        $controller->AddProduct();
    }elseif ($_GET['param'] == 'ProductAdd') {
       $controller->ProductAdd();
    }elseif ($_GET['param'] == 'deleteprodct') {
        $controller->deleteprodct();
    }elseif ($_GET['param'] == 'Productupdate') {
        $controller->Productupdate();
    }elseif ($_GET['param'] == 'getgeninvoicepro')  {
        $controller->getgeninvoicepro();
    }elseif ($_GET['param'] == 'getgolinum') {
    	$controller->getgolinum();
    }elseif ($_GET['param'] == 'addinvoice') {
        $controller->addinvoice();
    }
    elseif ($_GET['param'] == 'genratepdf') {
        $controller->genratepdf();
    }elseif($_GET['param'] == 'Vendors-Product'){
        $controller->VendorsProduct();
    }elseif($_GET['param'] == 'invoice-payment_method'){
        $controller->invoice_payment_method();
    }elseif($_GET['param']=='newpdfquotation'){
    	 $controller->newpdfquotation();
    	// echo 'yes';
    }elseif($_GET['param'] == 'genratequotationpdf'){
    	 $controller->genratequotationpdf();
    }elseif($_GET['param'] == 'Quotation-Report'){
         $controller->Quotation_Report();
    }elseif($_GET['param'] == 'Client-allReports'){
            $controller->Client_allReports();
    }	


    elseif($_GET['param'] == 'cat-product'){
        $controller->catproduct();
    }elseif($_GET['param'] == 'search-product-stock'){
        $controller->searchproductstock();
    }elseif($_GET['param'] == 'search-invoice-reports'){
        $controller->searchinvoicereports();
    }elseif($_GET['param'] == 'search-quotation-reports'){
        $controller->searchquotationreports(); 
    }elseif($_GET['param'] == 'search-sale-reports'){
        $controller->searchsalereports();
    }elseif ($_GET['param'] == 'search-payment-reports') {
        $controller->searchpaymentreports();
    }


    








    elseif ($_GET['param'] == 'fatch_units') {
        $controller->fatch_units();
    }elseif ($_GET['param'] == 'getcatvalue') {
    	$controller->getcatvalue();
    }elseif ($_GET['param'] == 'getprovalue') {
        $controller->getprovalue();
    }

    elseif($_GET['param'] =='NewInvoice'){
        echo 'NewInvoice';
    }elseif($_GET['param'] =='GenerateInvoice'){
        $controller->GenerateInvoice();
    }elseif($_GET['param'] =='ChequePayment'){
        $controller->ChequePayment();
    }elseif($_GET['param'] =='CashPayment'){
        $controller->CashPayment();
    }elseif($_GET['param'] =='NewQuotation'){
        $controller->NewQuotation();
    }
    elseif($_GET['param'] =='InvoiceEntry'){
        $controller->InvoiceEntry();

    }elseif($_GET['param'] =='ClientsReports'){
        $controller->ClientsReports();

    }elseif($_GET['param'] =='BlacklistClients'){
        $controller->BlacklistClients();

    }
    elseif($_GET['param'] =='ManageUsers'){
        $controller->ManageUsers();

    }
    elseif($_GET['param'] =='InvoiceReport'){
        $controller->InvoiceReport();

    }


    elseif($_GET['param'] =='Taxes'){
        $controller->Taxes();

    }elseif($_GET['param'] =='Profile'){
        $controller->Profile();

    }

    
    elseif($_GET['param'] =='login'){
        $controller->login();

    }else{
        $controller->notfound();
    }


}else{
    $controller->notfound();
}


?>