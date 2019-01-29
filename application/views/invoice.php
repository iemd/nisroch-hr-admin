<!DOCTYPE html>
<html lang="en">
<head>
  <title>Invoice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <style>
.body{
	border: 1px solid black;
}	
  body{font-size:12px;}
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}

hr { 
    display: block;
  

    border-style: inset;
    border-width: 1px;
} 



table {
    border-collapse: collapse;
    width: 100%;
}
th {
  background-color: #eee;
  font-weight: bold;
}
th,
td {
  border: 0.125em solid #333;
  line-height: 1.;
  padding: 0.75em;
  text-align: left;
}
/* Stack rows vertically on small screens */
@media (max-width: 30em) {
  /* Hide column labels */
	thead tr {
		position: absolute;
		top: -9999em;
		left: -9999em;
	}
	tr {
    border: 0.125em solid #333;
    border-bottom: 0;
  }
	/* Leave a space between table rows */
  tr + tr {
    margin-top: 1.5em;
  }
  /* Get table cells to act like rows */
  tr,
  td {
		display: block;
	}
	td {
		//border: none;
		border-bottom: 0.125em solid #333;
	/* Leave a space for data labels */
		padding-left: 50%;
	}
	/* Add data labels */
  td:before {
    content: attr(data-label);
    display: inline-block;
    font-weight: bold;
    line-height: 1.0;
    margin-left: -100%;
    width: 100%;
  }
}
/* Stack labels vertically on smaller screens */
@media (max-width: 20em) {
  td {
    padding-left: 0.75em;
  }
  td:before {
    display: block;
    margin-bottom: 0.75em;
    margin-left: 0;
  }
}

  html,body{
    height:auto;
    width:210mm;
}




</style>
</head>
<body>
<div class="body">
<?php foreach($getcart as $getcarts){ 
//print_r($getcarts);
 }

foreach($invoice_details as $row){

}
foreach($adminprofile as $row1){
}
 ?>
<div class="container-fluid">


<div class="container">
<div class="upper" style="text-align:left;margin-left:5px;">

<img src="<?php echo base_url('images/logonisroch.png'); ?>" alt="Nature" class="responsive" style="height:80px;width:120px;margin-top:10px;">
<div style="text-align:center;margin-top:-108px;margin-left:50px;">
    <h1 style="font-size:25px;"><u>Nisroch Chemicals Private Limited</u></h1>
  <p style="font-size:14px;margin-top:-8px;"><b>Mahadev Athan, Marcha-Marchi road, Near Bypass Thana, Patna City, Patna - 800009</b></p>

   <p style="font-size:14px;margin-top:-9px;"><b>Contact: 7667333455, 9661674388</b></p> 
	<p style="font-size:14px;margin-top:-10px;"><b>www.nisrochchemicals.in, https://m.facebook.com/@nisrochchemicals</b></p>
	</div>
  
  
  </div>
  
  </div>
  
  
  
  

  <div class="row">
   <div class="container">
  
<hr>

<p><span style="margin-left:10px;">
<?php if($row['ProductType'] == 'NPP'){ ?>
<b>PL No:</b> <?php echo $row['pnumber']; ?> | <?php echo $row['ProductType']; ?> 
<?php }else if($row['ProductType'] == 'NBP'){ ?> 
<b>Inv Type:</b> <?php echo $row['ProductType']; ?>
<?php } ?></span><span style="margin-left:180px;"><b>GSTIN:</b>10CQCPK4870N1ZQ </span><span style="margin-left:180px;"><b>Warehouse:</b> PATNA DEPOT</span></p>
  
<hr>

</div>
<div class="container">
   <h3 style="text-align:center;text-decoration: underline;">TAX INVOICE</h3>     
