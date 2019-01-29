 <?php $Loginid = $this->session->userdata('ID');?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
 <?php if (!empty($Loginid)){ ?>
<div class="card-title">
                                      <h3 class="text-center">Billing</h3>
                                  </div>
								  
								  <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
									   <br>
<div class="col-lg-12">        
                                     
                                      <form action="<?php echo base_url('Billing/InvoiceGenerate/'); ?>" method="post" novalidate="novalidate">
                                      
                                      <div class="row">
                                          <div class="col-3">
                                              <div class="form-group">
                                                  <label for="cc-exp" class="control-label mb-1">Invoice Id.</label>
                                                  <input id="Invoice" name="Invoice" type="text" class="form-control cc-exp" value="NCP/A-<?php echo count($bill); ?>" >
                                                  
                                              </div>
                                          </div>
                                          <div class="col-3">
                                              <label for="x_card_code" class="control-label mb-1">Date</label>
                                              <div class="input-group">
                                                  <input id="date" name="date" type="text" class="form-control cc-cvc" value="" placeholder="YYYY-MM-DD" >
                                                  
                                              </div>
                                          </div>
										  
										   <div class="col-3">
                                              <label for="x_card_code" class="control-label mb-1">Tax Type</label>
                                              <select name="taxType" id="taxType" class="form-control" required>
												
												<option value="">Select Tax</option>
													<option value="GST">CGST + SGST</option>
													<option value="IGST">IGST</option>
											  </select>
											  <br>
                                          </div>
										  
										  <div class="col-3">
                                              <label for="x_card_code" class="control-label mb-1">Product Type</label>
                                              <select name="ProductType" id="ProductType" class="form-control" required>
												
												<option value="">Select Product Type</option>
												<option value="NPP">NPP</option>
												<option value="NBP">NBP</option>
											  </select>
											  <br>
                                          </div>
<div class="col-3">
                                              <label for="x_card_code" class="control-label mb-1">Transport</label>
                                              <select name="transportType" id="transportType" class="form-control" required>
												
												<option value="">Select Transport</option>
                                                                                                <?php
                                                                                                if(!empty($transport)){
                                                                                                    foreach($transport as $transportrow){
                                                                                                        ?>
                                                                                                <option value="<?php echo $transportrow["name"]; ?>"><?php echo $transportrow["name"]; ?></option>
                                                                                                <?php
                                                                                                    }
                                                                                                }
                                                                                                ?>
												
												
											  </select>
											  <br>
                                          </div>

										  
										  <div class="col-3">
                                             <label for="x_card_code" class="control-label mb-1">Distributor</label>
                                              <select name="Distributor" id="Distributor" class="form-control abc" required>
												
												<option value="">Select Distributor</option>
												<?php foreach($distributorlist as $distributorlists){ ?>
												<option value="<?php echo $distributorlists['dist_id']; ?>"><?php echo $distributorlists['name']; ?> | <?php echo $distributorlists['bcode']; ?></option>
												<?php } ?>
											  </select>
                                          </div>
										  
<script type="text/javascript">
$(document).ready(function(){
    $("select.abc").change(function(){
        var dist_id = $(".abc option:selected").val();
		//alert(dist_id);
		$.ajax({
				url : "<?php echo site_url('Billing/DLimit');?>",
				method : "POST",
				data:'dist_id='+dist_id,
				success: function(data){
					$('#limit').html(data);
					//alert(data);
				}
			});
    });
});
</script>



										  
										  
										  <div id="limit"></div>
										  
										
										  
                                       </div>
									   <br>
									   
									   <div class="row">
                                          <div class="col-6">
										  <input type="submit" class="btn btn-info" name="bill" id="bill" value="Generate Bill"/>
										 </div>
                                       </div>
									   
									   
									   </form>
									   
									   
									   <br>
									   <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
									  <br>
									  
										
									
									  
									   
                                     
                              
                    <!-- .card -->

                  </div>
				  <?php } else { ?>
				  
				  <?php redirect(base_url('AdminPanel')); ?>
				  
				  <?php } ?>