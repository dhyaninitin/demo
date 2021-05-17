
<aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel">
        <div class="image">
          <img src="assest/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <!-- <div class=" info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div> -->
      </div>

      <ul class="sidebar-menu text-capitalize" data-widget="tree" >
        <li class="header text-center" style="color:white;"><b> <?php echo $_SESSION['name']; ?></b></li>
        <li ><a href="dashboard"><i class="fa fa-fw fa-home fafaandtext"></i> 
            <span class="fafaandtext">Dashboard</span>
          </a>
        </li>

        <li class="fafaandtext">
          <a href="Clients">
            <i class="fa fa-fw fa-users fafaandtext"></i> <span class="fafaandtext">Clients</span>
            <span class="pull-right-container">
              <?php $currentdate = date("Y-m-d");
              $numberofclient = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tapp_clients "));
               $numberofclientttt = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `tapp_clients` WHERE date(current_date_time) = '$currentdate' "));
              ?>
               <span class="label label-primary pull-right fafaandtext"><?php echo $numberofclient;?></span>
                <small class="label pull-right bg-green"><?php if(!empty($numberofclientttt)){echo 'NEW';}?></small>

            </span>
          </a>
        </li>
        <!-- <li>
          <a href="Vendors">
            <i class="fa fa-vimeo"></i>
            <span>Vendors</span>
          </a>
        </li> -->

        <li class="treeview fafaandtext ">
          <a href="#">
            <i class="fa fa-vimeo fafaandtext"></i><span class="fafaandtext">Vendors</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right fafaandtext"></i><!-- <span class="label label-primary pull-right">4</span> --></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Vendors" class="fafaandtext"><i class="fa fa-fw fa-angle-right fafaandtext"></i>Vendors</a></li>
            <li><a href="Vendors-Product" class="fafaandtext"><i class="fa fa-fw fa-angle-right fafaandtext"></i>Vendor Product  </a></li>
            <!-- <li><a href="ProductStock"><i class="fa fa-fw fa-angle-right"></i>Product Stock</a></li> -->
          </ul>
        </li>



        <li class="treeview ">
          <a href="#">
            <i class="fa fa-fw fa-briefcase fafaandtext"></i>
            <span class="fafaandtext">Product</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right fafaandtext"></i>
              <span class="label label-primary pull-right fafaandtext">4</span>
             
            </span>
            
          </a>
          <ul class="treeview-menu">
            <li><a href="AddCategory" class="fafaandtext"><i class="fa fa-fw fa-angle-right fafaandtext"></i>Add Category</a></li>
            <li><a href="AddProduct"  class="fafaandtext"><i class="fa fa-fw fa-angle-right fafaandtext"></i>Add Product  </a></li>
            <li><a href="ProductStock"  class="fafaandtext"><i class="fa fa-fw fa-angle-right fafaandtext"></i>Product Stock</a></li>
          </ul>
        </li>

         <!-- <li class="treeview ">
          <a href="#">
            <i class="fa fa-fw fa-briefcase"></i>
            <span>Product</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right">4</span>
             
            </span>
            
          </a>
          <ul class="treeview-menu">
            <li><a href="AddCategory"><i class="fa fa-fw fa-angle-right"></i>Add Category</a></li>
            <li><a href="ProductStock"><i class="fa fa-fw fa-angle-right"></i> Add Product </a></li>
            <li class=""><a href="InvoiceEntry"><i class="fa fa-fw fa-angle-right"></i> Invoice Entry</a></li>
          </ul>
        </li> -->
     
        <li class="treeview ">
          <a href="NewInvoice">
            <i class="fa fa-fw fa-briefcase fafaandtext"></i>
            <span class="fafaandtext">New Invoice</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right fafaandtext"></i>
              <span class="label label-primary pull-right fafaandtext">4</span>
             
            </span>
            
          </a>
          <ul class="treeview-menu">
            <li><a href="GenerateInvoice" class="fafaandtext"> <i class="fa fa-fw fa-angle-right fafaandtext"></i>Generate Invoice</a></li>
            <li><a href="NewQuotation" class="fafaandtext"><i class="fa fa-fw fa-angle-right fafaandtext"></i> New Quotation </a></li>
            <!-- <li class=""><a href="InvoiceEntry"><i class="fa fa-fw fa-angle-right"></i> Invoice Entry</a></li> -->
          </ul>
        </li>
        
      

       <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-inr"></i>
            <span>Payment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="ChequePayment"><i class="fa fa-fw fa-angle-right"></i> Cheque</a></li>
            <li><a href="CashPayment"><i class="fa fa-fw fa-angle-right"></i> Cash</a></li>
          </ul>
        </li> -->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-registered fafaandtext"></i> <span class="fafaandtext">Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right fafaandtext"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="InvoiceReport" class="fafaandtext"><i class="fa fa-fw fa-angle-right fafaandtext"></i> Invoice Report</a></li>
            <li><a href="Quotation-Report" class="fafaandtext"><i class="fa fa-fw fa-angle-right fafaandtext"></i> Quotation Report</a></li>
            <li><a href="ClientsReports" class="fafaandtext"><i class="fa fa-fw fa-angle-right fafaandtext"></i> Clients Reports</a></li>
            <li><a href="Sale-Reports" class="fafaandtext"><i class="fa fa-fw fa-angle-right fafaandtext"></i> Sales</a></li>
          </ul>
        </li>

        <li>
          <a href="Payment-History">
            <i class="fa fa-history fafaandtext"></i>
            <span class="fafaandtext">Payment History</span>
          </a>
        </li>
        
        <li>
          <a href="BlacklistClients">
            <i class="fa fa-fw fa-ban fafaandtext"></i>
            <span class="fafaandtext">Blacklist Clients</span>
          </a>
        </li>
        <li>
          <a href="Profile">
            <i class="fa fa-user fafaandtext"></i>
            <span class="fafaandtext">profile</span>
          </a>
        </li>

        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs fafaandtext"></i> <span class="fafaandtext"> Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right fafaandtext"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a data-toggle="modal" href="#Email" class="fafaandtext"><i class="fa fa-fw fa-angle-right fafaandtext"></i> Email</a></li>
            <li><a href="ManageUsers" class="fafaandtext"><i class="fa fa-fw fa-angle-right fafaandtext"></i>Manage User's</a></li>
            <li><a href="Taxes" class="fafaandtext"><i class="fa fa-fw fa-angle-right fafaandtext"></i> Taxes</a></li>
            <li><a href="../tables/simple"><i class="fa fa-fw fa-angle-right"></i> Company Details</a></li>


          </ul>
        </li> -->
        
      
      
      </ul>
      
    </section>
    
  </aside>