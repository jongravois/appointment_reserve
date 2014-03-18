<?php $this->load->view('components/page_head'); ?> 

<div data-role="page">

	<div data-role="header">
		<h1>iRESERVE: <?= $user['fname'].' '.$user['lname']; ?></h1>
		<a href="<?= site_url('user/getValidationForm'); ?>" data-icon="back">Back</a>
	</div><!-- /header -->

	<div data-role="content">
		<?= $message; ?>
		<br>
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
    <div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em>The convenient way to schedule fun!</em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type='text/javascript'>
</script>

<?php $this->load->view('components/page_tail'); ?>