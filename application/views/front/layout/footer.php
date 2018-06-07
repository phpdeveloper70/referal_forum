<footer>
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-3 col-md-3 footer-about wow slideInLeft">
<h3>About This Forum</h3>
<hr class="footer-line" />
<p class="footer-about">About forum some informaiton will be here with text text and more texts here and more other details too the website text will be here with some more texts with some more and more heads and texts.</p>
</div>
<div class="col-xs-12 col-sm-3  col-md-3 footer-link  wow slideInUp mb-right">
<h3>Top Categories</h3>
<hr class="footer-line" />
<ul>
<li><a href="<?php echo base_url('how-it-works'); ?>">How it works</a></li>
<li><a href="">Forums</a></li>
<li><a href="<?php echo base_url('membership-plans'); ?>">Membership</a></li>
<li><a href="">Marketplace</a></li>
<li><a href="">Sitemap</a></li>
</ul>
</div>
<div class="col-xs-12 col-sm-3 col-md-3 footer-link  mb-align wow slideInUp">
<h3>Twitter Updates</h3>
<hr class="footer-line" />
<p><strong>@officialfourm</strong> #Destiny2 Fight Night with @Adapt1veTV! 5-8pm EST. t.co/4bLse08a80</p>
<p><strong>@officialfourm #Destiny2</strong> Fight Night with @Adapt1veTV!</p>
</div>
<div class="col-xs-12 col-sm-3 col-md-3  footer-link  wow slideInUp">
<h3>Announcements</h3>
<hr class="footer-line" />
<p><strong>Happy Holidays</strong><br />
Posted Mon, 25 Dec 2017</p>
<p><strong>Winter Sale & Offers</strong><br />
Posted Mon, 2 Jan 2018</p>
</div>


</div>
</div>
</footer>


<div class="copy-right">
<div class="container">
<div class="row">
<div class="col-sm-6">
<p>Copyrights ©  2018 Forum Here. All Rights Reserved. <a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a></p>
</div>
<div class="col-sm-6">
<!--<p class="text-copy">Designed &amp; Developed By <a href="https://www.graphicsmerlin.com/" target="_blank" class="design-develop">Graphics Merlin Studio Pvt. Ltd.</a></p>-->
</div>
</div>
</div>
</div>

<a id="back-to-top" href="#" class="btn-primary btn-lg back-to-top" role="button" title="Back to Top" data-toggle="tooltip" data-placement="top">
<span class="glyphicon glyphicon-chevron-up"></span>
</a>
<!--js--> 
<script src="<?php echo base_url('assets/front/'); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url('assets/front/'); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url('assets/front/'); ?>js/all-function.js"></script>
<script src="<?php echo base_url('assets/front/'); ?>js/function.js"></script> 
<script src="<?php echo base_url('assets/front/'); ?>js/wow.min.js"></script> 
<script src="<?php echo base_url('assets/front/'); ?>js/function.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$(window).scroll(function () {
if ($(this).scrollTop() > 50) {
$('#back-to-top').fadeIn();
} else {
$('#back-to-top').fadeOut();
}
});
// scroll body to 0px on click
$('#back-to-top').click(function () {
$('#back-to-top').tooltip('hide');
$('body,html').animate({
scrollTop: 0
}, 800);
return false;
});


});
</script>
<script>
jQuery(document).ready(function(){
$("#testimonial-slider").owlCarousel({
items:1,
itemsDesktop:[1000,1],
itemsDesktopSmall:[979,1],
itemsTablet:[768,1],
pagination: false,
navigation:true,
navigationText:["",""],
autoPlay:true
});
});
</script>
<script>
AOS.init({
easing: 'ease-out-back',
duration: 1000
});	
$('.hero__scroll').on('click', function(e) {
$('html, body').animate({
scrollTop: $(window).height()
}, 1200);
});
</script>

<script>
$(document).ready(function () {
$('.navbar-default .navbar-nav li').click(function(e) {

$('.navbar-default .navbar-nav li').removeClass('active');

var $this = $(this);
if (!$this.hasClass('active')) {
$this.addClass('active');
}
//e.preventDefault();
});
});
</script>

<script>
$('#myCarousel').carousel({
    	interval:   3000
	});
</script>