<?php

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
	//Request hash
	$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';	
	if(strcasecmp($contentType, 'application/json') == 0){
		$data = json_decode(file_get_contents('php://input'));
		$hash=hash('sha512', $data->key.'|'.$data->txnid.'|'.$data->amount.'|'.$data->pinfo.'|'.$data->fname.'|'.$data->email.'|||||'.$data->udf5.'||||||'.$data->salt);
		$json=array();
		$json['success'] = $hash;
    	echo json_encode($json);
	
	}
	exit(0);
}
 
function getCallbackUrl()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . 'response.php';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Darul Uloom Subhania</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/animate.min.css" rel="stylesheet">
<link href="css/prettyPhoto.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="images/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >

<script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-
color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>
</head>
<body class="homepage">
<header id="header">
<div class="top-bar">
<div class="container">
<div class="row">
<div class="col-sm-6 col-xs-4">
<div class="top-number"><p><i class="fa fa-phone-square"></i> (+91)863-026-5692</p></div>
</div>
<div class="col-sm-6 col-xs-8">
<div class="social">
<ul class="social-share">
<li><a href="#"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
<li><a href="#"><i class="fa fa-skype"></i></a></li>
</ul>
<div class="search">
<form role="form">
<input type="text" class="search-form" autocomplete="off" placeholder="Search">
<i class="fa fa-search"></i>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<nav class="navbar navbar-inverse" role="banner">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="index.html"><img src="images/logo2.png" alt="logo"></a>
</div>
<div class="collapse navbar-collapse navbar-right">
<ul class="nav navbar-nav">
<li ><a href="index.php">Home</a></li>
<li><a href="about-us.php">About Us</a></li>
<li><a href="prayers.php">Prayers</a></li>
<li><a href="portfolio.php">Gallery</a></li>
<li><a href="contact-us.php">Contact</a></li>
</ul>
</div>
</div>
</nav>
</header>
<section id="contact-info">
<div class="container">
<div class="center">
<h2>Please fill your detail</h2>
<p class="lead">We never like to accept anything againt the law. Please proceed accordingly</p>
</div>
<div class="row contact-wrap">
<div class="status alert alert-success" style="display:none"></div>
<form id="main-contact-form" class="contact-form" name="contact-form" method="post">
<div class="col-sm-8 col-sm-offset-1">
<div class="main">
	<form action="#" id="payment_form">
    <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" class="form-control" />
    <input type="hidden" id="surl" name="surl" class="form-control" value="<?php echo getCallbackUrl(); ?>" />
    <div class="dv">
    <span><input type="hidden" id="key" name="key" placeholder="Merchant Key" class="form-control" value="rjQUPktU" /></span>
    </div>
    
    <div class="dv">
    <span><input type="hidden" id="salt" name="salt" placeholder="Merchant Salt"class="form-control" value="e5iIg1jwi8" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Transaction ID:</label></span>
    <span><input type="hidden" id="txnid" name="txnid" placeholder="Transaction ID" class="form-control" value="<?php echo  "Txn" . rand(10000,99999999)?>" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Amount in Rs:</label></span>
    <span><input type="text" id="amount" name="amount" class="form-control" placeholder="Amount" value="1000.00" /></span>    
    </div>
    
    <div class="dv">
    <span><input type="hidden" id="pinfo" name="pinfo" placeholder="Product Info" class="form-control" value="P01" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Full Name:</label></span>
    <span><input type="text" id="fname" name="fname" placeholder="Full Name" class="form-control" value="" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Email ID:</label></span>
    <span><input type="text" id="email" name="email" placeholder="Email ID"  class="form-control" value="" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Mobile/Cell Number:</label></span>
    <span><input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile/Cell Number" value="" /></span>
    </div>
    
    <div class="dv">
    <span><input type="hidden" id="hash" name="hash"  class="form-control" placeholder="Hash" value="" /></span>
    </div>
    
    
    <div class="form-group"><input type="submit" value="Donate" onclick="launchBOLT(); return false;" /></div>
	</form>
