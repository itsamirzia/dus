<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "rjQUPktU";

// Merchant Salt as provided by Payu
$SALT = "e5iIg1jwi8";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
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
  <body class="homepage" onload="submitPayuForm()">
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
    <br/>
    <?php if($formError) { ?>
	

      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? '1000' : $posted['amount'] ?>" /></td>
		  </tr>
        <tr>
          <td>Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? 'Ziya' : $posted['firstname']; ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? 'itsamirzia@gmail.com' : $posted['email']; ?>" /></td>
        </tr>
        <tr>  
		  <td>Phone: </td>
          <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? '9891019847' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          <td>Address1: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? 'OP' : $posted['productinfo'] ?></textarea></td>
        </tr>
        <tr>
          <td colspan="3"><input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? 'http://localhost/dus/success.php' : $posted['surl'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td colspan="3"><input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? 'http://localhost/dus/failure.php' : $posted['furl'] ?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

        <tr>
          <td><b>Optional Parameters</b></td>
        </tr>
        <tr>
          <td><input type="hidden" name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
          <td><input type="hidden" name="curl" value="http://localhost/dus/failure.php" /></td>
        </tr>
        <tr>
          <td>Address2: </td>
          <td><input name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
          <td><input type= "hidden" name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
        </tr>
        <tr>
          <td>City: </td>
          <td><input name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
          <td>State: </td>
          <td><input name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
        </tr>
        <tr>
          <td>Country: </td>
          <td><input name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
          <td>Zipcode: </td>
          <td><input name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
        </tr>
        <tr>
          <td><input name="udf1" type="hidden" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
          <td><input name="udf2" type="hidden" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
        </tr>
        <tr>
          <td><input type="hidden" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
          <td><input type="hidden" name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
        </tr>
        <tr>
          <td><input type="hidden" name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
          <td><input type="hidden"  name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
        </tr>
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
	</div>
	</section>
	<?php 
	include 'footer.php';
	?>
