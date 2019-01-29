<?php $Loginid = $this->session->userdata('ID');?>
<?php if (!empty($Loginid)){ ?>
        <!-- Header-->
        <div class="content mt-6">
            <div class="animated fadeIn">
            <div class="row">
            <form action="<?php //echo base_url('distributor/CreateDistibutor/'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal"><form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="col-lg-12">
              <div class="card" style="background-color:#95ecd4;">
                <div class="card-header">
                  <strong>Today Work</strong>
      						<h4 style="color:green;"><?php echo $this->session->flashdata('message'); ?></h4>
                </div>
                <div class="card-body card-block">
                  <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class="form-control-label">&nbsp;</label></div>
                    <div class="col-12 col-md-9">
                    <select name="designationid" class="form-control" required="">
                          <option value="" selected="" disabled="">--Select--</option>
                          <option value="1">New Meeting</option>
                          <option value="2">Visit Dealer</option>
                          <option value="2">Payment Take</option>
                          <option value="2">Order Generate</option>
                          <option value="2">Visit Farmer</option>
                    </select>
                    </div>
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
