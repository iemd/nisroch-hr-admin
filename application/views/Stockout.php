<?php $id = $this->session->userdata('invoiceData'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>



<?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>
<div class="card-title">
                                      <h3 class="text-center">Stock Out</h3>
                                  </div>
								  
								  <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
									   <br>
<div class="col-lg-12">
                                     
                 <?php 
foreach($getEditUser as $row){
	
}

?>				 
                
									   
									  <form action="<?php echo base_url(); ?>Inventory/stockOutUpdate/<?php echo $row['inv_id']; ?>" method="post" novalidate="novalidate">
                                      
                                      <div class="row">
                                          <div class="col-6">
                                              <div class="form-group">
                                                  <label for="cc-exp" class="control-label mb-1">Product Name</label>
                                                  <input id="pname" name="pname" type="text" class="form-control cc-exp" value="<?php echo $row['pname']; ?>" readonly>
                                                  
                                              </div>
                                          </div>
                                          <div class="col-6">
                                              <label for="x_card_code" class="control-label mb-1">Available Quantity</label>
                                              <div class="input-group">
                                                  <input id="text" name="qty" type="qty" class="form-control cc-cvc" value="<?php echo $row['qty']; ?>" readonly>
                                                  
                                              </div>
                                          </div>
										  
										  <div class="col-6">
                                              <div class="form-group">
                                                  <label for="cc-exp" class="control-label mb-1">withdraw Quantity</label>
                                                  <input id="wqty" name="wqty" type="text" class="form-control cc-exp" value="" required>
                                                  
                                              </div>
                                          </div>
										  
										  <div class="col-6">
                                              <label for="x_card_code" class="control-label mb-1">Unit</label>
                                              <div class="input-group">
                                                  <input id="unit" name="unit" type="text" class="form-control cc-cvc" value="<?php echo $row['unit']; ?>" required readonly>
                                                  
                                              </div>
                                          </div>
										  
										  <div class="col-6">
                                              <div class="form-group">
                                                  <!--<label for="cc-exp" class="control-label mb-1">Price</label>-->
                                                  <input id="price" name="price" type="hidden" class="form-control cc-exp" value="<?php echo $row['price']; ?>" required>
                                                  
                                              </div>
                                          </div>
										   
                                       </div>
									   
									   <div class="row">
                                          <div class="col-6">
										  <input type="submit" class="btn btn-info" name="bill" id="bill" value="Stock Out"/>
										 </div>
                                       </div>
									   </form>
										
										
									  


<?php } else { ?>
				  
				  <?php redirect(base_url('AdminPanel')); ?>
				  
				  <?php } ?>
				  
				  
				  <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
