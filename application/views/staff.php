<?php $Loginid = $this->session->userdata('ID');?>
    <div class="content mt-6">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card" style="background-color:#95ecd4;">
                      <div class="card-header">
                        <strong>Add Staff</strong>
						                <h4 style="color:green;"><?php echo $this->session->flashdata('message'); ?></h4>
                            <h4 style="color:red;"><?php echo $this->session->flashdata('error'); ?></h4>
                      </div>
                      <form action="<?php echo base_url('Staff/SaveStaff/'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                      <div class="card-body card-block">
                          <div class="row">
                              <div class="col-md-6">
                          <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="name" name="name" placeholder="Staff Name" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label" required="">Email</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="email" name="email" placeholder="Enter Email Id" class="form-control" required=""></div>
                          </div>
  						          <div class="row form-group">
                              <div class="col col-md-4"><label for="text-input" class=" form-control-label">Password</label></div>
                              <div class="col-12 col-md-8"><input type="text" id="Password" name="Password" placeholder="Password" class="form-control" required=""></div>
                        </div>
                        <div class="row form-group">
                           <div class="col col-md-4"><label for="text-input" class=" form-control-label">Date of Joining</label></div>
                           <div class="col-12 col-md-8"><input type="text" id="doj" name="doj" placeholder="YYYY-MM-DD" class="form-control"></div>
                       </div>
                </div><!-- /col-md-6 -->
                <div class="col-md-6">
                <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Number</label></div>
                            <div class="col-12 col-md-8"><input type="number" id="number" name="number" placeholder="Contact Number" class="form-control"></div>
                          </div>
                                   <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Address</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="address" name="address" placeholder="Address" class="form-control"></div>
                          </div>

                      <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Designation</label></div>
                            <div class="col-12 col-md-8">
                                <select name="designationid" class="form-control" required="">
                                    <option value="" selected="" disabled="">--Select Designation--</option>
                                    <?php
                                    if(!empty($Details)){
                                        foreach ($Details as $r){
                                            ?>
                                    <option value="<?php echo $r["id"]; ?>"><?php echo $r["name"]; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                          </div>
                        </div><!-- /col-md-6 -->
                      </div><!-- / row -->
                      <div class="card-footer" style="background-color:#95ecd4;">
                    <button type="submit" class="btn btn-primary btn-sm">
						<i class="fa fa-dot-circle-o"></i> Create Staff
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
                            <strong class="card-title">Staff Details</strong>
                        </div>
						<?php //echo $this->session->flashdata('message');  ?>
                        <div class="card-body">
                  <div class="table-responsive">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>UserName</th>
						<th>Type</th>
                        <th>Number</th>
                        <th>Created By</th>
						<th>Action</th>


                      </tr>
                    </thead>
                    <tbody>
					<?php foreach($StaffDetails as $row) { ?>
                      <tr>
					  <?php //print_r($row);die; ?>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['username']; ?></td>
						<td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['number']; ?></td>
                        <td><?php echo $row['created_by']; ?></td>
						<td><a href="<?php echo base_url('Staff/editStaff/').$row['ID']; ?>"><i class="fa fa-edit" style="font-size:24px;color:green"></i></a><a href="<?php echo base_url('Staff/deleteStaff/').$row['ID']; ?>"><i class="fa fa-trash" style="font-size:24px;color:red"></i></a></td>
                      </tr>
					<?php } ?>

                    </tbody>
                  </table>
                </div>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div>


    <script src="<?php echo base_url()?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/jquery-ui.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/jquery.timepicker.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url()?>assets/js/main.js"></script>
    <script>
      jQuery( function() {
        jQuery( "#doj" ).datepicker( { dateFormat: 'yy-mm-dd' });
      } );
   </script>
</body>
</html>
