<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      Invoice Entry 
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Invoice Entry</li>
      </ol>
      </h1>
    </section>

 
    <section class="content">
 
      <div class="row">
       
        <section class="col-lg-12 connectedSortable">
        <div class="box">
            <div class="box-header">
                <div calss="row" style="float:right;">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Add_invoice" data-toggle="tooltip" data-placement="top" title="Add Invoice Client"><i class="fa fa-plus-circle"></i> Add Invoice Entry</button>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Export Invoice"><i class="fa fa-download"></i> Export Data(Excel)</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-6 box-body whitee">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr >
                  <th>#</th>
                  <th>Client Name</th>
                  <th>Phone Number</th>
                  <th>Last Credit</th>
                  <th>Opening Balance</th>
                  <th>Total Balance</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>InternetExplorer 4.0</td>
                  <td>Win 95+</td>
                  <td>4</td>
                  <td>X</td>
                  <td>4</td>
                  <td>X</td>
                  <td>
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Update Invoice "><i class="fa fa-pencil-square-o"></i></button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash"></i></button>
                   
                  </td>
                </tr>
              
                
                </tfoot>
              </table>
            </div>
        </div> 

                    <!-- Add Modal  -->
                <div class="modal fade" id="Add_invoice">
                    <div class="modal-dialog" style="width: 800px;">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add New Invoice</h4>
                        </div>
                        <div class="modal-body">
                        <form role="form">
                            <div class=" row box-body ">
                                
                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Client Name</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control"  placeholder="Contact Name">
                                        </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Email Address</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Email Address">
                                        </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst"  >Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="text" class="form-control"placeholder="Phone Number" >
                                        </div>
                                    <!-- <input type="text" class="form-control"  placeholder="Phone Number"> -->
                                </div>
                                

                                <div class="form-group col-lg-12">
                                    <label class="fontsizunst" >Address</label>
                                    <textarea class="form-control" rows="2" placeholder="Enter Address" ></textarea>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Last Credited</label>
                                    <input type="text" class="form-control"placeholder="Phone Number" >
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Opening Balance</label>
                                    <input type="text" class="form-control"placeholder="Phone Number" >
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Entry Date</label>
                                    <input type="text" class="form-control"placeholder="Enter Entry Date" id="datepicker">
                                </div>
                                
                            </div>
                           
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Invoice</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

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
                                <p class="deletep">Are you sure Want to Delete this Clients &hellip;</p>
                            </div>
                            <div class="modal-footer">
                              
                                <button type="button" class="btn btn-primary"><i class="fa fa-trash"></i> Delete Clients</button>
                                <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ban_client">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-ban"></i> Delete Data</h4>
                            </div>

                            <div class="modal-body">
                                <p class="deletep">Are you sure you want to add this client to blacklist &hellip;</p>
                            </div>
                            <div class="modal-footer">
                              
                                <button type="button" class="btn btn-primary"><i class="fa fa-ban"></i> Blacklist</button>
                                <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>




        </section>
      
      </div>
    

    </section>

  </div>

  
