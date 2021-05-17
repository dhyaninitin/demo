<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      Cash Payment 
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Cash Payment</li>
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
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Add_CashPayment" data-toggle="tooltip" data-placement="top" title="Add New Cash Payment"><i class="fa fa-plus-circle"></i> Add Payment</button>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-6 box-body whitee">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Client Name</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>#</td>
                  <td>InternetExplorer 4.0</td>
                  <td>Win 95+</td>
                  <td>4</td>
                 
                  <td>
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Update"><i class="fa fa-pencil-square-o"></i></button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
               
                
                </tfoot>
              </table>
            </div>
        </div> 

                    <!-- Add Modal  -->
                <div class="modal fade" id="Add_CashPayment">
                    <div class="modal-dialog" style="width: 800px;">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add New Cash Payment</h4>
                        </div>
                        <div class="modal-body">
                        <form role="form">
                            <div class=" row box-body ">
            
                                <div class="form-group col-lg-6">
                                    <label class="fontsizunst" >Client</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user-circle-o"></i>
                                            </div>
                                            <select class="form-control select2" style="width: 100%;">
                                                <option selected="selected">Alabama</option>
                                                <option>Alaska</option>
                                                <option>California</option>
                                                <option>Delaware</option>
                                                <option>Tennessee</option>
                                                <option>Texas</option>
                                                <option>Washington</option>
                                            </select>
                                            
                                        </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="fontsizunst">Amount</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-inr"></i>
                                            </div>
                                            <input type="text" class="form-control"placeholder="Enter Amount" >
                                        </div>
                                </div>
                                
                                <div class="form-group col-lg-6">
                                    <label class="fontsizunst">Payment Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Payment Date" id="datepicker" >
                                        </div>
                                </div>
  
                            </div>
                           
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Cash Payment</button>
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

 
