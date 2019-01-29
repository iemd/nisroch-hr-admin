

   <?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>
        <!-- Header-->

      

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                  

                 <form action="<?php echo base_url(); ?>Product/saveProduct/" method="post" enctype="multipart/form-data" class="form-horizontal"><form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                  <div class="col-lg-6">
                    <div class="card" style="background-color:#95ecd4;">
                      <div class="card-header">
                        <strong>Add Products</strong>
						<h4 style="color:green;"><?php echo $this->session->flashdata('message'); ?></h4>
                      </div>
                      <div class="card-body card-block">
                        
                         
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="pname" name="pname" placeholder="Product Name" class="form-control"></div>
                          </div>
                         
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Type</label></div>
                            <div class="col-12 col-md-9">
                              <select name="category" id="category" class="form-control" Required>
                                
                                <option value="">Select Product Type</option>
                                <option value="NPP">NPP</option>
								<option value="NBP">NBP</option>
                              </select>
                            </div>
                          </div>
                          
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">HSN Code</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="hsn" name="hsn" placeholder="HSN Code" class="form-control"></div>
                          </div> 
						  
						   <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Batch No</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="batch" name="batch" placeholder="Batch No" class="form-control"></div>
                          </div> 
                         
                         
						   <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mfg Date</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="mfg" name="mfg" placeholder="Mfg Date" class="form-control"></div>
                          </div> 
						  
						  
						   <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Exp Date</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="exp" name="exp" placeholder="Exp Date" class="form-control"></div>
                          </div> 
							
							
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bag Type</label></div>
                            <div class="col-12 col-md-9">
                              <select name="bagtype" id="bagtype" class="form-control">
                                
                                <option value="Bag">Bag</option>
                                
                              </select>
                            </div>
                          </div>
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bag Size</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="size" name="size" placeholder="Bag Size" class="form-control"></div>
                          </div> 
						  
						  <div class="row form-group" id="Custom-Unit">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bag price</label></div>
                            <div class="col-12 col-md-9"><input type="number" id="bagprice" name="bagprice" placeholder="Bag price" class="form-control"></div>
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
                                
                                <option value="Case">Case</option>
                                
                              </select>
                            </div>
                          </div> 
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Case Size</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="csize" name="csize" placeholder="Case Size" class="form-control"></div>
                          </div> 
						  
						  <div class="row form-group" id="Custom-Unit">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Case price</label></div>
                            <div class="col-12 col-md-9"><input type="number" id="caseprice" name="caseprice" placeholder="Case price" class="form-control"></div>
                          </div> 
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Drum Type</label></div>
                            <div class="col-12 col-md-9">
                              <select name="drumtype" id="drumtype" class="form-control">
                               
                                <option value="Drum">Drum</option>
								
                              </select>
                            </div>
                          </div>

							<div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Drum Size</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="dsize" name="dsize" placeholder="Drum Size" class="form-control"></div>
                          </div> 
						  
						  <div class="row form-group" id="Custom-Unit">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Drum price</label></div>
                            <div class="col-12 col-md-9"><input type="number" id="drumprice" name="drumprice" placeholder="Drum price" class="form-control"></div>
                          </div> 
						  
						  <div class="row form-group" id="Custom-Unit">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Custom Unit</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="customunit" name="customunit" placeholder="Custom Unit" class="form-control"></div>
                          </div> 
						  	  
						  <div class="row form-group" id="Custom-Unit">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Custom Price</label></div>
                            <div class="col-12 col-md-9"><input type="number" id="customprice" name="customprice" placeholder="Custom price" class="form-control"></div>
                          </div> 
							
						 <div class="row form-group" id="Custom-Unit">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tax</label></div>
                            <div class="col-12 col-md-5"><input type="number" id="gst" name="gst" placeholder="CGST | SGST" class="form-control"></div>
							<div class="col-12 col-md-4"><input type="number" id="igst" name="igst" placeholder="Enter IGST" class="form-control"></div>
                          </div> 
						  
							  
							  <div class="card-footer" style="background-color:#95ecd4;">
							
								<button type="submit" class="btn btn-primary btn-sm">
								  <i class="fa fa-dot-circle-o"></i> Submit
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
