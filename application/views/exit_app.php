<?php $this->load->view('components/page_head'); ?>

<div data-role="page">
	<div data-role="header">
		<h1>iRESERVE: <?= $property->propertyName; ?></h1>
	</div><!-- /header -->

	<div data-role="content">	
		<div id="splashLogo" style="margin:0 auto;text-align:center;">
        	<img alt="logo" src="http://www.edrpo.com/edrAssets/iResLogos/<?= $propNumber; ?>.png" />
        </div><!-- /splashLogo -->
        <p><strong>Thank you for using iRESERVE.</strong></p>
    </div> <!-- /content DIV -->

    <div data-role="footer" class="footer-docs" data-position="fixed" data-theme="c">
	    <h1>iRESERVE<br><em>The convenient way to schedule fun!</em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<?php $this->load->view('components/page_tail'); ?>