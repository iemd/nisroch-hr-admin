
<?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    
  </head>
  <body>
   
      
     <table align="center" style="width:290px">
	<tr align="center"><td><B><u>ANGEETHI</u></B></td></tr>
	<tr align="center" style="font-size:13px; font-style:italic"><td>A Unit of Angeethi Hospitality</td></tr>
	<tr align="center" style="font-size:13px"><td>Address : Opp. Bijli Office, Raghopur Bihta, Patna - 800103. Bihar</td></tr>
	<tr align="center" style="font-size:13px"><td>Contact : 07070520234/06203675874/7763999400</td></tr>
	<tr align="center" style="font-size:13px"><td>www.angeethicafe.in</td></tr>
	<tr align="center" style="font-size:13px"><td>GSTIN : 10ABDFA5728R1ZA</td></tr>	
	</table> 
    
  
	<?php foreach($getcart as $invoice){
		
   $count = 0;
	}	?>

		<table align="center" style="width:290px">
	<tr>
    <td><hr></td></tr>
	</table>
	
	
	<table align="center" style="width:290px">
    <tr>
    <td>BILL NO. : <?php echo $invoice['Invoice']; ?> </td>
	</tr>
	<tr>
    <td>TIME:  <?php date_default_timezone_set('Asia/Kolkata');
echo date('h:i A'); ?> </td>        
	<td>DATE:  <?php echo date("d/m/y"); ?> </td>  
    </tr>	
    <tr>
    <td>Name:<?php echo $invoice['Name']; ?> </td>
	</tr>
	<tr>    
	<td>Mobile: <?php echo $invoice['Mobile']; ?> </td>
    </tr>	  
    </table>


      
      <table align="center" style="width:290px">
	<tr>
    <td><hr></td></tr>
	</table>
      
      <table align="center" style="width:290px">       
          <tr>            
            <td><b>ITEM</b></td>			
            <td><b>RATE</b></td>
            <td><b>QTY</b></td>			
            <td><b>AMOUNT</b></td>
          </tr>
		  
	
		<?php foreach($getcart as $invoice) { ?>
		<?php
		$total = 0;
$items = 0;

	//$count = count($getcart);
	$count+=1;
   $quantity = $invoice['quantity'];
   $base_price = $invoice['base_price'];
   $price = $base_price * $quantity;  
   $data[]=$total = $price;
   
  ?>        <tr>
            <!--<td ><?php echo $count; ?></td>-->
            <td ><?php echo $invoice['prod_name']; ?></td>
			
            <td ><?php echo $invoice['base_price']; ?></td>
            <td ><?php echo $invoice['quantity']; ?></td>
			
           
			 <td><?php echo $total; ?></td>
          </tr>
		<?php } ?>
         
       </table>
       
       
       
       
       
       
       
		<?php $grandtotal = array_sum($data);
		 $grandtotal1 = $grandtotal - ($grandtotal * $invoice['discount']/100);
		 $grantTotal = $grandtotal1 * 5 / 100;
		 $gst = $grantTotal / 2;
		 $final = $grandtotal1 + $grantTotal;
		
		?>
		
		
		 <table align="center" style="width:290px">
	<tr>
    <td><hr></td></tr>
	</table>      
        <table align="center" style="width:290px">
		
          <tr>
            <td>SUBTOTAL</td>
			<td> &nbsp; </td>
			<td> &nbsp; </td>
            <td>Rs.<?php echo $grandtotal = array_sum($data);?> </td>
          </tr> 
		  <?php if($invoice['discount'] > 0){ ?>
		   <tr>	
            <td>DISCOUNT</td>
			<td> &nbsp; </td>
			<td> &nbsp; </td>
		   <td><?php echo $invoice['discount']; ?> %</td>
		  </tr>
		  <?php } ?>
		   <tr>
            <td>CGST 2.5%</td>
			<td> &nbsp; </td>
			<td> &nbsp; </td>
            <td><?php echo $gst; ?></td>
          </tr>
		  <tr>
            <td>SGST 2.5%</td>
			<td> &nbsp; </td>
			<td> &nbsp; </td>
            <td><?php echo $gst; ?></td>
          </tr>
		  
		  </table>
		  <table align="center" style="width:290px">
	<tr>
    <td><hr></td></tr>
	</table>
		<table align="center" style="width:290px">  
          <tr>
		  <td>GRAND TOTAL</td>
          <td>Rs.<?php echo $final;?> </td>
          </tr>
        
      </table>
	 <table align="center" style="width:290px">
	<tr>
    <td><hr></td></tr>
	</table>
	  
	  
	 <table align="center" style="width:290px">
	  <tr style="font-size:13px"><td><b>Total Amount: <?php echo $num = convert_number_to_words($final);
	  ?></b></td></tr>
	  </table>
	  
	 <table align="center" style="width:290px">
	<tr>
    <td><hr></td></tr>
	</table>
      <table align="center" style="width:290px">
	  <tr align="center"><td><b>Term & Condition</b></td></tr>
       <tr style="font-size:13px"><td>1.All Subjects to "PATNA" Jurisdiction Only.</td></tr>
        <tr style="font-size:13px"><td>2.The Invoice shows the actual price to be charged</td></tr>
      </table>
	  <table align="center" style="width:290px">
	<tr>
    <td><hr></td></tr>
	</table>
	  <table align="center" style="width:290px">
	  <tr align="center" style="font-size:15px"><td>Thank You for your visiting Angeethicafe !!</td></tr>
	  </table>
	  
	  <table align="center" style="width:290px">
	<tr>
    <td><hr></td></tr>
	</table>
	  <table align="center" style="width:290px">
       
	   <tr height="60px">
	   <td> &nbsp; </td>
	   </tr> 
	    <tr style="font-size:14px">    
	  <td>contact@angeethicafe.in</td><td><center>Signature</center></td>
	  
      </tr>
     </table>
	 <table align="center" style="width:290px">
	<tr>
    <td><hr></td></tr>
	</table>
	 <style>
	 hr {border-style: dotted;}
	 </style>
     <table align="center" style="width:290px">
	<tr align="center" style="font-size:13px"><td><button id="printPageButton" onClick="window.print()">Print</button><button id="printPageButton" >Delete</button><a href="<?php echo base_url('AdminPanel/Dasboard/'); ?>"><button id="printPageButton">CLose</button></a></td></tr>
		
	</table> 
    <style>
	@media print {
  #printPageButton {
    display: none;
  }
}
	</style>
  </body>
</html>
<?php } else { ?>
				  
				  <?php redirect(base_url('AdminPanel')); ?>
				  
				  <?php } ?>