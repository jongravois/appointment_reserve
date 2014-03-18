<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to CI_Boot on a <?= $agent; ?> browser</title>

	<link href="<?= base_url('assets/css/bootstrap_alt.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/bootstrap-responsive.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/prettify.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/bootstrap-wysihtml5.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/site.css'); ?>" rel="stylesheet">

	<!--[if IE 7]>
		<link rel="stylesheet" href="<?= base_url('assets/css/font-awesome-ie7.min.css'); ?>">
	<![endif]-->
	<!--[if lt IE 9]>  
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>  
    <![endif]-->

<style type="text/css" media="screen">
	.btn.jumbo {
		font-size: 20px;
		font-weight: normal;
		padding: 14px 24px;
		margin-right: 10px;
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		border-radius: 6px;
	}
</style>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Blank CI/Strap Site</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	<div class="container-fluid">
    	<!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1 style="font-size:58px">Welcome to CodeIgniter on a <?= $agent; ?>!</h1>
		<hr/>
		<textarea class="textarea" placeholder="Enter text ..." style="width: 810px; height: 200px"></textarea>
      </div><!-- END .hero-unit DIV -->

      <!-- Example row of columns -->
      <div class="row">
        <ul class="nav nav-list span4">
  			<li class="active"><a href="#"><i class="icon-home"></i> Home</a></li>
  			<li><a href="#"><i class="icon-book"></i> Library</a></li>
  			<li><a href="#"><i class="icon-pencil"></i> Applications</a></li>
  			<li><a href="#"><i class="icon-cogs"></i> Settings</a></li>
		</ul>
		<div class="span4">
          <h2><?= ucfirst($agent); ?> Browser</h2>
          <p>The page you are looking at is being generated dynamically by CodeIgniter. If you would like to edit this page you'll find it located at:</p> <code>application/views/welcome_message.php</code>
        </div>
        <div class="span4">
          <h2>Bootstrap</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
       	</div>
      </div>
      <hr>

      <footer>
        <p>Page rendered in <strong>{elapsed_time}</strong> seconds</p>
      </footer>  
    </div><!--/.fluid-container-->

<script src="<?= base_url('assets/js/wysihtml5.js'); ?>" type="text/javascript"></script>
<!--<script src="<?= base_url('assets/js/jquery-1.7.2.min.js'); ?>" type="text/javascript"></script>-->
<script src="<?= base_url('assets/js/jquery-1.9.0.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/prettify.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/bootstrap.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/bootstrap-wysihtml5.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
(function() {
    $('.textarea').wysihtml5();
    $(prettyPrint);
})();
</script>

</body>
</html>