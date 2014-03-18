<?php $this->load->view('components/page_head'); ?>

<div data-role="page">

	<div data-role="header">
		<h1>iRESERVE</h1>
	</div><!-- /header -->

	<div data-role="content">
		<div id="splashLogo" style="margin:0 auto;text-align:center;">
        	<img alt="logo" src="http://www.edrpo.com/edrAssets/iResLogos/<?= $propNum; ?>.png" />
        </div><!-- /splashLogo -->
	    <h3 style="margin:0 auto;text-align:center;">Welcome to our<br>Online Reservation System</h3>
	    <p style="font-size:13px;margin:0 auto;text-align:center;"><em>The convenient way to schedule some fun!</em></p>
        <br><br>
	    <a id="btnBegin" href="<?php echo site_url('user/getValidationForm'); ?>" data-role="button" data-theme="b">Click to Begin</a>		
	</div><!-- /content -->
	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em>The convenient way to schedule fun!</em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<?php $this->load->view('components/page_tail'); ?>