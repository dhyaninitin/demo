<?php
session_start();
include 'layouts/connection.php';
 require 'pdf/fpdf.php';

     $invoice_id=$_SESSION['invoices'];
     // unset($_SESSION['invoices']);
        // $invoice_id=json_decode($invoice_id);
        // print_r($invoice_id);
        // echo 'jjjj';

	$id=$invoice_id[0]['invoicenumber'];

$res=mysqli_query($con,"SELECT * FROM invoices WHERE id='$id'");
echo $num=mysqli_num_rows($res);
if($num==0){
	exit();
}
$row1=mysqli_fetch_array($res);

if(!empty($row1['balance_payment'])){
	$balance_payment = $row1['balance_payment'];
}else{
	$balance_payment = '00';
}
$filename = $row1['invoicenumber'].'.pdf';

        $pdf=new FPDF();

        // $pdf->AddFont('Helvetica', '', 'Helvetica.php');
        // $pdf->AddFont('Helvetica', 'B', 'Helvetica.php');
        // $pdf->AddFont('Helvetica', 'I', 'Helvetica.php');

        $pdf->AddFont('times', '', 'times.php', true);
        $pdf->SetFont('times', '', 12);

        $pdf->SetTitle('Invoice');
        $pdf->SetSubject('sddadad');
        $pdf->SetAuthor('My author');

        $pdf->SetLeftMargin(20);
        $pdf->SetRightMargin(20);

        $pdf->AddPage();

            // $pdf->SetTitle('Generate Invoice');
				$pdf->Image('asd.png',10,10,-500);


		$pdf->SetXY (130,18);
		$pdf->SetDrawColor(50,60,100);
		$pdf->setTextColor(255,255,255);
		$pdf->SetFillColor(51,153,255);
		$pdf->Cell(60,6,"Invoice Number :".$row1['invoicenumber'],1,0,'C',1);


			$pdf->SetXY (140,25);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->Cell(10,10,"Invoice Date ",0,0,'C',0);

			$pdf->SetXY (170,25);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->Cell(10,10,date("d F Y", strtotime($row1['date'])),0,0,'C',0);

			$pdf->SetXY (140,30);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->Cell(10,10,"Amount Due ",0,0,'C',0);

			$pdf->SetXY (170,30);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->Cell(10,10,$balance_payment,0,0,'C',0);


        	$pdf->SetXY (138,35);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->Cell(10,10,"Due Date ",0,0,'C',0);

			$pdf->SetXY (170,35);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->Cell(10,10,date("d F Y", strtotime($row1['date'] . ' + 30 days')),0,0,'C',0);
	
	// $pdf->Cell(50,10,"Invoice Number : $numb",1,0,'C',1);



			$client=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tapp_clients WHERE id='".$row1['clientname']."'"));

			$pdf->SetXY (17,35);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->SetFontSize(10);
			$pdf->Cell(10,10,"Company Name : ",0,0,'C',0);

			$pdf->SetXY (14,40);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->SetFontSize(10);
			$pdf->Cell(10,10,"Client Name : ",0,0,'C',0);

			$pdf->SetXY (16,45);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->SetFontSize(10);
			$pdf->Cell(10,10,"Phone Number : ",0,0,'C',0);

			$pdf->SetXY (68,45);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->SetFontSize(10);
			$pdf->Cell(10,10,"GST Number : ",0,0,'C',0);

			$pdf->SetXY (15,50);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->SetFontSize(10);
			$pdf->Cell(10,10,"Email Address :",0,0,'C',0);

			

			$pdf->SetXY (50,35);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->SetFontSize(10);
			$pdf->Cell(10,10,$client['company_name'],0,0,'C',0);

			$pdf->SetXY (37,40);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->SetFontSize(10);
			$pdf->Cell(10,10,$client['client_name'],0,0,'C',0);

			$pdf->SetXY (42,45);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->SetFontSize(10);
			$pdf->Cell(10,10,$client['phone_number'].'  '.' ,',0,0,'C',0);

			$pdf->SetXY (90,45);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->SetFontSize(10);
			$pdf->Cell(10,10,$client['gst_number'],0,0,'C',0);

			$pdf->SetXY (50,50);
			$pdf->SetDrawColor(100,0,00);
			$pdf->setTextColor(0,0,0);
			$pdf->SetFontSize(10);
			$pdf->Cell(10,10,$client['email_address'],0,0,'C',0);


        // $pdf->SetXY (10,35);
        // $pdf->SetFontSize(11);
        // $pdf->setTextColor(0,0,0);
        // $pdf->Write(5,'Mayank Hardware & Sanitory Store');
        // $pdf->SetXY (10,40);
        // $pdf->Write(5,'105 Shergarh Road Resham Majari,Near Durga Mandir');
        // $pdf->SetXY (10,45);
        // $pdf->Write(5,'Contact No : 6397425349');
        // $pdf->SetXY (10,50);
        // $pdf->Write(5,'Email : mayankkumar0700@gmail.com');
        //  $pdf->SetXY (10,55);
        // $pdf->Write(5,'GSTIN : 05AUPPK8838F1Z7');
        //  $pdf->SetXY (10,60);
        // $pdf->Write(5,'PAN No.-53413413');



	
	$pdf->SetXY (8,65);
	$pdf->SetFontSize(11);
	$pdf->SetDrawColor(51,153,255);
	$pdf->setTextColor(255,255,255);
	$pdf->SetFillColor(51,153,255);
	$pdf->Cell(40,8,'Product',1,0,'C',1);

	$pdf->SetXY (40,65);
	$pdf->SetDrawColor(51,153,255);
	$pdf->setTextColor(255,255,255);
	$pdf->SetFillColor(51,153,255);
	$pdf->Cell(40,8,'Description',1,0,'C',1);

	$pdf->SetXY (75,65);
	$pdf->SetDrawColor(51,153,255);
	$pdf->setTextColor(255,255,255);
	$pdf->SetFillColor(51,153,255);
	$pdf->Cell(30,8,'Quantity ',1,0,'C',1);
	
	$pdf->SetXY (100,65);
	$pdf->SetDrawColor(51,153,255);
	$pdf->setTextColor(255,255,255);
	$pdf->SetFillColor(51,153,255);
	$pdf->Cell(35,8,'Unit Price ',1,0,'C',1);
	
	$pdf->SetXY (135,65);
	$pdf->SetDrawColor(51,153,255);
	$pdf->setTextColor(255,255,255);
	$pdf->SetFillColor(51,153,255);
	$pdf->Cell(17,8,'GST ',1,0,'C',1);
	
	$pdf->SetXY (152,65);
	$pdf->SetDrawColor(51,153,255);
	$pdf->setTextColor(255,255,255);
	$pdf->SetFillColor(51,153,255);
	$pdf->Cell(23,8,'Tax Value',1,0,'C',1);
	
	$pdf->SetXY (175,65);
	$pdf->SetDrawColor(51,153,255);
	$pdf->setTextColor(255,255,255);
	$pdf->SetFillColor(51,153,255);
	$pdf->Cell(20,8,'Total ',1,0,'C',1);