</div>		
  <table style="border: none;">
		<tr>
                    <td style="padding:0px;">	
		<table style="width:33%;border:none;">
		  <tr>
			<td style="border:none;"><b>Name :</b> <?php echo $row['name']; ?></td>
		  </tr>		  
		   <tr>
			<td style="border:none;"><b>Buyer Code :</b> <?php echo $row['bcode']; ?></td>
		  </tr>		  
		  <tr>
			<td style="border:none;"><b>INVOICE NO :</b> <?php echo $row['Invoice']; ?></td>
		  </tr>	  
		  <tr>
			<td style="border:none;"><b>Date :</b> <?php echo $row['date']; ?></td>
		  </tr>		 
		 </table>		 
		 <table style="width:33%;margin-left:260px;margin-top:-133px;border:none;">
		  <tr>
			<td style="border:none;"><b>Transport :</b> <?php echo $row['transportType']; ?></td>
		  </tr>		  
		  <tr>
			<td style="border:none;"><b>Dispatch Through :</b> <?php echo $row['pos']; ?></td>
		  </tr>		  
		  <tr>
			<td style="border:none;"><b>State :</b> Bihar</td>
		  </tr>		  
		  <tr>
			<td style="border:none;"><b>GSTIN :</b> <?php echo $row['gst']; ?></td>
		  </tr>	  
		  </table>		  
		  <table style="width:33%;margin-left:520px;margin-top:-133px;border:none;">		  
		  <tr>
			<td style="border:none;"><b>Address :</b> <?php echo $row['State']; ?>, <?php echo $row['City']; ?>, <?php echo $row['Pincode']; ?>. </td>
		  </tr>		  
		  <tr>
			<td style="border:none;"><b>Destination :</b> <?php echo $row['Destination']; ?></td>
		  </tr>	  
		  <tr>
			<td style="border:none;"><b>Delivery Address :</b> <?php echo $row['DAddress']; ?></td>
		  </tr>		  
		  <tr>
			<td style="border:none;"><b>Number :</b> <?php echo $row['number']; ?></td>
		  </tr>
		  </table>	  
		</td>
		</tr>
 
</table>
      <div class="container" style="margin-left:01px;margin-right:01px;">
<table>
    <thead>
      <tr>
        <th style="padding: 0.55em;">S.No.</th>
        <th style="padding: 0.55em;">Description of Goods with HSN Code</th>
        <th style="padding: 0.55em;">Batch No.</th>
		<th style="padding: 0.55em;">Mfg Date</th>
        <th style="padding: 0.55em;">Exp Date</th>
        <th style="padding: 0.55em;">Pack Size</th>
		<th style="padding: 0.55em;">Qty</th>
		<th style="padding: 0.55em;">Tax</th>
        <th style="padding: 0.55em;">Uom</th>
        <th style="padding: 0.55em;">Rate</th>
		
        <th style="padding: 0.55em;">Amount</th>
     
      </tr>
    </thead>
    <tbody>
	<?php 
	$count = 0;
	
	?>
	<?php foreach($getcart as $row){ ?>
	<?php 
	
	$count+=1;
	$tax = $row['base_price'] *  $row['tax'] / 100;
	$base_price = $row['base_price'] + $tax;
	$base[]= $row['base_price'] * $row['quantity'];
	?>
        <tr>
        <td style="padding: 0.55em;"  data-label="First Name"><?php echo $count; ?></td>
        <td style="padding: 0.55em;" data-label="Last Name"><?php echo $row['prod_name']; ?> / <?php echo $row['hsn']; ?></td>
        <td style="padding: 0.55em;" data-label="Hero Title"><?php echo $row['batch']; ?></td>
		 <td style="padding: 0.55em;" data-label="First Name"><?php echo $row['mdate']; ?></td>
        <td style="padding: 0.55em;" data-label="Last Name"><?php echo $row['edate']; ?></td>
        <td style="padding: 0.55em;" data-label="Hero Title"><?php echo $row['psize']; ?></td>
		 <td style="padding: 0.55em;" data-label="First Name"><?php echo $q[] = $qty = $row['quantity']; ?></td>
		 <td style="padding: 0.55em;" data-label="First Name"><?php echo $row['tax']; ?> %</td>
        <td style="padding: 0.55em;" data-label="Last Name"><?php echo $row['quantitytype']; ?></td>
        <td style="padding: 0.55em;" data-label="Hero Title"><?php echo $row['base_price']; ?></td>
		
        <td style="padding: 0.55em;" data-label="Last Name"><?php echo $base_price * $row['quantity']; ?></td>
   
      </tr>
	<?php } ?>
	
    </tbody>
