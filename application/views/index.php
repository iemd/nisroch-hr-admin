<!-- /header -->
        <!-- Header-->
 <?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">




           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">

                        <h4 class="mb-0">
                            <span class="count"><?php echo count($editData); ?></span>
                        </h4>
                        <a href="<?php echo base_url('Product/Listing/'); ?>"><p class="text-light">Product Available</p></a>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">

                        <h4 class="mb-0">
                            <span class="count"><?php echo $distcount; ?></span>
                        </h4>
                        <p class="text-light">Total Distributor</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">

                        <h4 class="mb-0">
                            <span class="count"><?php echo count($Totalinvoice); ?></span>
                        </h4>
                        <a href="<?php echo base_url('Billing/InvoiceView/'); ?>"><p class="text-light">Total Invoice</p></a>

                    </div>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart3"></canvas>
                        </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">

                        <h4 class="mb-0">
                            <span class="count"><?php echo count($invoice); ?></span>
                        </h4>
                        <p class="text-light">Today Invoice</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->


        </div>

    </div><!-- /#right-panel -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
 <?php } else { ?>

				  <?php redirect(base_url('AdminPanel')); ?>

				  <?php } ?>
    <!-- Right Panel -->

    <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>


    <script src="<?php echo base_url('assets/js/lib/chart-js/Chart.bundle.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/dashboard.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/widgets.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.sampledata.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/country/jquery.vmap.world.js'); ?>"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>
