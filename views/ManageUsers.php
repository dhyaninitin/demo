<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      All Users 
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Users</li>
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
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Add_User" data-toggle="tooltip" data-placement="top" title="Add New User"><i class="fa fa-plus-circle"></i> Add New User</button>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Export Client"><i class="fa fa-download"></i> Export Data(Excel)</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-6 box-body whitee">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Mobile</th>
                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>InternetExplorer 4.0</td>
                  <td>Win 95+</td>
                 
                  <td>X</td>
                  <td>
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Update User"><i class="fa fa-pencil-square-o"></i></button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash"></i></button>
                    
                  </td>
                </tr>
               
                
                </tfoot>
              </table>
            </div>
        </div> 

                    <!-- Add Modal  -->
                <div class="modal fade" id="Add_User">
                    <div class="modal-dialog" style="width: 800px;">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add New User</h4>
                        </div>
                        <div class="modal-body">
                        <form role="form">
                            <div class=" row box-body ">
                                

                                <div class="form-group col-lg-6">
                                    <label class="fontsizunst" >User Name</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control"  placeholder="Contact Name">
                                        </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="fontsizunst"  >Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="text" class="form-control"placeholder="Phone Number" >
                                        </div>
                                    <!-- <input type="text" class="form-control"  placeholder="Phone Number"> -->
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="fontsizunst" >Password</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-key"></i>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Email Address">
                                        </div>
                                </div>

                                

                                
                                
                                
                            </div>
                           
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Client</button>
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

                




        </section>
      
      </div>
    

    </section>

  </div>


