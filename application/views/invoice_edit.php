<?php foreach($invoice_details as $row){} ?>

<?php $Loginid = $this->session->userdata('ID');?>
<?php if (!empty($Loginid)){ ?>
        <!-- Header-->
        <div class="content mt-6">
            <div class="animated fadeIn">
                <div class="row">


                 <form action="<?php echo base_url('Billing/InvoiceUpdate/'.$row['dist_id']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal"><form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                  <div class="col-lg-12">
                    <div class="card" style="background-color:#95ecd4;">
                      <div class="card-header">
                        <strong>EDIT INVOICE</strong>
						                 <h4 style="color:green;"><?php echo $this->session->flashdata('message'); ?></h4>
                      </div>
                      <div class="card-body card-block">

                          <div class="row form-group">
                            <div class="col col-md-6"><label for="text-input" class=" form-control-label">Mobile No.</label></div>
                            <div class="col-12 col-md-6"><input type="text" id="number" name="number" value="<?php echo $row['number']; ?>" class="form-control"></div>
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
