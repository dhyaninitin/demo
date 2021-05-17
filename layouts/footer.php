<div class="modal fade" id="Email">
                    <div class="modal-dialog" style="width: 800px;">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-envelope"></i> Email Configuration</h4>
                        </div>
                        <div class="modal-body">
                        <form role="form">
                            <div class=" row box-body ">

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
                                <label class="fontsizunst" >Password</label>
                                <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <label class="fontsizunst" >SMTP Server Address</label>
                                <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-server"></i>
                                        </div>
                                        <input type="text" class="form-control" placeholder="SMTP Server">
                                    </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <label class="fontsizunst" >Port</label>
                                <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-podcast"></i>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Port">
                                    </div>
                            </div>

                            <div class="form-group col-lg-6">
                                    <div class="checkbox" style="margin-top: 29px;">
                                        <label><input type="checkbox" value="chekd">TLS</label>
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

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <div class="tab-content">
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
      </div>
  </aside>
  
  <div class="control-sidebar-bg"></div>
</div>

<script src="assest/bower_components/jquery/dist/jquery.min.js"></script>

<script src="assest/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="assest/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="assest/bower_components/fastclick/lib/fastclick.js"></script>

<script src="assest/dist/js/adminlte.min.js"></script>
<script src="assest/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assest/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="assest/dist/js/demo.js"></script>
<script src="assest/bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="assest/plugins/input-mask/jquery.inputmask.js"></script>
<script src="assest/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="assest/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script src="assest/bower_components/moment/min/moment.min.js"></script>
<script src="assest/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assest/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="assest/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script src="assest/plugins/iCheck/icheck.min.js"></script>
<script src="assest/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

<script type="text/javascript">
   $(document).ready(function() {
      var url = window.location.href;
      if(url == 'http://182.73.7.59/soft-bill/Client-allReports&Client=<?php echo $_GET['Client'];?>'){
        $(function () {
          $('#example1').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : false,
          'autoWidth'   : false
          })
          $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : false,
          'autoWidth'   : false
          })
        })
      }else{
        $(function () {
          $('#example1').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false

          }

            )
          $('#example2').DataTable({
         'paging'      : true,
          'lengthChange': false,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
          })
        })
      }
     

   });
</script>


<script>
  

  $( document ).ready(function() {
    $.ajax({
        url:"fatch_units",
        type:"POST",
        data: {units:'units'}, 
        success:function(status){
          console.log(typeof status);
          let unitsss  = JSON.parse(status);
          var all_units = '';
          all_units += '<option value ="" > Units </option>';
          unitsss.forEach(function (unitssss){
          all_units += '<option value ="'+unitssss.units +'" >'+ unitssss.units + '</option>'; 
          });
          $('.all-units').html(all_units);
            
            // console.log(product_name);
        }
    });


  });



 
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
    $('#datepicker1').datepicker({
      autoclose: true
    })
    $('#datepicker2').datepicker({
      autoclose: true
    })
    $('#datepicker3').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
