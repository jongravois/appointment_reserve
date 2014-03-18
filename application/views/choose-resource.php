<?php $this->load->view('components/page_head'); ?>

<div data-role="page">

	<div data-role="header">
		<h1>iRESERVE: <?= $user['fname'].' '.$user['lname']; ?></h1>
		<a href="<?= site_url('reserve/index/'.$user['id']); ?>" data-icon="home">Back</a>
	</div><!-- /header -->

	<div data-role="content">
		<ul data-role="listview" data-inset="true" data-split-icon="info" data-theme="c" data-dividertheme="b">
	        <li data-role="list-divider">Please click/tap the resource you would like to reserve ...</li>
	        <?php foreach( $resources as $res ): ?>
		        <li>
		        	<a href="<?= site_url('reserve/selectResource/'.$user['id'].'/'.$res['id']); ?>">
		        		<?= $res['resource']; ?>
		        	</a>
		        	<br>
		        	<p class="rscDesc"><?= $res['resourceDescription']; ?></p>
		        	<!--<a href="http://www.google.com">google</a>-->
		        </li>
	    	<?php endforeach; ?>
	    </ul>
    </div> <!-- /content DIV -->
    <div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em>The convenient way to schedule fun!</em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type='text/javascript'>
</script>

<?php $this->load->view('components/page_tail'); ?>