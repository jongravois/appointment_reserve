<?php $this->load->view('components/page_head'); ?>

	<div data-role="page">
		<div data-role="header">
			<h1>iRESERVE: <?= $property->propertyName; ?></h1>
		</div><!-- /header -->
		<div data-role="content">	
			<form action="<?= site_url('user/validateUser'); ?>" method="post" data-ajax="false">
	        	<input type="hidden" name="propNum" value="<?= $propNum; ?>" />
	        	<ul data-role="listview" data-inset="true" data-theme="d" data-dividertheme="b">
            		<li data-role="list-divider">
            			Required Fields
            		</li>
            		<li data-role="fieldcontain">
            			<label for="fname">First Name:</label>
            			<input type="text" name="fname" id="fname" value="">
            			<br><br>
            			<label for="lname">Last Name:</label>
            			<input type="text" name="lname" id="lname" value="">
            			<br><br>
            			<label for="unit">Unit Number:</label>
            			<input type="text" name="unit" id="unit" value="">
            			<br><br>
            			<label for="email">Valid Email:</label>
            			<input type="email" name="email" id="email" value="">
        			</li>
        			<li data-role="list-divider">
        				Enter One of the Fields Below
        			</li>
        			<li data-role="fieldcontain">
          				<label for="SSN">Last 4 Digits of SSN:</label>
          				<input type="number" name="SSN" id="SSN" value="">
          				<br><br>
          				<label for="DOB">Date of Birth: (mm/dd/yyyy)</label>
          				<input type="date" name="DOB" id="DOB" value="">
        			</li>
        			<li data-role="fieldcontain">
          				<fieldset class="ui-grid-a">
            				<div class="ui-block-b"><button type="submit" data-theme="b">Submit</button></div>     
          				</fieldset>
        			</li>
	        	</ul>
	    </form>
  		</div><!-- /content -->
  		<div data-role="footer" class="footer-docs" data-position="fixed">
	    	<h4><em>The convenient way to schedule fun!</em></h4>
	  	</div><!-- /footer -->
	</div><!-- /page -->

<script type='text/javascript'>
	$('#SSN').mask('9999');$('#DOB').mask('99/99/9999');
</script>

<?php $this->load->view('components/page_tail'); ?>