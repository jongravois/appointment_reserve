<?php $this->load->view('components/page_head'); ?>

<div data-role="page">
	<div data-role="header">
		<h1>iRESERVE: <?= $user['fname'].' '.$user['lname']; ?></h1>
		<a href="<?= site_url('reserve/index/'.$user['id']); ?>" data-icon="home">Home</a>
	</div><!-- /header -->
	<div data-role="content">
		<?php if(!$myReservations): ?>
			<h3>You don't have any pending reservations on file.</h3>
		<?php else: ?>
			<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
	        <li data-role="list-divider">Please click/tap the resource you would like to edit or its delete icon to delete.</li>
	        	
	        <?php foreach( $myReservations as $res ): ?>
			    <li data-icon="delete" data-iconpos="right">
			       	<a class="killer" href="<?= site_url('reserve/deleteReservation/'.$res['id']); ?>">
			        	<?= $res['resource']; ?>
			        </a>
			        <br>
			        <p><?= date('l, M d, Y',strtotime($res['resStart'])) . '<br>' . date('g:i A',strtotime($res['resStart'])); ?></p>
			       </li>
		    <?php endforeach; ?>
	    	</ul>
	    <?php endif; ?>
    </div> <!-- /content DIV -->
    <div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em>The convenient way to schedule fun!</em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type='text/javascript'>
	$(document).ready(function() {
		$('.killer').click( function() {
			if ( !confirm("This reservation will be deleted. You cannot undo this operation. Are you sure you want to do this?")) { 
				return false;
		    } // end if
		});
	}); //END document ready function
</script>

<?php $this->load->view('components/page_tail'); ?>