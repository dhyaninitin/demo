<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      Cheque Payment 
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Cheque Payment</li>
      </ol>
      </h1>
    </section>

 
    <section class="content">
 
      <div class="row">

        <section class="col-lg-12 connectedSortable">
        <div class="box">
        <div class="box-header cheqpymt">
                    <form>
                        <div class="col-lg-3">
                            <label class="fontsizunst" >Cheque No</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-list-alt"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter The Cheque No">
                                </div>
                        </div>
                        <div class="col-lg-2">
                            <label class="fontsizunst" >Date From</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="From Date" id="datepicker1">
                                </div>
                        </div>
                        <div class="col-lg-2">
                            <label class="fontsizunst" >Date To</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="To Date" id="datepicker2">
                                </div>
                        </div>
                        <div class="col-lg-2">
                            <label class="fontsizunst" >Min Amount</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-inr"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Min Amount" >
                                </div>
                        </div>
                        <div class="col-lg-2">
                            <label class="fontsizunst" >Max Amount</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-inr"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Max Amount">
                                </div>
                        </div>

                        <div class="col-lg-1">
                            <button type="button" class="btn btn-primary btn-sm productsrcbtn " data-toggle="tooltip" data-placement="top" title="Search Cheque"><i class="fa fa-search-plus"></i> Search</button>
                        </div>
                    </form>
            </div>



            <div class="box-header">
                <div calss="row" style="float:right;">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Add_Cheque" data-toggle="tooltip" data-placement="top" title="Add New Cheque"><i class="fa fa-plus-circle"></i> Add Cheque</button>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-6 box-body whitee">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Client Name</th>
                  <th>Cheque Number</th>
                  <th>Bank Name</th>
                  <th>Amount</th>
                  <th>Issue Date</th>
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
                <div class="modal fade" id="Add_Cheque">
                    <div class="modal-dialog" style="width: 800px;">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add New Cheque Payment</h4>
                        </div>
                        <div class="modal-body">
                        <form role="form">
                            <div class=" row box-body ">

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Client</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user-o"></i>
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
                                
                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Cheque Number</label>
                                    <input type="text" class="form-control" placeholder="Enter the Brand Name">
                                </div>

                                

                                
                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Bank</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user-o"></i>
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
                            </div>
                            <div class=" row box-body ">

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Amount</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-inr"></i>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter the Brand Name">
                                        </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="fontsizunst" >Issue Date</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter the Brand Name" id="datepicker">
                                        </div>
                                </div>

                                
                            </div>
                           
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Cheque Details</button>
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

 
