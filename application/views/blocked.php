<?php $this->load->view('components/page_head'); ?> 

<div data-role="page">

	<div data-role="header">
		<h1>iRESERVE: <?= $property->propertyName; ?></h1>
	</div><!-- /header -->

	<div data-role="content">	
		<div id="splashLogo" style="margin:0 auto;text-align:center;">
        	<img alt="logo" src="http://www.edrpo.com/edrAssets/iResLogos/<?= $propNum; ?>.png" />
        </div><!-- /splashLogo -->
        <p><strong>Currently your account is locked out.</strong></p>
        <p>You will not be able to reserve any property resources until this lock is removed.</p>
        <p>Please take picture identification to the front desk to resolve this.</p>
    </div> <!-- /content DIV -->

    <div data-role="footer" class="footer-docs" data-position="fixed" data-theme="c">
	    <h1>iRESERVE<br><em>The convenient way to schedule fun!</em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type='text/javascript'>
</script>

<?php $this->load->view('components/page_tail'); ?>