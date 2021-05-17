
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      Generate New Invoice 
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Generate New Invoice</li>
      </ol>
      </h1>
    </section>

 
    <section class="content">
 
      <div class="row">
        <section class="col-lg-12 connectedSortable">
        <div class="box">
            <div class="col-lg-12 text-center"><h3>Generate New Invoice</h3></div>
            <div class="box-header ">
                <form id="GenerateInvoice" method="POST">
                    <div class=" row box-body ">
                        <div class="col-lg-4">
                            <label class="fontsizunst" >Client</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user-o"></i>
                                    </div>
                                    <select class="form-control select2" name="client_name" style="width: 100%;" id="clicent_name" onchange="get_folinum(this.value)">
                                       <option value="">Select Client</option>
                                         <?php $clint=mysqli_query($con,"SELECT * FROM tapp_clients ;");
                                                     while($client=mysqli_fetch_assoc($clint)) {?>
                                                <option value="<?php echo $client['id'];?>"><?php echo $client['client_name'];?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                        </div>

                        <div class="col-lg-2">
                            <label class="fontsizunst" >Invoice Number</label>
                            <input type="text" class="form-control" name="invoice_num" placeholder="Invoice Number" id="ponumber" disabled>    
                        </div>

                        <div class="col-lg-3">
                            <label class="fontsizunst" >Issue Date</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control current_date" name="issu_date" placeholder="Issue Date" id="datepicker2">
                                </div>
                        </div>

                        <div class="col-lg-2">
                            <label class="fontsizunst">Folio Number</label>
                            <input type="text" class="form-control" id="folinumber" name="folinumber" placeholder="Folio Number" >
                        </div>
                        <div class="col-lg-1 loaderdiv" id="loder" style="display: none">
                            <img src="ZKZx.gif" class="loadercss">
                        </div>

                    </div>

                    
                        <div class="col-lg-12">
                                Or: <a type="button" data-toggle="modal" href="#Add_client " data-toggle="tooltip" data-placement="top" title="Add New Client">  Add New Client</a>
                        </div>
                        <hr class="hrline">
                    

                    <div class="row box-body">
                        <div class="col-lg-4 product_name">
                            <label class="fontsizunst" >Product/Services</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-product-hunt"></i>
                                    </div>
                                    <select class="form-control select2 pro_input" name="product_id" style="width: 62%;" onchange="fatch_prodc(this.value)">
                                         <option value="">Select Product</option>
                                         <?php $pro=mysqli_query($con,"SELECT * FROM tapp_product GROUP BY product_name  ;");
                                                     while($prod=mysqli_fetch_assoc($pro)) {?>
                                                <option value="<?php echo $prod['product_name'];?>"><?php echo $prod['product_name'];?></option>
                                            <?php } ?>
                                    </select>
                                    <select class="form-control all-units genunittss" id="pro_unit" name="pro_unit" required="">
                                    </select>
                                </div>
                        </div>
                        <input type="hidden" name="product_name" id="product_name">
                    
                        <div class="col-lg-2">
                            <label class="fontsizunst" >Description</label>
                            <input type="text" class="form-control" id="pro_description" name="prod_desc" placeholder="Product Description">    
                        </div>

                        <div class="col-lg-2">
                            <label class="fontsizunst">Qty</label>
                            <input type="number" class="form-control" placeholder="Enter Quantity" min="0" id="pro_quantity" name="pro_quantity" >
                        </div>

                        <div class="col-lg-2">
                            <label class="fontsizunst" >Unit Price</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-inr"></i>
                                </div>
                                <input type="text" class="form-control" id="pro_product_price" name="product_price" placeholder="Unit Price" readonly="" >
                            </div>
                        </div>

                        <div class="col-lg-1">
                            <label class="fontsizunst" >Taxes</label>
                            <input type="text" name="pro_tax" class="form-control" id="pro_tax" readonly="" placeholder=" Show Taxes">
                            <!-- <select class="form-control" id="pro_tax" style="width: 100%;" name="pro_tax" disabled="">
                                <option value="">SELECT TAX </option>
                                <?php $cat=mysqli_query($con,"SELECT * FROM tapp_pro_category GROUP BY tax_percentage ORDER BY id  ASC ;");
                                    while($cate=mysqli_fetch_assoc($cat)) {?>
                                    <option value="<?php echo $cate['tax_percentage'];?>"><?php echo $cate['tax_percentage'] . ' %';?></option>
                                <?php } ?>
                            </select> -->
                        </div>
                         <div class="col-lg-1 loaderdiv" id="loder1" style="display: none">
                            <img src="ZKZx.gif" class="loadercss">
                        </div>
                    </div>

                    
                  
                        <div class="col-lg-12">
                                Or: <a type="button" data-toggle="modal" href="#Add_product" data-toggle="tooltip" data-placement="top" title="Add New Product" class="normaltext">  Add New Product</a>
                        </div>
                    

                    <div class=" row box-body">
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-primary btn-sm pull-right" id="add-product" data-toggle="tooltip" data-placement="top" title="Add Product"><i class="fa fa-plus-circle"></i>  Add Product</button>
                        </div>
                       
                    </div>


                </form>
                <!-- <hr class="hrline"> -->
            </div>

          

            <div class="col-lg-12 col-xs-6 box-body whitee">
              <table class="table table-bordered table-striped" >
                <thead>
                <tr >
                  <th class="tableth">Product/Services</th>
                  <th class="tableth">Description</th>
                  <th class="tableth">Quantity</th>
                  <th class="tableth">Unit Price</th>
                  <th class="tableth">Value</th>
                  <th class="tableth">GST</th>
                  <th class="tableth">Tax Value</th>
                  <th class="tableth">Remove</th>
                </tr>
                </thead>
                <tbody id="show_product">
                <tr class="odd">
                	<td valign="top" colspan="7" class="dataTables_empty" style="font-size: 17px;font-weight: bold;text-align: center">No Data Available </td>
                </tr>
                
                
                </tfoot>
              </table>
              

                    <div class="priceshow row" style="display: none;">
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="totaldicount" id="totaldicount"  onclick="TSM(this.value)">Total Discount:</label>
                                    </div>
                                    <div class="form-group total-discount col-lg-12" style="display: none;">
										<div class="input-group">
												<input type="number" id="totldiscunt" class="form-control col-lg-6" placeholder="Total Discount">
												<div class="input-group-addon"> % </i>
												</div>
										</div>
	                                    <!-- <div class="row">
	                                        <div class="col-lg-10"><input type="text" id="totldiscunt" class="form-control col-lg-6" placeholder="Total Discount"> </div>
	                                        <div class="col-lg-2 SSpersentg">%</div>
	                                       
	                                    </div> -->
                                	</div>
                                </div>
                                
                                <div class="form-group col-lg-6">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="shipping_pacaging" id="shipping_pacaging" onclick="TSM(this.value)">Shiping and pakaging Cost:</label>
                                    </div>
                                    <div class="form-group col-lg-12 shippingandpakaging"  style="display: none;">
                                    	<input type="number" class="form-control col-lg-6" id="shopingpakaging" placeholder="Shiping and pakaging Cost">
                                	</div>
                                </div>
                            
                            </div>
                           <!--  <div class="row">
                                
                                
                            </div> -->
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="mark_invoice"  id="mark_invoice"   onclick="TSM(this.value)" >Mark Invoice Paid:</label>
                                    </div>
                                </div>

                                <div class="form-group Invoicepaid col-lg-8" style="display: none;">
                                        <select class=" inline form-control " id="InvoicePaid" style="width: 100px">
                                            <option value="" >Select</option>
                                            <option value="cash">Cash</option>
                                            <option value="cheque">Cheque</option>
                                            <option value="banktransfer">Bank Transfer</option>
                                        </select>
                                        <input type="number" class=" inline form-control" id="cedit_blnce" placeholder="Credit " style="width: 100px">
                                        <input type="number" class=" inline form-control total-debit-amount "  placeholder="Balance " style="width: 100px">
                                    
                                    
                                </div>
                            </div>

                        </div>
                    <div class="col-lg-5">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th class="pricetabletg1 titleptice">Sub-total:</th>
                                    <td class="pricestatic" ><span class="Sub-total"></span> &nbsp;&nbsp;<i class="fa fa-inr"></i></td>

                                     <th class="pricetabletg1 titleptice" >Total<br>Tax:</th>
                                    <td class="pricestatic"><span class="Total-Tax"></span> &nbsp;&nbsp;<i class="fa fa-inr"></i></td>
                                </tr>
    
                                <tr>
                                    <th class="Extra-Discount12 titleptice" style="display: none;">Extra<br>Discount:</th>
                                    <td class="pricestatic Extra-Discount12" style="display: none;"> <span class=" Extra-Discount"></span>&nbsp;&nbsp;<i class="fa fa-inr"></i></td>

                                    <th class=" Shiping-Packaging12 titleptice" style="display: none;">Shiping and <br> Packaging:</th>
                                    <td class=" pricestatic Shiping-Packaging12" style="display: none;"><span class="Shiping-Packaging"></span>&nbsp;&nbsp;<i class="fa fa-inr"></i></td>
                                </tr>

                             <!--    <tr class="pricetableth" >
                                    <th class=" Shiping-Packaging12 titleptice" style="display: none;">Shiping and Packaging:</th>
                                    <td class="Shiping-Packaging12" style="display: none;"><span class="Shiping-Packaging"></span>&nbsp;&nbsp;<i class="fa fa-inr"></i></td>
                                </tr> -->
                                <tr>
                                    <td valign="top" colspan="7" class="dataTables_empty"><span><h3>Debit Amount:<span class="Dabit-Amonunt" style="margin-left: 50px;"></span> &nbsp;&nbsp;<i class="fa fa-inr"></i></h3></span></td>
                                </tr>
                                <input type="hidden" name="" id="client_name">
                                <!-- <tr> -->
                                    
                                    <!-- <th class="pricetableth"><h3>Debit Amount:</h3></th>
                                    <td><h3><span class="Dabit-Amonunt"></span> &nbsp;&nbsp;<i class="fa fa-inr"></i></h3></td> -->
                                <!-- </tr> -->
                            
                            </table>
                        </div>

                    </div>

                    <div class="col-lg-12" >
                        <div class="row" style="float:right;">
                            <!-- <button type="button" class="btn btn-info "data-toggle="tooltip" data-placement="top" title="Print Generate Invoice"><i class="fa fa-print"></i> Print </button> -->
                            <button type="button" class="btn btn-primary"data-toggle="tooltip" data-placement="top" title="Save & Generate Invoice" onclick="savegenerate()" ><i class="fa fa-cloud"></i> Save & Generate </button>
                        </div> 
                    </div>
 
              </div>

            </div>
        </div> 

               <?php include_once('client-product_modal.php'); ?>

        </section>
      
      </div>
    

    </section>

  </div>
  <script>
   function gettex(tax_type){
       if(tax_type == 'InclusiveTax'){
           $('.InclusiveTax').show();
            $('.ExclusiveTax').hide();


       }else if(tax_type == 'ExclusiveTax'){
            $('.InclusiveTax').hide();
            $('.ExclusiveTax').show();
       }
       
   }
     $("#diffrent_addredd").change(function(){
        var chk_vlu = this.value;
        if(chk_vlu == 'chekd'){
            // alert(chk_vlu);
            $('.Shipping').show();
            $('#diffrent_addredd').val('');
        }else{
            $('.Shipping').hide();
            $('#diffrent_addredd').val('chekd');
        }
    });

// client jquery

     $(document).ready(function() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        today = mm + '/' + dd + '/' + yyyy;
        // document.write(today);
        // console.log(yyyy);

        var randumnuber = Math.floor(Math.random() * 1000000);

        var ponumber = yyyy +'-'+ randumnuber;
        $('#ponumber').val(ponumber);
        $('.current_date').val(today);

     });

     // product Jequery

     function category_name(val){
     $.ajax({
        url:"getcatvalue",
        type:"POST",
        data: {catvalue:val}, 
        success:function(status){
            // console.log(status);
            let gsttax  = JSON.parse(status);
           var  tax = '<option value ="'+  gsttax.tax_percentage  +'" >'+ gsttax.tax_percentage +' % </option><?php $cat=mysqli_query($con,"SELECT * FROM tapp_pro_category GROUP BY tax_percentage ORDER BY id  ASC ;");while($cate=mysqli_fetch_assoc($cat)) {?><option value="<?php echo $cate['tax_percentage'];?>"><?php echo $cate['tax_percentage'] . ' %';?></option><?php } ?>';
            $('.taxxx').html(tax);
            // console.log(gsttax.tax_percentage);

            $('#taxvalue1').attr('checked', true);
            $('.InclusiveTax').show();

            // $('.hsncode').val(product_name.productHSNCode);


        }
    });
   }

   function gettex(tax_type){
       if(tax_type == 'InclusiveTax'){
        // $('#tax_name').val('InclusiveTax');
           $('.InclusiveTax').show();
            $('.ExclusiveTax').hide();
            // $('#taxvalue1').attr('checked', true);
          // $('#taxvalue2').attr('checked', false);
          
       }else if(tax_type == 'ExclusiveTax'){
        // $('#taxvalue1').attr('checked', false);
          // $('#taxvalue2').attr('checked', true);
        // $('#tax_name').val('ExclusiveTax');
            $('.InclusiveTax').hide();
            $('.ExclusiveTax').show();
             
       }
       
   }

   // fatch folio Number 
   function get_folinum(valu){
     $('#loder').show();
         $.ajax({
        url:"getgolinum",
        type:"POST",
        data: {clint_id:valu},
            success:function(status){
                // console.log(status);
                let foli_value  = JSON.parse(status);
                $('#folinumber').val(foli_value.folio_number); 
                $('#loder').hide();

            }
        })
   }

