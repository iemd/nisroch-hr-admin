   <?php $Loginid = $this->session->userdata('ID');?>
 

        <div class="content mt-6">
            <div class="animated fadeIn">


                <div class="row">
                  

                 
                  <div class="col-lg-12">
                    <div class="card" style="background-color:#95ecd4;">
                      <div class="card-header">
                        <strong>Add Designation</strong>
						<h4 style="color:green;"><?php echo $this->session->flashdata('messages'); ?></h4>
                      </div>
                        
                        <form action="<?php echo base_url('Designation_Controller/SaveDesignation/'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                      <div class="card-body card-block">
                          <div class="row">
                              <div class="col-md-6">
                                  
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Designation Name" required="" class="form-control"></div>
                          </div>
                         
                         
						  
                                  
                              </div><!-- /col-md-6 -->
                              
                             
                              
                              
                              
                          </div><!-- / row -->
                         
						  
						  
						  
						  <div class="card-footer" style="background-color:#95ecd4;">
							
								<button type="submit" class="btn btn-primary btn-sm">
								  <i class="fa fa-dot-circle-o"></i> Create Designation
								</button>
								
							  </div>
                        
                      </div>
                            
                            </form>
                      
                    </div>
                    
                  </div>
                 
                  
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
	
	<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card" style="background-color:#95ecd4;">
                        <div class="card-header">
                            <strong class="card-title">Details</strong>
                        </div>
						<?php echo $this->session->flashdata('message');  ?>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>                        
                        <th>Action</th>
						
						
                      </tr>
                    </thead>
                    <tbody>
					<?php 
                                        if(!empty($Details)){
                                        foreach($Details as $row) { ?>
                      <tr>
					  <?php //print_r($row);die; ?>
                        <td><?php echo $row['name']; ?></td>
                       	<td><a href="<?php echo base_url('Designation_Controller/editDesignation/').$row['id']; ?>"><i class="fa fa-edit" style="font-size:24px;color:green"></i></a><a href="<?php echo base_url('Designation_Controller/deleteDesignation/').$row['id']; ?>"><i class="fa fa-trash" style="font-size:24px;color:red"></i></a></td>
                      </tr>
					<?php }
                                        }
                                        ?> 

                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
