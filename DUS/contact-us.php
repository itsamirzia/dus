<?php 
include 'header.php';
?>
<section id="contact-info">
<div class="center">
<h2>How to Reach Us?</h2>
<p class="lead">You can reach us on below address and contact.</p>
</div>
<div class="gmap-area">
<div class="container">
<div class="row">
<div class="col-sm-5 text-center">
<div class="gmap">
<iframe src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=machhariya%20road%2C%20naya%20gaon%2C%20near%20mini%20bypass%2C%20moradabad+(Darul%20Uloom%20Subhania)&ie=UTF8&t=&z=20&iwloc=A&output=embed" width="600" height="450" frameborder="0" style="border:0"></iframe>

</div>
</div>
<div class="col-sm-7 map-content">
<ul class="row">
<li class="col-sm-12">
<address>
<h5>Madarsa Darul Uloom Subhania</h5>
<p>Gram Sirsa, Machhariya Road, <br>
 Naya Gaon, Moradabad, UP, India</p>
<p>Phone:(+91)863-026-5692 <br>
Email Address:info@raahemustaqeem.com</p>
</address>
</li>
</ul>
</div>
</div>
</div>
</div>
</section>
<section id="contact-page">
<div class="container">
<div class="center">
<h2>Drop Your Message</h2>
<p class="lead">If you have any query. Please drop us a message</p>
</div>
<div class="row contact-wrap">
<div class="status alert alert-success" style="display:none"></div>
<form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
<div class="col-sm-5 col-sm-offset-1">
<div class="form-group">
<label>Name *</label>
<input type="text" name="name" class="form-control" required="required">
</div>
<div class="form-group">
<label>Email *</label>
<input type="email" name="email" class="form-control" required="required">
</div>
<div class="form-group">
<label>Phone</label>
<input type="number" class="form-control">
</div>
<div class="form-group">
<label>Company Name</label>
<input type="text" class="form-control">
</div>
</div>
<div class="col-sm-5">
<div class="form-group">
<label>Subject *</label>
<input type="text" name="subject" class="form-control" required="required">
</div>
<div class="form-group">
<label>Message *</label>
<textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
</div>
<div class="form-group">
<button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button>
</div>
</div>
</form>
</div>
</div>
</section>
<?php 
include 'footer.php';
?>