$y=73;

foreach($invoice_id as $ids){
	$id=$ids['invoicenumber'];

$res=mysqli_query($con,"SELECT * FROM invoices WHERE id='$id'");
$num=mysqli_num_rows($res);
if($num==0){
	exit();
}
$row=mysqli_fetch_array($res);
$row['product'];
	$pdf->SetFontSize(11);
	$pdf->SetXY (10,$y);
	$pdf->SetDrawColor(100,0,00);
	$pdf->setTextColor(0,0,0);
	$pdf->Cell(30,8,$row['product'],0,0,'C',0);
	
	$pdf->SetXY (40,$y);
	$pdf->SetDrawColor(100,0,00);
	$pdf->Cell(40,8,$row['description'],0,0,'C',0);
	$pdf->SetXY (80,$y);
	$pdf->SetDrawColor(100,0,00);
	$pdf->Cell(30,8,$row['quantity'] ,0,0,'C',0);
	$pdf->SetXY (110,$y);
	$pdf->SetDrawColor(100,0,00);
	$pdf->Cell(20,8,$row['unit_price'].'  '.'Rs',0,0,'C',0);
	$pdf->SetXY (132,$y);
	$pdf->SetDrawColor(100,0,00);
	$pdf->Cell(20,8,$row['gst'].'  '.'%',0,0,'C',0);
	$pdf->SetXY (150,$y);
	$pdf->SetDrawColor(100,0,00);
	$pdf->Cell(30,8,$row['tax_value'].'  '.'Rs',0,0,'C',0);
	$pdf->SetXY (170,$y);
	$pdf->SetDrawColor(100,0,00);
	$pdf->Cell(30,8,$row['value'].'  ' .'RS',0,0,'C',0);

$y=$y+8;
}

	//line
	// $pdf->SetXY (20,$y+5);
	$pdf->SetLineWidth(1);
	$pdf->SetDrawColor(50, 60, 100);
	$pdf->Line(17,$y+5,195,$y+5);

	$pdf->SetXY (20,$y+10);
	//$pdf->SetDrawColor(100,0,00);
	$pdf->Cell(30,10,'Authorised Signature: ',0,0,'C',0);
	$pdf->SetFontSize(14);


	$pdf->SetXY (120,$y+15);
	$pdf->SetFontSize(11);
	$pdf->SetDrawColor(100,0,00);
	$pdf->Cell(10,10,"Sub Total ",0,0,'C',0);

	$pdf->SetXY (170,$y+15);
	$pdf->SetFontSize(11);
	$pdf->SetDrawColor(100,0,00);
	$pdf->Cell(10,10,$row1['subtotal'],0,0,'C',0);

	$pdf->SetXY (117,$y+22);
	$pdf->SetFontSize(11);
	$pdf->SetDrawColor(100,0,00);
	$pdf->Cell(10,10,"IGST ",0,0,'C',0);

	$pdf->SetXY (170,$y+22);
	$pdf->SetFontSize(11);
	$pdf->SetDrawColor(100,0,00);
	$pdf->Cell(10,10,$row1['totaltax'],0,0,'C',0);

	$pdf->SetXY (126,$y+29);
	$pdf->SetFontSize(11);
	$pdf->SetDrawColor(100,0,00);
	$pdf->Cell(10,10,"Balance Amount ",0,0,'C',0);

	$pdf->SetXY (170,$y+29);
	$pdf->SetDrawColor(100,0,00);
	$pdf->SetFontSize(11);
	$pdf->Cell(10,10,$balance_payment,0,0,'C',0);

	$pdf->SetXY (124,$y+36);
	$pdf->SetDrawColor(100,0,00);
	$pdf->SetFontSize(11);
	$pdf->Cell(10,10,"Extra Discount ",0,0,'C',0);

	if(!empty($row1['extradiscount'])){
		$extradis = '-'.'  '.  $row1['extradiscount'];
	}else{
		$extradis = '00';
	}

	$pdf->SetXY (170,$y+36);
	$pdf->SetDrawColor(100,0,00);
	$pdf->SetFontSize(11);
	$pdf->Cell(10,10,$extradis,0,0,'C',0);


	$pdf->SetXY (130,$y+43);
	$pdf->SetDrawColor(100,0,00);
	$pdf->SetFontSize(11);
	$pdf->Cell(10,10,"Shiping&Packing Cost",0,0,'C',0);

	if(!empty($row1['shippingpack'])){
		$shipping = '+'.'  '.  $row1['shippingpack'];
	}else{
		$shipping = '00';
	}
	$pdf->SetXY (170,$y+43);
	$pdf->SetDrawColor(100,0,00);
	$pdf->Cell(10,10,$shipping,0,0,'C',0);



	$pdf->SetXY (115,$y+52);
	$pdf->SetDrawColor(50,60,100);
	$pdf->setTextColor(255,255,255);
	$pdf->SetFillColor(51,153,255);
	$pdf->SetFontSize(11);
	$pdf->Cell(35,7,"Total Amount ",0,1,'C',1);

	$pdf->SetXY (149,$y+52);
	$pdf->SetDrawColor(50,60,100);
	$pdf->setTextColor(255,255,255);
	$pdf->SetFillColor(51,153,255);
	$pdf->SetFontSize(11);
	$pdf->Cell(50,7,"INR".'    '.  $row1['totalpayment'],0,1,'C',1);