</div>
</div>
</form>
</div>
</div>
</section>

<section id="bottom">
<div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
<div class="row">
<div class="col-md-3 col-sm-6">
<div class="widget">
<h3>Information</h3>
<ul>
<li><a href="contact-us.php">Learn Quran</a></li>
<li><a href="contact-us.php">Become a Hafiz</a></li>
<li><a href="contact-us.php">Become a Aalim</a></li>
<li><a href="contact-us.php">Become a Qaari</a></li>
<li><a href="about-us.php">Learn about us</a></li>
</ul>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="widget">
<h3>Events</h3>
<ul>
<li><a href="#">Polio Drop Vaccination</a></li>
<li><a href="#">Other Vaccination</a></li>
</ul>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="widget">
<h3>Volunteer</h3>
<ul>
<li><a href="#">Mohd Amir Ziya</a></li>
<li><a href="#">Naved Hamza</a></li>
<li><a href="contact-us.php">Join as Volunteer</a></li>
</ul>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="widget">
<h3>Recommended Links</h3>
<ul>
<li><a href="index.php">Madarsa Subhania</a></li>
</ul>
</div>
</div>
</div>
</div>
</section>
<footer id="footer" class="midnight-blue">
<div class="container">
<div class="row">
<div class="col-sm-6">
&copy; 2019 Darul Uloom Subhania. All Rights Reserved. By <a target="_blank" href="http://witsof.com/" title="Developed by">Witsof</a>
</div>
<div class="col-sm-6">
<ul class="pull-right">
<li><a href="index.php">Home</a></li>
<li><a href="about-us.php">About Us</a></li>
<li><a href="prayers.php">Prayers</a></li>
<li><a href="portfolio.php">Gallery</a></li>
<li><a href="contact-us.php">Contact</a></li>
</ul>
</div>
</div>
</div>
</footer>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/main.js"></script>
<script src="js/wow.min.js"></script>
<script type="text/javascript"><!--
$('#payment_form').bind('keyup blur', function(){
	$.ajax({
          url: 'donate.php',
          type: 'post',
          data: JSON.stringify({ 
            key: $('#key').val(),
			salt: $('#salt').val(),
			txnid: $('#txnid').val(),
			amount: $('#amount').val(),
		    pinfo: $('#pinfo').val(),
            fname: $('#fname').val(),
			email: $('#email').val(),
			mobile: $('#mobile').val(),
			udf5: $('#udf5').val()
          }),
		  contentType: "application/json",
          dataType: 'json',
          success: function(json) {
            if (json['error']) {
			 $('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
            }
			else if (json['success']) {	
				$('#hash').val(json['success']);
            }
          }
        }); 
});
//-->
</script>
<script type="text/javascript"><!--
function launchBOLT()
{
	bolt.launch({
	key: $('#key').val(),
	txnid: $('#txnid').val(), 
	hash: $('#hash').val(),
	amount: $('#amount').val(),
	firstname: $('#fname').val(),
	email: $('#email').val(),
	phone: $('#mobile').val(),
	productinfo: $('#pinfo').val(),
	udf5: $('#udf5').val(),
	surl : $('#surl').val(),
	furl: $('#surl').val(),
	mode: 'dropout'	
},{ responseHandler: function(BOLT){
	console.log( BOLT.response.txnStatus );		
	if(BOLT.response.txnStatus != 'CANCEL')
	{
		//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
		var fr = '<form action=\"'+$('#surl').val()+'\" method=\"post\">' +
		'<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
		'<input type=\"hidden\" name=\"salt\" value=\"'+$('#salt').val()+'\" />' +
		'<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
		'<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
		'<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
		'<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
		'<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
		'<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
		'<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
		'<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
		'<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
		'</form>';
		var form = jQuery(fr);
		jQuery('body').append(form);								
		form.submit();
	}
},
	catchException: function(BOLT){
 		alert( BOLT.message );
	}
});
}
//--
</script>
</body>
</html>