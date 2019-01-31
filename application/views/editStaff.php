<?php foreach($editstaff as $row){ } ?>

   <?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>
        <!-- Header-->



        <div class="content mt-6">
            <div class="animated fadeIn">


                <div class="row">


                 <form action="<?php echo base_url('Staff/UpdateStaff/'.$row['ID']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal"><form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                  <div class="col-lg-12">
                    <div class="card" style="background-color:#95ecd4;">
                      <div class="card-header">
                        <strong>Edit Staff</strong>
						<h4 style="color:green;"><?php echo $this->session->flashdata('message'); ?></h4>
                      </div>
                      <div class="card-body card-block">


                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" class="form-control"></div>
                          </div>

						   <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="email" name="email" value="<?php echo $row['username']; ?>" class="form-control" readonly></div>
                          </div>

						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="Password" name="Password" class="form-control"></div>
                          </div>

						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Type</label></div>
                            <div class="col-12 col-md-9">
							<select name="type" id="type" class="form-control" Required>

                                <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>

                              </select>
							</div>
                          </div>

						   <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Number</label></div>
                            <div class="col-12 col-md-9"><input type="number" id="number" name="number" value="<?php echo $row['number']; ?>" class="form-control"></div>
                          </div>



						  <div class="card-footer" style="background-color:#95ecd4;">

								<button type="submit" class="btn btn-primary btn-sm">
								  <i class="fa fa-dot-circle-o"></i> Update Staff
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

          <script src="<?php echo base_url()?>assets/js/vendor/jquery-2.1.4.min.js"></script>
          <script src="<?php echo base_url('assets/js/vendor/jquery-ui.min.js')?>"></script>
          <script src="<?php echo base_url('assets/js/vendor/jquery.timepicker.min.js')?>"></script>
          <script src="<?php echo base_url()?>assets/js/popper.min.js"></script>
          <script src="<?php echo base_url()?>assets/js/plugins.js"></script>
          <script src="<?php echo base_url()?>assets/js/main.js"></script>


</body>
</html>
