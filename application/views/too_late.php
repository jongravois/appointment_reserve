<?php $this->load->view('components/page_head'); ?> 

<div data-role="page">

	<div data-role="header">
		<h1>iDESERVE: <?= $property->propertyName; ?></h1>
		<a href="<?= site_url('reserve/index/'.$user['id']); ?>" data-icon="home">Home</a>
	</div><!-- /header -->

	<div data-role="content">	
		<div id="splashLogo" style="margin:0 auto;text-align:center;">
        	<img alt="logo" src="http://www.edrpo.com/edrAssets/iResLogos/<?= $propNum; ?>.png" />
        </div><!-- /splashLogo -->
        <p><strong>Oops ... Someone just made that same reservation!</strong></p>
        <p>That property resource is no longer available at that time.</p>
        <p>Please select another available time slot.</p>
        <br><br>
	    <a href="<?= site_url('reserve/chooseResource/'.$user['id']); ?>" data-role="button" data-theme="b">
			Create New Reservation
		</a>
		<a href="<?= site_url('reserve/deleteExisting/'.$user['id']); ?>" data-role="button" data-theme="d">
			Delete Existing Reservation
		</a>
		<a href="<?= site_url('reserve/quitApplication'); ?>" data-role="button" data-theme="a">
			Exit Application
		</a>
    </div> <!-- /content DIV -->

    <div data-role="footer" class="footer-docs" data-position="fixed" data-theme="c">
	    <h1>iRESERVE<br><em>The convenient way to schedule fun!</em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type='text/javascript'>
</script>

<?php $this->load->view('components/page_tail'); ?>