
<?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>
   
        <!-- Header-->

      <?php foreach($editData as $row) { ?>
<?php //print_r($row); ?>
        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                  

                 <form action="<?php echo base_url(); ?>Product/updateAction/<?php echo $row['prod_id']; ?>" method="post" enctype="multipart/form-data" class="form-horizontal"><form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                  <div class="col-lg-6">
                    <div class="card" style="background-color:#95ecd4;">
                      <div class="card-header">
                        <strong>Product Update</strong>
						<h4 style="color:green;"><?php echo $this->session->flashdata('message'); ?></h4>
                      </div>
                      <div class="card-body card-block">
                        
                         
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="pname" name="pname" value="<?php echo $row['prod_name']; ?>" class="form-control"></div>
                          </div>
                         
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Type</label></div>
                            <div class="col-12 col-md-9">
                              <select name="category" id="category" class="form-control" Required>
                                
                                <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                                <option value="NPP">NPP</option>
								<option value="NBP">NBP</option>
                              </select>
                            </div>
                          </div>
                          
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">HSN Code</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="hsn" name="hsn" value="<?php echo $row['hsn']; ?>" class="form-control"></div>
                          </div> 
						  
						   <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Batch No</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="batch" name="batch" value="<?php echo $row['batch']; ?>" class="form-control"></div>
                          </div> 
                         
                         
						   <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mfg Date</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="mfg" name="mfg" value="<?php echo $row['mfg']; ?>" class="form-control"></div>
                          </div> 
						  
						  
						   <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Exp Date</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="exp" name="exp" value="<?php echo $row['exp']; ?>" class="form-control"></div>
                          </div> 
							
							
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bag Type</label></div>
                            <div class="col-12 col-md-9">
                              <select name="bagtype" id="bagtype" class="form-control">
                                
                                <option value="<?php echo $row['bagtype']; ?>"><?php echo $row['bagtype']; ?></option>
                                
                              </select>
                            </div>
                          </div>
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bag Size</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="size" name="size" value="<?php echo $row['size']; ?>" class="form-control"></div>
                          </div> 
						  
						  <div class="row form-group" id="Custom-Unit">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bag price</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="bagprice" name="bagprice" value="<?php echo $row['bagprice']; ?>" class="form-control"></div>
                          </div> 
                        
                      </div>
                      
                    </div>
                    
                  </div>
				  
				  
				  <div class="col-lg-6">
                    <div class="card" style="background-color:#95ecd4;">
                      <div class="card-header">
                        &nbsp;&nbsp;&nbsp;
						
						  
						  
							
							<div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Case Type</label></div>
                            <div class="col-12 col-md-9">
                              <select name="casetype" id="casetype" class="form-control">
                                
                                <option value="<?php echo $row['casetype']; ?>"><?php echo $row['casetype']; ?></option>
                                
                              </select>
                            </div>
                          </div> 
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Case Size</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="csize" name="csize" value="<?php echo $row['csize']; ?>" class="form-control"></div>
                          </div> 
						  
						  <div class="row form-group" id="Custom-Unit">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Case price</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="caseprice" name="caseprice" value="<?php echo $row['caseprice']; ?>" class="form-control"></div>
                          </div> 
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Drum Type</label></div>
                            <div class="col-12 col-md-9">
                              <select name="drumtype" id="drumtype" class="form-control">
                               
                                <option value="<?php echo $row['drumtype']; ?>"><?php echo $row['drumtype']; ?></option>
								
                              </select>
                            </div>
                          </div>

							<div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Drum Size</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="dsize" name="dsize" value="<?php echo $row['dsize']; ?>" class="form-control"></div>
                          </div> 
						  
						  <div class="row form-group" id="Custom-Unit">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Drum price</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="drumprice" name="drumprice" value="<?php echo $row['drumprice']; ?>" class="form-control"></div>
                          </div> 
						  
						  <div class="row form-group" id="Custom-Unit">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Custom Unit</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="customunit" name="customunit" value="<?php echo $row['customunit']; ?>" class="form-control"></div>
                          </div> 
						  	  
						  <div class="row form-group" id="Custom-Unit">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Custom Price</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="customprice" name="customprice" value="<?php echo $row['customprice']; ?>" class="form-control"></div>
                          </div> 
							  
						  <div class="row form-group" id="Custom-Unit">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tax</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="gst" name="gst" value="<?php echo $row['gst']; ?>" class="form-control"></div>
							<div class="col-12 col-md-4"><input type="text" id="igst" name="igst" value="<?php echo $row['igst']; ?>" class="form-control"></div>
                          </div> 
							  
							  <div class="card-footer" style="background-color:#95ecd4;">
							
								<button type="submit" class="btn btn-primary btn-sm">
								  <i class="fa fa-dot-circle-o"></i> Update
								</button>
								
							  </div>
					   </div>
                    </div>
                    
                  </div>

                 

                 </form>
                  
                  
              	<?php } ?>     

                  
<?php } else { ?>
				  
				  <?php redirect(base_url('AdminPanel')); ?>
				  
				  <?php } ?>
                  

                


            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
