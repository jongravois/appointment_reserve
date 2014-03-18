<!DOCTYPE html> 
<html> 
<head> 
	<title>iRESERVE</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="/jqm12/jquery.mobile-1.2.0.min.css" />

	<style type="text/css">
		/* Smartphone Styling */
		@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
			#splashLogo img{ width: 90%; }
		} /* END SMARTPHONE STYLING */
		@media screen and (min-width: 800px) {
  			.ui-li-desc {
    			margin: -2em 0 0 1.5em;
  			}
		}
	</style>

	<script src="/js/jquery-1.7.2.js"></script>
	<script type="text/javascript">
	    $(document).bind("mobileinit", function(){
	    	$. mobile.ajaxEnabled = false;
	    }); // END document.bind
	</script>
	<script src="/jqm12/jquery.mobile-1.2.0.min.js"></script>
</head> 
<body>