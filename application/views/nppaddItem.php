<?php $id = $this->session->userdata('invoiceData'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>

<?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>
<div class="card-title">
                                      <h3 class="text-center">Billing</h3>
                                  </div>
								  
								  <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
									   <br>
<div class="col-lg-12">
                                     
                       
                
									   
									  <form action="<?php echo base_url('Billing/NPPdisplayItem/'); ?>" method="post" novalidate="novalidate">
									  <div class="row">
                                          <div class="col-4">
                                              <div class="form-group">
                                                  <select name="product" id="product" class="form-control-lg form-control abc">
													<option value="">Select Product</option>
													<?php foreach($editData as $row) { ?>
                                                                                                        <?php
                                                                                                        if(($row['bagqty'] <= 0) && ($row['caseqty'] <= 0) && ($row['drumqty'] <= 0) && ($row['customqty'] <= 0)){
                                                                                                            ?>
                                                                                                        <option style="background-color: #de7a65;" value="<?php echo $row['prod_id']; ?>">Stock Not Available | <?php echo $row['prod_name']; ?></option>
                                                                                                        <?php
                                                                                                        }else if(($row['bagqty'] <= 0) OR ($row['caseqty'] <= 0) OR ($row['drumqty'] <= 0) OR ($row['customqty'] <= 0)){
                                                                                                            ?>
                                                                                                        <option style="background-color: #de7a65;" value="<?php echo $row['prod_id']; ?>"><?php echo $row['bagqty']; ?> | <?php echo $row['caseqty']; ?> | <?php echo $row['drumqty']; ?> | <?php echo $row['customqty']; ?> | <?php echo $row['prod_name']; ?></option>
                                                                                                        <?php
                                                                                                        }else {
                                                                                                            ?>
                                                                                                        <option value="<?php echo $row['prod_id']; ?>"><?php echo $row['prod_name']; ?></option>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
														
													<?php } ?> 
												  </select>
                                                  
                                              </div>
                                          </div>
										  
<script type="text/javascript">
$(document).ready(function(){
    $("select.abc").change(function(){
        var prod_id = $(".abc option:selected").val();
		$.ajax({
				url : "<?php echo site_url('Billing/FetchUnit');?>",
				method : "POST",
				data:'prod_id='+prod_id,
				success: function(data){
					$('#unitdetails').html(data);
					//alert(data);
				}
			});
    });
});
</script>

                                          <div class="col-2">
                                              <div class="form-group">
                                                  <select name="qty1" id="unitdetails" class="form-control-lg form-control">
													
													
												  </select>
                                                  
                                              </div>
                                          </div>
										 
										 <?php foreach($gettax as $tax); ?>
										 
                                                  
													<?php if($tax['Billtaxtype'] == 'GST'){ ?>
													<input type="hidden" id="tax" name="tax" value="GST" class="form-control-lg form-control">
													
													<?php }else if($tax['Billtaxtype'] == 'IGST'){ ?>
													<input type="hidden" id="tax" name="tax" value="IGST" class="form-control-lg form-control">
													
													<?php } ?>
										  
										  <div class="col-2">
                                              <div class="form-group">
                                                  <input type="text" id="qty" name="qty" placeholder="Qty" class="form-control-lg form-control">
                                              </div>
                                          </div>
										  
										  <div class="col-2">
                                             
                                            <input type="submit" class="btn btn-info" name="bill" id="bill" value="bill"/>
                                               
                                    <?php $this->session->userdata('invoiceData'); ?>
                                               
                                          </div>
										  
										  
                                       </div>
									    </form>
										
										
									   <br>
	<form action="<?php echo base_url(); ?>Billing/update_billing/" method="post" novalidate="novalidate">								   
									   <div class="box box-primary">
  
            <div class="box-header">
              <h3 class="box-title"> <i class="fa fa-sitemap"></i> &nbsp; Details</h3>
            </div>
            <!-- /.box-header -->
            <div  class="table-responsive">
          
     <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>InvoiceId</th>
                  <th>Product Name</th>                  
                  <th>Quantity</th>  
                  <th>Price</th>				   
                  <th>Tax</th>
				  <th>Sub Total</th>
                  <th>Delete</th>  				  
                </tr>
                </thead>
                <tbody>
                

             <?php foreach($getcart as $cart) { ?> 

	<?php 

	$total = 0;
$items = 0;
   $count = count($getcart);
   $quantity = $cart['quantity'];
   $tax = $cart['base_price'] *  $cart['tax'] / 100;
   
   $base_price = $cart['base_price'] + $tax;
   $data[]=$price = $base_price * $quantity;
   $current_limit = $cart['current_limit'];
   $dist_id = $cart['Distributor_id'];
   $ptype = $cart['ProductType'];
   
?>	

                <tr class="success">
                <td><?php echo $cart['invoiceId']; ?></td>
                  <td><?php echo $cart['prod_name']; ?></b></td>
                  <td><?php echo $cart['quantity']; ?></td>
                   <td><?php echo $cart['base_price']; ?></td>
                   <td><?php echo $cart['tax']; ?> % </td>
				   <td><?php echo $price; ?></td>
				   <?php $gst1[]=$tax * $cart['quantity']; ?>
                 <td><a class="badge bg-red" onClick="return confirm('Are you sure want to delete this ?')" href="<?php echo base_url('Billing/NPPDeleteBill/'.$cart['cart_id']); ?>"><i class="fa fa-trash"></i> &nbsp; Delete</a></td>
                </tr>
              
			 <?php } ?>
              
                </tfoot>
              </table>
         
            </div>
            <!-- /.box-body -->
           
     
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php if(!empty($getcart)) { ?>	
 
	<div class="col-lg-12">
		<hr>
	</div>
	<div class="col-lg-12">
	<div class="col-lg-2">
	Discount    <input type="number" id="chDiscount" name="discount" class="form-control-lg form-control">
	</div>
		
 <div class="col-lg-2">
	GST   <input type="number" id="gstInput" name="gstInput" value="<?php echo array_sum($gst1); ?>" class="form-control-lg form-control">
	</div>
 
 
<?php 
$grandtotal = array_sum($data); 
   $cgst1 = $grandtotal * 5 / 100;
   $cgst = $grandtotal + $cgst1;
   
?>
<input type="hidden" name="grandtotal" id="grandtotal" value="<?php echo $grandtotal; ?>" />
<input type="hidden" name="gst" id="gst"  />

	
 
	<div class="col-lg-2">
 <label>Total</label>
<input type="text" name="payable_amount" id="tot_amount" class="form-control-lg form-control" readonly> 
<input type="hidden" name="current_limit" id="current_limit" class="form-control-lg form-control" value="<?php echo $current_limit; ?>">
<input type="hidden" name="dist_id" id="dist_id" class="form-control-lg form-control" value="<?php echo $dist_id; ?>">
<input type="hidden" name="ptype" id="ptype" class="form-control-lg form-control" value="<?php echo $ptype; ?>">
<input type="hidden" name="totallimit" id="totallimit" class="form-control-lg form-control" value="<?php echo $ptype; ?>">
 </div>
 
 <div class="col-lg-2">
 

 </div>
 
 <script>
function calculateAmount(val)
{ 
var price = val * 1;
//display the result
var tot_price=price;
var divobj = document.getElementById('tot_amount');
divobj.value = tot_price;
}
</script>

<div class="col-lg-2">
		 
 </div>
  		

 </div>
	
	
									   <?php //print_r($getcart); ?>
									   
                                    
                                 
                              
                    <!-- .card -->

                  </div>


 <div class="col-lg-6" id="pay_button">
 &nbsp;
	    &nbsp;
	  &nbsp;
	    &nbsp;
                                          <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                              <i class="fa fa-lock fa-lg"></i>&nbsp;
                                              <span id="payment-button-amount">Pay Now</span>
                                              <span id="payment-button-sending" style="display:none;">Sending…</span>
                                          </button>
										  <span id="showing" style="color:red;"><b>Your total amount is exceed from current limit</b></span>
                                      </div>
									  
</form>

<input type="hidden" id="result">

<script>
$(function(){
    $('#showing').hide();
});

$(document).on("change keyup blur", "#chDiscount", function() {
var current_limit = $('#current_limit').val();

var main = <?php echo $grandtotal; ?>;
var disc = $('#chDiscount').val();
var dec = (disc/100).toFixed(2); //its convert 10 into 0.10
var mult = main*dec; // gives the value for subtract from main value

var discont = main-mult;
//alert(discont);
$('#tot_amount').val(discont);
$('#result').val(discont);
if(discont > current_limit){
	$('#payment-button').hide();
	$('#showing').show();	
}else{
	$('#showing').hide();
}
});
</script>
<script>
$(document).on("change keyup blur", "#gstInput", function() {
	
var main = $('#result').val();
var current_limit = $('#current_limit').val();
var disc = $('#gstInput').val();
var dec = (disc/100).toFixed(2); //its convert 10 into 0.10

var mult = main*dec; // gives the value for subtract from main value

var discont = (+main)+(+mult);

$('#tot_amount').val(discont);

if(discont > current_limit){
	$('#payment-button').hide();
	$('#showing').show();	
}else{
	$('#showing').hide();
}

});
</script>

<?php } ?>

<?php } else { ?>
				  
				  <?php redirect(base_url('AdminPanel')); ?>
				  
				  <?php } ?>
