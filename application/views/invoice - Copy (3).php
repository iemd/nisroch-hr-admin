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
		border: none;
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
    height:297mm;
    width:210mm;
}




</style>
</head>
<body>
<div class="body">
<?php foreach($getcart as $getcarts){ 
//print_r($getcarts);
 } ?>
<div class="container-fluid">


<div class="container">
<div class="upper" style="text-align:left;margin-left:5px;">

<img src="<?php echo base_url('images/logonisroch.png'); ?>" alt="Nature" class="responsive" style="height:80px;width:120px;margin-top:10px;">
<div style="text-align:center;margin-top:-100px;margin-left:50px;">
<h2><u>Nisroch Chemicals Private Limited</u></h2>
  <p style="font-size:15px;margin-top:-5px;"><b>B-707, Shri Ganesh Park, Goveli Road, Titwala-E, Maharastra - 421605</b></p>

   <p style="font-size:15px;margin-top:-8px;"><b>Contact: 7302711356</b></p> 
	<p style="font-size:15px;margin-top:-5px;"><b>CIN No:</b></p>
	</div>
  
  
  </div>
  
  </div>
  
  
  
  

  <div class="row">
   <div class="container">
  
<hr>

<p><b>CM:</b> 256/03 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<b>PL No:</b> <?php echo $getcarts['PLNO']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>GSTIN:</b>10CQCPK4870N1ZQ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<b>Warehouse:</b>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; PATNA DEPOT</p>
  
<hr>

</div>
<div class="container">
   <h3 style="text-align:center;text-decoration: underline;">TAX INVOICE</h3>
     
</div>





	<div class="table1">
	
		
         <table style="width:100%;border: none;">
 
  <tr style="border: none;">
    <td style="border: none;    padding: 0.25em;"><b>Name & Address of the consignee:</b></td>
 
       <td style="border: none;    padding: 0.25em;"> <b>Transport:</b> </td>
	   <td style="border: none;    padding: 0.25em;"><b>Invoce No:</b> <?php echo $getcarts['Invoice']; ?></td>
	   <td style="border: none;    padding: 0.25em;"> Original for Recipient ()</td>
		
	
	 
  
	
	
  </tr>
  <tr style="border: none;">
     <td style="border: none;    padding: 0.25em;"> <?php echo $getcarts['Name']; ?></td>
    <td style="border: none;    padding: 0.25em;">  <b>Destination:</b> </td>
    <td style="border: none;    padding: 0.25em;"> <b>Date:</b> <?php echo $getcarts['pay_date']; ?></td>
    <td style="border: none;    padding: 0.25em;"> Duplicate for Tranporter ()</td>
  </tr >
  <tr>
   <td style="border: none; width:220px;   padding: 0.25em;"><?php echo $getcarts['Address']; ?>	</td>
     
 
    <td style="border: none;    padding: 0.25em;"><b>State :</b> bihar</td>
    <td style="border: none;    padding: 0.25em;"> <b>SO No    :</b>SO No </td>
	 <td style="border: none;    padding: 0.25em;">  Triplicate for Supplier()</td>
	
	
  </tr>
  </tr>
   <tr style="border: none;">
	<td style="border: none;width:220px;    padding: 0.25em;">  </td>
	    <td style="border: none;  padding: 0px;"> </td>
    <td style="border: none;    padding: 0.25em;"><b> SO Date  :</b>SO Date:</td>
    
   
  </tr>
  
  
  
      <tr style="border: none;">
	<td style="border: none;    padding: 0.25em;"> <b>Buyer Code:</b><?php echo $getcarts['bcode']; ?></td>
	<td style="border: none;    padding: 0.25em;"> <b>GSTIN:</b><?php echo $getcarts['GSTIN']; ?>  </td>
		<td style="border: none;    padding: 0.25em;"><b>Ph No:</b><?php echo $getcarts['Mobile']; ?></td>
		<td style="border: none;    padding: 0.25em;"><b>Place Of Supply:</b><?php echo $getcarts['SupplyPlace']; ?></td>
	 
   
   
  
  </tr>
  



 
</table>
		 
<p> <b>Delivery Address:</b><?php echo $getcarts['DeliveryAddress']; ?></p>

</div>


