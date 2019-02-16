 <?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>
       <?php foreach($vieworder as $row){ } $bill_id = $row['bill_id'];$taxtype = $row['Billtaxtype'];$transportType = $row['transportType'];$order_status = $row['order_status'];$discount = $row['discount']; ?>
        <!-- Header-->
        <div class="content mt-6">
            <div class="animated fadeIn">
                <div class="row">
                 <form action="<?php echo base_url('OrderRequest/approveOrder/'.$row['bill_id']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="col-lg-12">
                    <div class="card" style="background-color:#95ecd4;">
                      <div class="card-header">
                        <strong>APPROVE ORDER</strong>
						              <h4 style="color:green;"><?php echo $this->session->flashdata('message'); ?></h4>
                      </div>
                      <div class="card-body card-block">
                          <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Order ID</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="Invoice" name="Invoice" value="<?php echo $row['Invoice']; ?>" placeholder="Invoice ID" class="form-control"></div>
                          </div>
						          <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Date</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="date" name="date" value="<?php echo $row['date']; ?>" placeholder="Date" class="form-control" required=""></div>
                      </div>
                      <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Product Type</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="ProductType" name="ProductType" value="<?php echo $row['ProductType']; ?>" placeholder="Product Type" class="form-control" required=""></div>
                      </div>
                      <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Dist. Name | Limit</label></div>
                            <div class="col-12 col-md-4"><input type="text" id="Distributor_id" name="Distributor_id" value="<?php echo $row['name']; ?>" placeholder="Distributor Name" class="form-control" required=""></div>
                            <div class="col-12 col-md-4"><input type="text" id="current_limit" name="current_limit" value="<?php echo $row['current_limit']; ?>" placeholder="Current Limit" class="form-control" required=""></div>
                      </div>
                      <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Mobile No.</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="number" name="number" value="<?php echo $row['number']; ?>" placeholder="Mobile No." class="form-control" required=""></div>
                      </div>
                      <div class="progress mb-2" style="height: 3px;">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class='table-responsive'><!--cart products-->
                      <h4 style="color:green;" id="message"></h4><br/>
                  		<table id='example1' class='table table-bordered table-striped'>
                  					<thead>
                  						<tr>
                  						<th>Product Name</th>
                  						<th>Qty</th>
                              <th>Price</th>
                              <th>Action</th>
                  						</tr>
                            </thead>
                          	<tbody>
                              <?php $prod_type = $row['ProductType']; $selected = $readonly = '';$subtotal=0; ?>
                              <?php foreach($getcart as $product){ ?>
                              <tr id="cartproduct" class='success'>
                      				  <td>
                                  <select name="productList[]" id="productList" class="form-control"  <?php if($order_status == 1){echo"disabled";}else{echo "required";} ?>>
                                    <option  value="">Select&nbsp;<?php echo $prod_type; ?>&nbsp;Product</option>
                                    <?php foreach($productlist as $row) {
                                      if($product['prod_id'] == $row['prod_id']){$selected = 'selected';}
                                      $ProdID = $row['prod_id'];
                                      $ProdName = $row['prod_name'];
                                      $bagqty = $row['bagqty'];
                                      $caseqty = $row['caseqty'];
                                      $drumqty = $row['drumqty'];
                                      $customqty = $row['customqty'];
                                      if(($bagqty <= 0) && ($caseqty <= 0) && ($drumqty <= 0) && ($customqty <= 0)){
                                          echo "<option style='background-color: #de7a65;' value='$ProdID' $selected>Stock Not Available | $ProdName</option>";
                                      }else if(($bagqty <= 0) OR ($caseqty <= 0) OR ($drumqty <= 0) OR ($customqty <= 0)){
                                          echo "<option style='background-color: #de7a65;' value='$ProdID' $selected>$bagqty | $ProdName</option>";
                                      }
                                      else{
                                        echo "<option value='$ProdID' $selected>$ProdName</option>";
                                      }
                                        $selected = '';
                                      }
                                    ?>
                                  </select>
                               </td>
                      					<td><input type="text" id="qty" name="qty[]" value="<?php echo $product['quantity']; ?>" size="1" maxlength="2"  class="form-control" <?php if($order_status == 1){echo"readonly";}else{echo "required";} ?>></td>
                                <td><?php echo $product['base_price']; ?></td>

                                <td><div id="delete-btn">
                                  <i class="fa fa-check" style="font-size:18px;color:green"></i>&nbsp;
                                  <?php if($order_status == 1){}else{ ?>
                                  <button type='button' id='delete' class='btn btn-danger btn-sm btnDelete'><i class='fa fa-trash'></i></button>
                                <?php } ?>
                                </div>
                              </td>
                      				</tr>
                              <?php $subtotal +=$product['base_price']*$product['quantity'];  ?>
                            <?php  } ?>

                        </tbody>
                        <tfoot>
                          <tr>
                            <td style="border:none;"><span id="showing" style="color:red;"><b>Your total amount is exceed from current limit</b></span></td>
                            <td style="border:none;"><strong>Sub Total</strong></td>
                            <td style="border:none;"><strong id="subtotal"><?php echo $subtotal; ?></strong></td>
                            <td style="border:none;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="border:none;">
                              <?php if($order_status == 1){}else{ ?>
                              <button type="button" style="background-color:green" id="add-product" class="btn btn-primary btn-sm add-product">
                            <i class="fa fa-plus-circle"></i>&nbsp;Add Products
                          </button>
                        <?php } ?>
                        </td>
                            <td colspan="3" style="text-align:right;border:none;">
                              <?php if($order_status == 1){}else{ ?>
                              <button type="button" id="update-cart" class="btn btn-primary btn-sm">
                              <i class="fa fa-dot-circle-o"></i>&nbsp;Update
                            </button>
                          <?php } ?>
                          </td>
                          </tr>
                        </tfoot>
                      </table >
                      </div><!--cart products-->
                      <?php
                            foreach($getcart as $cart) {
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
                               $gst1[]=$tax * $cart['quantity'];
                            }
                      ?>
                      <div class="progress mb-2" style="height: 3px;">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>

                      <div class="row form-group">
                             <input type="hidden" name="grandtotal" id="grandtotal" value="<?php echo $subtotal; ?>" />
                             <input type="hidden" name="gst" id="gst"  />
                            <div class="col-12 col-md-4"><label for="text-input" class=" form-control-label">Discount</label><input type="number" id="chDiscount" name="discount" value="<?php if($order_status == 1){echo $discount;} ?>" placeholder="Discount" class="form-control" <?php if($order_status == 1){echo "readonly";} ?>></div>
                            <div class="col-12 col-md-4"><label for="text-input" class=" form-control-label">GST</label><input type="number" id="gstInput" name="gstInput" value="<?php echo array_sum($gst1); ?>" class="form-control" readonly></div>
                            <div class="col-12 col-md-4"><label for="text-input" class=" form-control-label">Total</label><input type="text" name="payable_amount" id="tot_amount" value="<?php echo array_sum($gst1)+$subtotal; ?>" class="form-control" readonly=""></div>
                      </div>
                      <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Tax Type</label></div>
                            <div class="col-12 col-md-8">
                            <select name="taxType" id="taxType" class="form-control" <?php if($order_status == 1){echo"disabled";}else{echo "required";} ?>>
															<option value="">Select Tax</option>
      													<option value="GST" <?php if($taxtype == "GST"){echo "selected";} ?>>CGST + SGST</option>
      													<option value="IGST" <?php if($taxtype == "IGST"){echo "selected";} ?>>IGST</option>
      											  </select>
                            </div>
                      </div>
                      <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Transport</label></div>
                              <div class="col-12 col-md-8">
                                <select name="transportType" id="transportType" class="form-control" <?php if($order_status == 1){echo"disabled";}else{echo "required";} ?> >
                                    <option value="">Select Transport</option>
                                        <?php
                                            if(!empty($transport)){
                                                foreach($transport as $transportrow){
                                                    ?>
                                                    <option value="<?php echo $transportrow["name"]; ?>" <?php if($transportType == $transportrow["name"]){echo "selected";} ?>><?php echo $transportrow["name"]; ?></option>
                                                      <?php
                                                      }
                                              }
                                          ?>
                              </select>
                            </div>
                      </div>
                      <div class="card-footer" style="background-color:#95ecd4;">
                        <?php if($order_status == 1){}else{ ?>
        								<button type="submit" id="payment-button" class="btn btn-primary btn-sm">
        								  <i class="fa fa-dot-circle-o"></i> Approve Order
        								</button>
                      <?php } ?>
                        <a class="btn btn-danger btn-sm" href="<?php echo base_url('OrderRequest'); ?>">Cancel</a>
        							  </div>
                              </div>
                            </div>
                          </div>
                         </form>
                    </div><!-- .animated -->
                </div><!-- .content -->
            </div><!-- /#right-panel -->
            <!-- Right Panel -->
        <?php } else { ?>

        				  <?php redirect(base_url('AdminPanel')); ?>

        				  <?php } ?>

                  <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js'); ?>"></script>
                  <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
                  <script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>
                  <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {

      jQuery("#add-product").click(function() {

        var clone = jQuery("#cartproduct").first().clone();
        //clone.find("#productList").attr("required","");
        clone.find("#delete-btn").html("<button type='button' id='delete' class='btn btn-danger btn-sm btnDelete'><i class='fa fa-trash'></i></button>");
        jQuery('#example1  tbody:last').append(clone);

      });
      jQuery("#example1").on('click', '.btnDelete', function () {
          jQuery(this).closest('tr').remove();
      });

  });
  </script>
  <script type="text/javascript">
  jQuery(document).ready(function(){
     jQuery("#update-cart").click(function() {
      var cart =  jQuery("select[name='productList[]']").map(function(){return  jQuery(this).val();}).get();
      var quantity =  jQuery("input[name='qty[]']").map(function(){return  jQuery(this).val();}).get();
      var bill_id = "<?php echo $bill_id; ?>";
  		//alert(bill_id);
  		jQuery.ajax({
  				url : "<?php echo site_url('OrderRequest/updateCart');?>",
  				method : "POST",
  				data: {bill_id: bill_id, cart: cart, quantity: quantity},
  				success: function(data){
              //alert(data);
              //var splitted = data.split("|");
              //jQuery('#message').html(splitted[0]);
              //jQuery('#message').html(splitted[1]);
              jQuery('#message').html(data);
              window.location.replace("<?php echo base_url('OrderRequest/viewOrder/').$bill_id; ?>");
  				}
  			});
      });
  });
  </script>
  <script>
  jQuery( function() {
    jQuery( "#taxType" ).on('change', function() {
        //alert( this.value );
        var taxtype = jQuery( "#taxType" ).val();
        var bill_id = "<?php echo $bill_id; ?>";
        //alert(bill_id);
        jQuery.ajax({
            url : "<?php echo site_url('OrderRequest/updateBilltaxtype');?>",
            method : "POST",
            data: {bill_id: bill_id, taxtype: taxtype},
            success: function(data){
                //alert(data);
                var subtotal = "<?php echo $subtotal; ?>";
                var tot_amount = parseFloat(subtotal)+parseFloat(data);
                var current_limit = jQuery('#current_limit').val();
                jQuery( "#gstInput").val(data);
                jQuery( "#tot_amount").val(tot_amount);
                if(tot_amount > current_limit){
                  jQuery('#showing').show();
                  jQuery('#add-product').hide();
                  jQuery('#payment-button').hide();
                }else{
                  jQuery('#showing').hide();
                  jQuery('#add-product').show();
                  jQuery('#payment-button').show();
                }
                //window.location.replace("<?php //echo base_url('OrderRequest/viewOrder/').$bill_id; ?>");
            }
          });
     });
  } );

  jQuery( function() {
    jQuery( "#transportType" ).on('change', function() {
        //alert( this.value );
        var transporttype = jQuery( "#transportType" ).val();
        var bill_id = "<?php echo $bill_id; ?>";
        //alert(bill_id);
        jQuery.ajax({
            url : "<?php echo site_url('OrderRequest/updateTransportType');?>",
            method : "POST",
            data: {bill_id: bill_id, transporttype: transporttype},
            success: function(data){
                //alert(data);

                window.location.replace("<?php echo base_url('OrderRequest/viewOrder/').$bill_id; ?>");
            }
          });
     });
  } );
