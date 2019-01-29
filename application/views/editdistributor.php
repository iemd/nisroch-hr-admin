<?php foreach($editdistributor as $row){ } ?>

   <?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>
        <!-- Header-->

      

        <div class="content mt-6">
            <div class="animated fadeIn">


                <div class="row">
                  

                 <form action="<?php echo base_url('distributor/UpdateDistibutor/'.$row['dist_id']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal"><form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                  <div class="col-lg-12">
                    <div class="card" style="background-color:#95ecd4;">
                      <div class="card-header">
                        <strong>Add Distributor</strong>
						<h4 style="color:green;"><?php echo $this->session->flashdata('message'); ?></h4>
                      </div>
                      <div class="card-body card-block">
                        
                         
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" class="form-control"></div>
                          </div>
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Buyer Code</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="BuyerCode" name="BuyerCode" value="<?php echo $row['bcode']; ?>" class="form-control"></div>
                          </div>
						   
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
                            <div class="col-12 col-md-3"><input type="text" id="State" name="State" value="<?php echo $row['State']; ?>" class="form-control"></div>
							<div class="col-12 col-md-3"><input type="text" id="City" name="City" value="<?php echo $row['City']; ?>" class="form-control"></div>
							<div class="col-12 col-md-3"><input type="text" id="Pincode" name="Pincode" value="<?php echo $row['Pincode']; ?>" class="form-control"></div>
                          </div>
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Delivery Address</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="DAddress" name="DAddress" value="<?php echo $row['DAddress']; ?>" class="form-control"></div>
                          </div> 
                         
                         
						   <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email Id</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="email" name="email" value="<?php echo $row['email']; ?>" class="form-control"></div>
                          </div> 
						  
						  
						   <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Contact Number</label></div>
                            <div class="col-12 col-md-9"><input type="number" id="number" name="number" value="<?php echo $row['number']; ?>" class="form-control"></div>
                          </div> 
							
						<div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">GSTIN Number</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="gst" name="gst" value="<?php echo $row['gst']; ?>" class="form-control"></div>
                          </div> 
							
							
						<div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Place | Dest | Pl No</label></div>
                            <div class="col-12 col-md-3"><input type="text" id="pos" name="pos" value="<?php echo $row['pos']; ?>" class="form-control"></div>
							<div class="col-12 col-md-3"><input type="text" id="Destination" name="Destination" value="<?php echo $row['Destination']; ?>" class="form-control"></div>
							<div class="col-12 col-md-3"><input type="text" id="pnumber" name="pnumber" value="<?php echo $row['pnumber']; ?>" class="form-control"></div>
                          </div>
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Create Code</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="npp" name="npp" value="<?php echo $row['npp']; ?>" class="form-control"></div>
							<div class="col-12 col-md-4"><input type="text" id="nbp" name="nbp" value="<?php echo $row['nbp']; ?>" class="form-control"></div>
							
                          </div>
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Create Limit</label></div>
                            <div class="col-12 col-md-5"><input type="text" name="nppLimit" value="<?php echo $row['nppLimit']; ?>" class="form-control"></div>
							<div class="col-12 col-md-4"><input type="text" name="nbpLimit" value="<?php echo $row['nbpLimit']; ?>" class="form-control"></div>
							
                          </div>
						  
						 
						  
						  
						  
						  <div class="card-footer" style="background-color:#95ecd4;">
							
								<button type="submit" class="btn btn-primary btn-sm">
								  <i class="fa fa-dot-circle-o"></i> Update Distributor
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