<div class="container">
<table>
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Description of Goods with HSN Code</th>
        <th>Batch No.</th>
		  <th>Mfg Date</th>
        <th>Exp Date</th>
        <th>Pack Size</th>
		  <th>Qty</th>
        <th>Uom</th>
        <th>Rate</th>
		 
        <th>Amount</th>
     
      </tr>
    </thead>
    <tbody>
	<?php 
	$count = 0;
	
	?>
	<?php foreach($getcart as $row){ ?>
	<?php 
	
	$count+=1;
	?>
      <tr>
        <td data-label="First Name"><?php echo $count; ?></td>
        <td data-label="Last Name"><?php echo $row['prod_name']; ?> / <?php echo $row['hsn']; ?></td>
        <td data-label="Hero Title"><?php echo $row['batch']; ?></td>
		 <td data-label="First Name"><?php echo $row['mdate']; ?></td>
        <td data-label="Last Name"><?php echo $row['edate']; ?></td>
        <td data-label="Hero Title"><?php echo $row['psize']; ?></td>
		 <td data-label="First Name"><?php echo $row['quantity']; ?></td>
        <td data-label="Last Name"><?php echo $row['quantitytype']; ?></td>
        <td data-label="Hero Title"><?php echo $row['base_price']; ?></td>
		
        <td data-label="Last Name"><?php echo $row['base_price'] * $row['quantity']; ?></td>
   
      </tr>
	<?php } ?>
	
    </tbody>
</table>
</div>


<div class="table1">
	
		
         <table style="width:100%;border: none;">
 
  <tr style="border: none;">
    <td style="border: none;">Vehicle:</td>
 
       <td style="border: none;"> </td>
	   <td style="border: none;"></td>
	   <td style="border: none;    float: right;">Total: <?php echo $row['grandtotal']; ?></td>
	
	
	 
  
	
	
  </tr>
  <tr style="border: none;">
     <td style="border: none;">   LR Number:</td>
    <td style="border: none;">  </td>
    <td style="border: none;"> </td>
	<?php if($getcarts['gst_mode'] == 'GST'){ ?>
	<?php $gst = $getcarts['gst']; 
	$gst1 = $gst / 2;
	?>
    <td style="border: none;    float: right;"> SGST %: <?php echo $gst1; ?></td>
	<?php } ?>
	  <td style="border: none;"> </td>
    <td style="border: none;"> </td>
    
  </tr >
  <tr>
   <td style="border: none;">	 Pan No: </td>
     
 
    <td style="border: none;"></td>
    <td style="border: none;"> </td>
	<?php if($getcarts['gst_mode'] == 'GST'){ ?>
	<?php $gst = $getcarts['gst']; 
	$gst1 = $gst / 2;
	?>
	 <td style="border: none;    float: right;">     CGST %: <?php echo $gst1; ?></td>
	<?php } ?>
  </tr>
  
   <tr style="border: none;">
	<td style="border: none;">  Freight:Ro pay</td>
	    <td style="border: none;"> </td>
    <td style="border: none;"> </td>
	<?php if($getcarts['gst_mode'] == 'IGST'){ ?>
	  <td style="border: none;    float: right;">  IGST <?php echo $getcarts['gst']; ?> %: </td>
	<?php } ?>
    <td style="border: none;"> </td>
  </tr>
  <?php if($getcarts['discount'] > 0){ ?>
  <tr style="border: none;">
	<td style="border: none;">  </td>
	    <td style="border: none;"> </td>
    <td style="border: none;"> </td>
	  <td style="border: none;    float: right;">  Discount: <?php echo $getcarts['discount']; ?> % </td>
    <td style="border: none;"> </td>
  </tr>
  <?php } ?>
    <tr style="border: none;">
	<td style="border: none;">   Sales officer:RAJEEV RANJAN PANDEY</td>
	    <td style="border: none;"> </td>
    <td style="border: none;"> </td>
	  <td style="border: none;    float: right;"> Net Value : <?php echo $row['payable_amount']; ?></td>
    <td style="border: none;"> </td>
    
 
 
  </tr>
  
 
</table>
		 


</div>

 
  
<hr>
   
	     <P>Amoint in Word: <?php echo $num = convert_number_to_words($row['payable_amount']);?> </P>
	
	

<hr>



  

	     <P>Terms & Condition:1. Payment Should be made by RTGSTerms & Condition:1.
		 Terms & Condition:1. Payment Should be made by RTGSPayment Should be made by RTGSTerms & Condition:1. Payment Should be made by RTGS</P>

	
<div style="float:right;">For Nisroch Chemicals Private Limited </div>



  <table style="width:100%;border: none;">
        <tr style="border: none;">
	<td style="border: none;    padding: 0.25em;">Subject to Jurisdiction</td>
		<td style="border: none;    padding: 0.25em;">Anaparthi Jurisdiction</td>
			<td style="border: none;    padding: 0.25em;margin-left:20px;">Authorised Signatory</td>
	 
   
   
  
  </tr>
    
  </table>


	

	
	
<hr>



   <p><strong>Regd&Admn.Office: </strong>NH-30, Mahadev Asthan, Marcha-Marchi Road, Near Bypass Thana Patna City, Patna 800009.   <b>Email</b>:contact@plantcliniccentre.co.in</p>


 
 
</div>
<a href="<?php echo base_url('Billing'); ?>"><button>Close</button></a>
</div>
</body>
</html>
