<?php $this->load->view('components/page_head'); ?> 

<div data-role="page">
	<div data-role="header">
		<h1>iRESERVE: <?= $user['fname'].' '.$user['lname']; ?></h1>
		<a href="<?= site_url('reserve/index/'.$user['id']); ?>" data-icon="home">Home</a>
	</div><!-- /header -->

	<div data-role="content">
		<div id="rscSelect">
			<p><?= $resource[0]['resourcePropertySpecs']; ?></p>
			<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
		        <li data-role="list-divider">Please click/tap the date of your new reservation.</li>
		        <?php
		        	for( $d=0;$d<10;$d++ ):
		        		$thisDate = mktime(0, 0, 0, date("m"), date("d")+$d, date("Y"));
		        		$checkAvailability = $this->reserve_m->checkIfDateAvailable($user['id'], date("Y-m-d",$thisDate), $resource[0]['id'] );
		        ?>
			        <?php if( $checkAvailability == 0 ) : ?>
				        <li>
				        	<a class="btnDate" href="<?= site_url('reserve/getAvailTimes/'.$user['id'].'/'.$resource[0]['id'].'/'.date("Y-m-d",$thisDate)); ?>">
				        		<?= date("l -- M j, Y",$thisDate); ?>
				        	</a>
				        	<span class="ui-li-count"><?= count($this->reserve_m->getAvailableSlots($resource[0]['id'], date("Y-m-d",$thisDate))); ?></span>
				        </li>
				    <?php endif; ?>
		    	<?php endfor; ?>
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