$number = $row1['totalpayment']; $no = floor($number);
  $point = round($number - $no, 2) * 100; $hundred = null;
   $digits_1 = strlen($no); $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two','3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six','7' => 'seven', '8' => 'eight', '9' => 'nine','10' => 'ten', '11' => 'eleven', '12' => 'twelve','13' => 'thirteen', '14' => 'fourteen','15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen','18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty','30' => 'thirty', '40' => 'forty', '50' => 'fifty','60' => 'sixty', '70' => 'seventy','80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');

   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100; $number = floor($no % $divider); $no = floor($no / $divider); $i += ($divider == 10) ? 1 : 2;
     if($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null; $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] ." " . $digits[$counter] . $plural . " " . $hundred:$words[floor($number / 10) * 10]. " " . $words[$number % 10] . " ". $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';

if(!empty($points)){
  $totalpay =  $result . "Rupees  " . $points . " Paise";
}else{
   $totalpay = $result . "Rupees  " ;
}
  

	//numarical change the text
	$pdf->SetXY (147,$y+60);
	$pdf->SetDrawColor(50,60,100);
	$pdf->setTextColor(40,41,35);
	$pdf->SetFillColor(51,153,255);
	$pdf->SetFontSize(9);
	$pdf->Cell(10,6,$totalpay.'only',0,0,'C',0);


	$pdf->SetXY(70,$y+70);
	$pdf->SetDrawColor(0,0,100);
	$pdf->setTextColor(0,0,0);
	$pdf->Cell(50,10,'Thank You and Have a nice day ! ',0,0,'C',0);

        // $pdf->Cell(40,10,'Hello World!');
    $dir='invoice-pdf/';
    $full_path = $dir . '/' . $filename;
    $pdf ->Output($full_path,'F');

unset($_SESSION["invoices"]);
    header('location:invoice-pdf/'.$filename);
?>