</table>
</div>


<table style="width:100%;border: none;">
 
		<tr>
		<td>
		<table style="width:40%;border:none; float: left;">
		  <tr>
			<td style="border:none; padding: 0.25em;"></td>
		  </tr>
		  
		   <tr>
			<td style="border:none; padding: 0.25em;"><b>Freight :</b> To Pay</td>
		  </tr>
		  
		  <tr>
			<td style="border:none; padding: 0.25em;"><b>Sale Officer :</b> Accountant</td>
		  </tr>
		  
		  <tr>
			<td style="border:none; padding: 0.25em;"><b>Total QTY :</b> <?php echo array_sum($q); ?></td>
		  </tr>
		 
		 </table>
		 
		 <table style="width:33%; float: right; border:none;">
		  
		  <tr>
			<td style="border:none; padding: 0.25em;"><b>Total :Rs.</b> <?php echo array_sum($base); ?> </td>
		  </tr>
		  <?php if($row['Billtaxtype'] == 'GST'){ ?>
		  <tr>
			<td style="border:none; padding: 0.25em;"><b>CGST | SGST :</b> <?php echo $row['gst']; ?></td>
		  </tr>
		  <?php }else if($row['Billtaxtype'] == 'IGST'){ ?>
		  <tr>
			<td style="border:none; padding: 0.25em;"><b>IGST Tax :</b> <?php echo $row['gst']; ?></td>
		  </tr>
		  <?php } ?>
		  
		  <?php if($getcarts['discount'] > 0){ ?>
		  <tr>
			<td style="border:none; padding: 0.25em;"><b>Discount % :</b> <?php echo $getcarts['discount']; ?></td>
		  </tr>
		  <?php }else{ ?>
		  <tr>
			<td style="border:none; padding: 0.25em;"><b>Round :</b> Rs. <?php echo (round($row['payable_amount']) - $row['payable_amount']); ?> </td>
		  </tr>
		  <?php } ?>
		  <tr>
			<td style="border:none; padding: 0.25em;"><b>Net Value: Rs. </b> <?php echo $payable_amount = round($row['payable_amount']); ?></td>
		  </tr>
		  </table>
		 
		 </td>
		 </tr>
  
 
</table>
      <div class="cleaefix"></div>
 
  
<hr>
   
	     <p style="margin-left:15px;"><b>Amount in Word :</b> <?php echo $num = convert_number_to_words($payable_amount);?> </p>
	
	

<hr>



  

<p style="margin-left:15px;margin-right:15px; margin-bottom: 0px;"><b>Terms & Condition:</b><br /> 1. Payment Should be made by RTGS/NEFT or account payee cheque/draft drawn in the name of Nisroch Chemicals Private Limited. <br/><b>2.</b> No Complaint in respect of material supplied vide this invoice shall be entertained unless the same is lodged in writing within 7 days from the date of dispatched.<br/> <b>3.</b> Our responsibility ceasos once the goods leave our factory.<br/> <b>4.</b> Interest will be charged @ 24% on overdue outstanding bills.</p>


  <table style="width:100%;border: none;">
  
        <tr style="border: none;">
	<td style="border: none;float:right;margin-right:20px;"><b>Authorised Signatory</b></td>
		
  
  </tr>
    
  </table>


	

	
	
<hr>



   <p style="margin-left:15px;margin-right:15px;"><strong>Head Office : </strong>B-707, Shri Ganesh Park, Goveli Road, Titwala-E, Maharastra - 421605.  &nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<b>Email :</b> contact@nisrochchemicals.in</p>


 
 
</div>
<a id="printPageButton" href="<?php echo base_url('Billing'); ?>"><button>Close</button></a>

<a id="printPageButton" onClick="window.print()"><button>Print</button></a>
</div>
</body>
<style>
	@media print {
  #printPageButton {
    display: none;
  }
}
	</style>
</html>
