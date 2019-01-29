<?php foreach($editdistributor as $row){ } ?>
<?php foreach($debitList as $debitLists){ } ?>
   <?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>
        <!-- Header-->
<?php //print_r($row); ?>
        <div class="content mt-6">
            <div class="animated fadeIn">
                <div class="row">
            
                 <form action="<?php echo base_url('distributor/UpdateCredit/'.$row['bill_id']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal"><form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                  <div class="col-lg-12">
                    <div class="card" style="background-color:#95ecd4;">
                      <div class="card-header">
                        <strong>Credit</strong>
						<h4 style="color:green;"><?php echo $this->session->flashdata('message'); ?></h4>
                      </div>
                      <div class="card-body card-block">
                        
                         
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" value="<?php echo $row['name']; ?>" class="form-control" readonly></div>
                          </div>
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Buyer Code</label></div>
                            <div class="col-12 col-md-9"><input type="text" value="<?php echo $row['bcode']; ?>" class="form-control" readonly></div>
                          </div>
						   
                         
						   <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email Id</label></div>
                            <div class="col-12 col-md-9"><input type="text" value="<?php echo $row['email']; ?>" class="form-control" readonly></div>
                          </div> 
						  
						  
						   <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Contact Number</label></div>
                            <div class="col-12 col-md-9"><input type="number" value="<?php echo $row['number']; ?>" class="form-control" readonly></div>
                          </div> 
						<?php 
						date_default_timezone_set('Asia/Kolkata');
						
						?>
							
						<div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date | Time | Dist Id</label></div>
                            <div class="col-12 col-md-3"><input type="text" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" readonly></div>
							<div class="col-12 col-md-3"><input type="text" id="time" name="time" value="<?php echo date('H:i A'); ?>" class="form-control" readonly></div>
							<div class="col-12 col-md-3"><input type="text" id="Distributor_id" name="Distributor_id" value="<?php echo $row['Distributor_id']; ?>" class="form-control" readonly></div>
                          </div>
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Present NPP | NBP Limit</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="currnpplimit" name="currnpplimit" value="<?php echo $row['currentNpp']; ?>" class="form-control" readonly></div>
							<div class="col-12 col-md-4"><input type="text" id="currnbplimit" name="currnbplimit" value="<?php echo $row['currentNbp']; ?>" class="form-control" readonly></div>
							<input type="hidden" id="userbalance" name="userbalance" value="<?php echo $debitLists['user_balance']; ?>" class="form-control" readonly>
                          </div>
						  
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Add Credit</label></div>
							<?php if($row['ProductType'] == 'NPP'){ ?>
                            <div class="col-12 col-md-5"><input type="text" id="npp" name="addnppcredit" Placeholder="Add NPP Credit" class="form-control"></div>
							<?php }else if($row['ProductType'] == 'NBP'){ ?>
							<div class="col-12 col-md-5"><input type="text" id="nbp" name="addnbpcredit" Placeholder="Add NBP Credit" class="form-control"></div>
							<?php } ?>
							<div class="col-12 col-md-2"><input type="number" id="Discount" name="Discount" Placeholder="Enter Discount in %" class="form-control"></div>
							<div class="col-12 col-md-2">
							<select name="paymentType" id="paymentType" class="form-control">
                               
                                <option value="Cash">Cash</option>
								<option value="Cheque">Cheque</option>
								<option value="NEFT">NEFT</option>
								<option value="RIGS">RIGS</option>
                              </select>
							</div>
                          </div>
						  
						   <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Remark | Discount</label></div>
                            <div class="col-12 col-md-9">
							<input type="text" id="Remark" name="Remark" Placeholder="Enter Remarks" class="form-control">
							<input type="hidden" id="inv" name="inv" value="<?php echo $row['Invoice']; ?>" class="form-control">
							</div>
							
							
                          </div>
						  
						 
						  
						  
						  
						  <div class="card-footer" style="background-color:#95ecd4;">
							
								<button type="submit" class="btn btn-primary btn-sm">
								  <i class="fa fa-dot-circle-o"></i> Update Credit
								</button>
								
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

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
