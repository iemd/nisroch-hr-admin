
<?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="<?php echo base_url('invoice_css/style.css'); ?>" media="all" />
	
  </head>
  <body>
    <header>
      
      <div>
        <center><h1><i>Angeethi Cafe</i></h1></center>
		<center><div>A Unit of Angeethi Hospitality</div></center>
        <center><div>Opp. Bijli Office, Raghopur Bihta, Patna – 800103. Bihar</div></center>
        <center><div> 07970520234; 06203675874</div></center>
		<center><div> www.angeethicafe.in</div></center>
        
      </div>
      </div>
    </header>
	<?php foreach($getcart as $invoice){
		
   $count = 0;
	}	?>
	<?php 
	
   //echo $data[]=$total = $price - $subtotal;
	//$grandtotal = array_sum($data); ?>
    <main>
	<br>
	<table>
  <tr>
    <td>Invoice No. <b><?php echo $invoice['Invoice']; ?></b></td>
    <td>Time: <?php date_default_timezone_set('Asia/Kolkata');
echo date('h:i A'); ?></center></td>
	<td align="right">Date: <?php echo date("d/m/y"); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>Customer Name: <?php echo $invoice['Name']; ?></td>
    <td></td>
	<td align="right">Mobile: <?php echo $invoice['Mobile']; ?></td>
  </tr>
  
</table>

<br>
      
      <table border="1" class="table">
        <thead>
          <tr>
            
            <th >DESCRIPTION</th>
			
            <th >UNIT PRICE</th>
			
			
            <th >QUANTITY</th>
			<th >DISCOUNT</th>
			
            <th >TOTAL</th>
          </tr>
        </thead>
        <tbody>
		
		<?php foreach($getcart as $invoice) { ?>
		<?php
		$total = 0;
$items = 0;

	//$count = count($getcart);
	$count+=1;
   $quantity = $invoice['quantity'];
   $base_price = $invoice['base_price'];
   $price = $base_price * $quantity;
   $discount =  $invoice['discount'];
   $subtotal = $price * $discount / 100;
   $data[]=$total = $price - $subtotal;
   
  ?>        <tr>
            <!--<td ><?php echo $count; ?></td>-->
            <td ><center><h4><?php echo $invoice['prod_name']; ?></h4></center></td>
			
            <td ><center><?php echo $invoice['base_price']; ?></center></td>
            <td ><center><?php echo $invoice['quantity']; ?></center></td>
			
            <td ><center><?php echo $invoice['discount']; ?> %</center></td>
			 <td><center><?php echo $total; ?></center></td>
          </tr>
		<?php } ?>
         
        </tbody>
        <tfoot>
		<?php $grandtotal = array_sum($data);
		 $grantTotal = $grandtotal * 5 / 100;
		 $final = $grandtotal + $grantTotal;
		
		?>
          <tr>
		  
            <td class="hide_all" colspan="2"></td>
            <td colspan="2"><center><h4>SUBTOTAL</h4></center></td>
            <td><center>Rs. <?php echo $grandtotal = array_sum($data);?></center></td>
          </tr>
          <tr>
		  
            <td class="hide_all"colspan="2"></td>
            <td colspan="2"><center><h4>CGST</h4></center></td>
            <td><center>2.5 % <center></td>
          </tr>
		  <tr>
		  
            <td class="hide_all"colspan="2"></td>
            <td colspan="2"><center><h4>SGST</h4></center></td>
            <td><center>2.5 % <center></td>
          </tr>
          <tr>
		  
            <td class="hide_all" colspan="2"></td>
            <td  class="noBorder" colspan="2"><center><h4>GRAND TOTAL</h4></center></td>
            <td><center><b>Rs. <?php echo $final;?></b></center></td>
          </tr>
        </tfoot>
      </table>
	  <!---------------------->
	  
	  <div><b>Total Amount:</b> <?php echo $num = convert_number_to_words($final);
	  ?></div>
	  <br><br>
	  
	  <!--------------------->
      <div><b>Term & Condition</b></div>
      <div id="notices">
        <ul>
  <li>All Subjects to "PATNA" Jurisdiction Only.</li>
  <li>The Invoice shows the actual price to be charged</li>
  
</ul>
        
      </div>
	  
	  <div><b>Thank You for your visiting Angeethicafe.</b></div>
	  <div><b>Have a Nice Day !!</b></div>
	  <br><br><br>
	  <table class="table">
  <tr>
    <td>contact@angeethicafe.in</td>
    <td></td>
	<td><center>Signature</center></td>
  </tr>
  
  
</table>
    </main>
    
  </body>
</html>
<?php } else { ?>
				  
				  <?php redirect(base_url('AdminPanel')); ?>
				  
				  <?php } ?>