// GenerateInvoice

function fatch_prodc(value){

     $('#loder1').show(); 
     // alert(value);
    $.ajax({
        url:"getgeninvoicepro",
        type:"POST",
        data: {pro_id:value},

            success:function(status){
                // console.log(status)
                $('#loder1').hide();
                $('#pro_quantity').val(''); 
                let pro_value  = JSON.parse(status);
                $('#product_name').val(pro_value.product_name);
                $('#pro_unit').val(pro_value.product_unit);
                $('#pro_description').val(pro_value.description);
                $('#pro_product_price').val(pro_value.product_price); 
                $('#pro_tax').val(pro_value.tax);

            }
    })
}

var cnt = 1;
var subtotal=0;
var total_tax=0;
var dabit_amount = 0;

$("#add-product").click(function(){

    //for 1,000,00
// function getMoney(A){
//     var a = new Number(A);
//     var b = a.toFixed(2); //get 12345678.90
//     a = parseInt(a); // get 12345678
//     b = (b-a).toPrecision(2); //get 0.90
//     b = parseFloat(b).toFixed(2); //in case we get 0.0, we pad it out to 0.00
//     a = a.toLocaleString();//put in commas - IE also puts in .00, so we'll get 12,345,678.00
//     //if IE (our number ends in .00)
//     if(a < 1 && a.lastIndexOf('.00') == (a.length - 3))
//     {
//         a=a.substr(0, a.length-3); //delete the .00
//     }
//     return a+b.substr(1);//remove the 0 from b, then return a + b = 12,345,678.90
// }
// getMoney(product_quantity).split('.')[0]

  // alert("genrated the invoice");
    var Generate_Invoice =$('#GenerateInvoice').serializeArray();
    // alert(GenerateInvoice);
    // console.log(Generate_Invoice);
    
    if(Generate_Invoice[0]['value'] == ''){
		var audio = new Audio("warning.mp3");
		toastr.warning(' Please Select The Client ',' Client Field Empty ');
		audio.play();
	}else if(Generate_Invoice[3]['value'] == ''){
		var audio = new Audio("warning.mp3");
		toastr.warning(' Please Select The Product  ',' Product Field Empty ');
		audio.play();
	}else if(Generate_Invoice[7]['value'] == ''){
		var audio = new Audio("warning.mp3");
		toastr.warning(' Please Enter The Quantity value ',' Quantity Field Empty ');
		audio.play();

	}else {
        $('.priceshow').show();
		// console.log(Generate_Invoice);
        var client_id =  Generate_Invoice[0]['value'];
        $('#client_name').val(client_id);
		var product_name = Generate_Invoice[5]['value'];
		var product_desc = Generate_Invoice[6]['value'];
		var product_quantity = Generate_Invoice[7]['value']; product_unit = Generate_Invoice[4]['value'];
		var product_price = Generate_Invoice[8]['value']; var tax_value = Generate_Invoice[9]['value'];

        // console.log(client_id);

    var show_karix = ''; 
    show_karix += '<tr class="text-center " id="tr'+ cnt +'">';
    show_karix += '<td>'+ product_name  +'</td>'; 
    show_karix += '<td>'+ product_desc +'</td>';  
    show_karix += '<td>'+ product_quantity + '&nbsp;'+ product_unit  +'</td>';  
    show_karix += '<td>'+  product_price +'&nbsp;'+ '<i class="fa fa-inr"></i>'  +'</td>'; 
    show_karix += '<td>'+ product_quantity * product_price +'&nbsp;'+ '<i class="fa fa-inr"></i>'  +'</td>';  
    show_karix += '<td>'+ tax_value +'&nbsp;'+ '%' +'</td>'; 

    show_karix += '<td>'+ product_quantity * (product_price * tax_value)/ 100  +'</td>';  
    show_karix += '<td><button type="button" class="btn btn-danger btn-xs btrm'+cnt+'" data-toggle="tooltip" data-placement="top" title="Add to Black List" onclick="remvee('+cnt+')"><i class="fa fa-ban"></i></button></td>';       
    show_karix += '</tr>';

     cnt++;
    // console.log(show_karix);
subtotal=subtotal+ product_quantity * product_price;
total_tax=total_tax+(product_quantity * (product_price * tax_value)/ 100);

dabit_amount = subtotal + total_tax ;



    // enter the subtotal and total tax
    $('.Sub-total').html(subtotal);
    $('.Total-Tax').html(total_tax);
    $('.Dabit-Amonunt').html(dabit_amount);


    $('.odd').hide();
    $('#show_product').append(show_karix);

}


});