</script>
<script type="text/javascript">
jQuery(document).ready(function(){
  var current_limit = jQuery('#current_limit').val();
  var main = <?php echo $subtotal; ?>; //grandtotal
  var disc = jQuery('#chDiscount').val();
  var dec = (disc/100).toFixed(2); //its convert 10 into 0.10
  var mult = main*dec; // gives the value for subtract from main value (subtotal)
  var discont = main-mult;
  //alert(discont);
  jQuery('#tot_amount').val(discont);
  if(discont > current_limit){
    jQuery('#showing').show();
    jQuery('#add-product').hide();
    jQuery('#payment-button').hide();
  }else{
    jQuery('#showing').hide();
    jQuery('#add-product').show();
    jQuery('#payment-button').show();

  }
  jQuery("#chDiscount").on("change paste keyup blur", function() {
    var current_limit = jQuery('#current_limit').val();
    var main = <?php echo $subtotal; ?>; //grandtotal
    var disc = jQuery('#chDiscount').val();
    var dec = (disc/100).toFixed(2); //its convert 10 into 0.10
    var mult = main*dec; // gives the value for subtract from main value (subtotal)
    var discont = main-mult;
    //alert(discont);
    jQuery('#tot_amount').val(discont);
    if(discont > current_limit){
    	jQuery('#showing').show();
      jQuery('#add-product').hide();
      jQuery('#payment-button').hide();
    }else{
    	jQuery('#showing').hide();
      jQuery('#add-product').show();
      jQuery('#payment-button').show();

    }
  });
});
</script>
</body>
</html>
