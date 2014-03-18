<?php $this->load->view('components/page_head'); ?>

<div data-role="page">

	<div data-role="header">
		<h1>iRESERVE: <?= $user['fname'].' '.$user['lname']; ?></h1>
		<a href="<?= site_url('reserve/index/'.$user['id']); ?>" data-icon="home">Home</a>
	</div><!-- /header -->

	<div data-role="content">
		<div id="rscSelect">
			<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
		        <li data-role="list-divider">Please click/tap to reserve your fun!</li>
		        <?php foreach( $availableSlots as $slot ): ?>
        			<li>
        				<a class='btnReserv' href="<?= site_url('reserve/create_new_reservation/'.$user['id'].'/'.$resID.'/'.$resDate.'/'.$slot['start']); ?>">
        					<?= $slot['slot']; ?>
        				</a>
        			</li>
				<?php endforeach; ?>
		    </ul>
		</div><!-- / #rscSelect -->
    </div> <!-- /content DIV -->
    <div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em>The convenient way to schedule fun!</em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type='text/javascript'>
	$(document).ready(function() {
	  	
	}); //END Document Ready Function
</script>

<?php $this->load->view('components/page_tail'); ?>