function remvee(idval){
    $('.btrm'+idval).prop('disabled',true);
	$('#tr'+idval).fadeOut(1200);

	subtotal=subtotal-$('#tr'+idval).find('td:eq(4)').text();
	total_tax=total_tax-$('#tr'+idval).find('td:eq(6)').text();
	dabit_amount = subtotal + total_tax;
   
    $('.Sub-total').html(subtotal);
    $('.Total-Tax').html(total_tax);
    $('.Dabit-Amonunt').html(dabit_amount);

	$('#tr'+idval).addClass('removetr'+idval);

	setInterval(function(){ 
		$('.removetr'+idval).remove(); }, 3000);
 }

 function TSM(valuessss){
 	if(valuessss == 'totaldicount'){
        $('.total-discount').show();
        $('#totaldicount').val('discount');
        $('.Extra-Discount12').show();
 	}else if(valuessss == 'discount'){
        $('.total-discount').hide();
        $('#totaldicount').val('totaldicount');
        $('.Extra-Discount12').hide();
        $('.Extra-Discount12').hide();

    }else if(valuessss == 'shipping_pacaging'){
        $('.shippingandpakaging').show();
            $('#shipping_pacaging').val('shippingpacging');
            $('.Shiping-Packaging12').show();
    }else if(valuessss == 'shippingpacging'){
        $('.shippingandpakaging').hide();
            $('#shipping_pacaging').val('shipping_pacaging');
            $('.Shiping-Packaging12').hide();

    }else if(valuessss == 'mark_invoice'){
 		$('.Invoicepaid').show();
        $('#mark_invoice').val('markinvoice');
        $('.total-debit-amount').val($('.Dabit-Amonunt').text());

 	}else if(valuessss == 'markinvoice'){
        $('.Invoicepaid').hide();
        $('#mark_invoice').val('mark_invoice');
    }

 }

    $("#totldiscunt").keyup(function() {
      var tttdis = this.value;
            var Subtotal1 = $('.Sub-total').text();
            var TotalTax1 = $('.Total-Tax').text();
            var totalsipamt = $('.Shiping-Packaging').text();
                if(totalsipamt.length == 0){
                     var avc = parseInt(Subtotal1) + parseInt(TotalTax1);
                 }else{
                     var avc = parseInt(Subtotal1) + parseInt(TotalTax1) + parseInt(totalsipamt);
                 }
           
            var totaltaxcal = (parseInt(Subtotal1) + parseInt(TotalTax1)) * parseInt(tttdis) / 100;
            // console.log('kkk',tttdis);
      $('.Extra-Discount12').show();

      // console.log('length',tttdis.length);

      if(tttdis.length == 0){
            var totalt = 0;
            $('.Extra-Discount').html('00');

            // console.log('enter the old value');
            $('.Dabit-Amonunt').html(avc);
            
        }else if(tttdis.length <= 2){
            // console.log(tttdis.length);
             // console.log(avc);
            
            $('.Extra-Discount').html(totaltaxcal);

            $('.Dabit-Amonunt').html(parseInt(avc) - parseInt(totaltaxcal));


        }else{
            var audio = new Audio("warning.mp3");
            toastr.error('Discount Can Not Be Greater Than 100%','Warning ');
            audio.play();
        }
      // console.log(tttdis.length);


    });

     $("#shopingpakaging").keyup(function() {
         var toshoppack = this.value;
            var Subtotal1 = $('.Sub-total').text();
            var TotalTax1 = $('.Total-Tax').text();
            var totaldis = $('.Extra-Discount').text(); 
             if(totaldis.length == 0){
                     var avca = parseInt(Subtotal1) + parseInt(TotalTax1);
                 }else{
                     var avca = parseInt(Subtotal1) + parseInt(TotalTax1) - parseInt(totaldis);
                 }

        $('.Shiping-Packaging12').show();

             if(toshoppack.length == 0){
                $('.Shiping-Packaging').html('00');
                $('.Dabit-Amonunt').html(avca);
            }else{

                $('.Shiping-Packaging').html(toshoppack);
                $('.Dabit-Amonunt').html(parseInt(avca) + parseInt(toshoppack));

            }
     });



     $('#cedit_blnce').keyup(function(){
        var totalseles = this.value;

        if(totalseles.length == 0 ){
            $('.total-debit-amount').val($('.Dabit-Amonunt').text());
        }else{
            var totaldis = $('.Dabit-Amonunt').text();
            $('.total-debit-amount').val( parseInt(totaldis) - parseInt(totalseles) );
            }
     });



     function savegenerate(){

         var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        todayss = mm + '/' + dd + '/' + yyyy;


        var full=[];
        $('#show_product tr').each(function(){
            var id =  $(this).attr('id');
            var obj = {};
                obj.proname =$('#'+id).find('td:eq(0)').text();
                obj.prodesc =$('#'+id).find('td:eq(1)').text();
                obj.proquantity =$('#'+id).find('td:eq(2)').text();
                obj.proprice =$('#'+id).find('td:eq(3)').text();
                obj.prototalvalue =$('#'+id).find('td:eq(4)').text();
                obj.prodgsttax =$('#'+id).find('td:eq(5)').text();
                obj.prototaltaxvalue =$('#'+id).find('td:eq(6)').text();
                full.push(obj)
        }); 

            var subtotal = $('.Sub-total').text();
            var totaltax = $('.Total-Tax').text();
            var extradiscount = $('.Extra-Discount').text();
            var shippingpack = $('.Shiping-Packaging').text();

            var InvoicePaidmethod = $('#InvoicePaid').find(":selected").text();

            var CreditBalance =  document.getElementById("cedit_blnce").value;

            var totalpayment = $('.Dabit-Amonunt').text();
            var invoicenumber =  document.getElementById("ponumber").value;
            // var datepicker =  document.getElementsById("datepicker2").value;

            // var clientname = $('#clicent_name').find(":selected").text();
            var clientname = document.getElementById("client_name").value;


                // console.log('subtotal:' , subtotal);
                // console.log('totaltax:' , totaltax);
                // console.log('extradiscount:' , extradiscount);
                // console.log('shippingpack:' , shippingpack);
                // console.log('InvoicePaidmethod:' , InvoicePaidmethod);
                // console.log('CreditBalance:' , CreditBalance);
                // console.log('totalpayment:' , totalpayment);
                // console.log('invoicenumber:' , invoicenumber);
                // console.log('clientname:' , clientname);
                // console.log('datepicker:',todayss)
                var tbl_data=full;

                // console.log(clientname);

        $.ajax({
        url:"addinvoice",
        type:"POST",
        data: {clientname:clientname,invoicenumber:invoicenumber,totalpayment:totalpayment,CreditBalance:CreditBalance,InvoicePaidmethod:InvoicePaidmethod,shippingpack:shippingpack,extradiscount:extradiscount,totaltax:totaltax,subtotal:subtotal,tbl_data:tbl_data},
            success:function(data){
            	console.log(data);
               window.location.href='genratepdf';
               
            }
        });
     }

  </script>

 
