<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      Blacklist Clients 
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Blacklist Clients</li>
      </ol>
      </h1>
    </section>

 
    <section class="content">
 
      <div class="row">
       
        <section class="col-lg-12 connectedSortable">
        <div class="box">
           
            <div class="col-lg-12 col-xs-6 box-body whitee">
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Co. Name</th>
                  <th>Client Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>GST</th>
                  <th>Creation Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $client=mysqli_query($con,"SELECT * FROM tapp_clients WHERE black_list ='1'");
                    $cnt = 1;
                         while($clients=mysqli_fetch_assoc($client)) {?>
                            <tr>
                              <td><?php echo  $cnt;?></td>
                              <td><?php echo $clients['company_name'];?></td>
                              <td><?php echo $clients['client_name'];?></td>
                               <td><?php echo $clients['phone_number'];?></td>
                               <td><?php echo $clients['email_address'];?></td>
                              <td><?php echo $clients['gst_number'];?></td>
                               <td><?php echo $newDate = date("d F Y", strtotime($clients['current_date_time'])); ?></td>
                              <td>

                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ban_client" data-toggle="tooltip" data-placement="top" title="Remove to Black List" onclick="blacklistclient('<?php echo $clients['id']?>','0')"><i class="fa fa-undo"></i></button>
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deletclient('<?php echo $clients['id']?>')" ><i class="fa fa-trash"></i></button>
                              </td>
                            </tr>
                    <?php $cnt = $cnt+1; } ?>
                </tbody>
              </table>
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
                            <form role="form" action="delete_clit" method="POST">
                                <div class="modal-body">
                                    <p class="deletep">Are you sure Want to Delete this Clients &hellip;</p>
                                    <input type="hidden" name="delte_iddd" id="delte_id">
                                </div>
                                <input type="hidden" name="page_name" value="BlacklistClients">

                                <div class="modal-footer">
                                  
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-trash"></i> Delete Clients</button>
                                    <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                 <div class="modal fade" id="ban_client">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" action="banclient" method="POST">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><i class="fa fa-ban"></i> Blacklist Data</h4>
                            </div>

                            <div class="modal-body">
                                <p class="deletep">Are you sure you want to add this client to blacklist &hellip;</p>
                                <input type="hidden" name="ban_iddd" id="black_id">
                                <input type="hidden" name="page_name" value="BlacklistClients">
                                <input type="hidden" name="balacklistvalue" id="balacklistvalue">
                            </div>
                            <div class="modal-footer">
                              
                                <button type="submit" class="btn btn-primary"><i class="fa fa-ban"></i> Blacklist</button>
                                <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

               




        </section>
      
      </div>
    

    </section>

  </div>
<script type="text/javascript">
  function deletclient(value){
        $('#delte_id').val(value);
        // alert(value);
    }
     function blacklistclient(value,val){
        $('#black_id').val(value);
        $('#balacklistvalue').val(val);
        // alert(value);
    }
</script>
