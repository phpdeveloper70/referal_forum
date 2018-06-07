<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home:: Referal</title>
<link href="<?php echo base_url('assets/front/') ?>css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/style.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/responsive.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/aos.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/font-awesome.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
</head>
<body>
<!--- Start Header -->
<?php  $this->load->view('front/layout/header'); ?>
<!--- End Header -->
<!--- Home  Page Banner Background -->
<section class="home-welcome">
	<div class="bg-background">
		<div class="container">
			<div class="row">
				<div class="col-sm-7">
					<div class="background-blue">
						<div class="img-block">
							<img src="<?php echo base_url('assets/front/'); ?>images/welcome.png" class="img-responsive img-banner" alt="Referal Team">
						</div>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="member-quote">
						<h2>Be a Member & <br> Share Forums <br> Earn Rewards <br>Browse Marketplace, <br>Share Deals etc.</h2>
						<div class="quote-btn">
							<a href="">Create an Account</a>
						</div>
					</div>
				</div>
			</div>   <!-- Row End -->
		 </div>
	 </div>
</section>

<section class="how-it-works">
	<div class="container">
		<div class="title-block">
			<h2>How It Works</h2>
			<p>Find out how it works in this section with some details here <br>with more and more text for section and more head texts, paragraphs and quotes</p>
		</div>

		<div class="row">
			<div class="col-sm-3 icon-block pad-t30">
				<div class="icon-box">
					<img src="<?php echo base_url('assets/front/'); ?>images/icon-1.png">
				</div>
				<div class="details-text">
					<h6>Free Simple Signup</h6>
					<p>Some more detail about signup will be here with texts</p>
					<a href="">How It Works</a>
				</div>
			</div>


			<div class="col-sm-3 icon-block pad-t30">
				<div class="icon-box">
					<img src="<?php echo base_url('assets/front/'); ?>images/icon-2.png">
				</div>
				<div class="details-text">
					<h6>Pick a Membership</h6>
					<p>Some more detail about memberships will be here </p>
					<a href="">Signup Now</a>
				</div>
			</div>


			<div class="col-sm-3 icon-block pad-t30">
				<div class="icon-box">
					<img src="<?php echo base_url('assets/front/'); ?>images/icon-3.png">
				</div>
				<div class="details-text">
					<h6>Get Forum Offers</h6>
					<p>Some more detail about memberships will be here </p>
					<a href="">Browse Offers</a>
				</div>
			</div>


			<div class="col-sm-3 icon-block pad-t30">
				<div class="icon-box">
					<img src="<?php echo base_url('assets/front/'); ?>images/icon-4.png">
				</div>
				<div class="details-text">
					<h6>Grab a Deal or Need</h6>
					<p>Some more detail about deals will be here </p>
					<a href="">Grab a Deal</a>
				</div>
			</div>

		</div>

	</div>
</section>
<?php $deals_data =  $this->deals_model->get_all_active_deals(); ?>
<?php if(count($deals_data)>0){ ?>
<section class="deals">
<div class="container">
	<div class="title-block">
		<h2>Top Daily Deals</h2>
		<p>Check out our Daily Deals and programs that run through out the day <br>text will be here with some more texts with some more and more heads and offers</p>
	</div>

	<div class="row">
		<?php foreach($deals_data as $deal){ ?>
		<div class="col-sm-4 forum-block">
			<div class="wrap">
				<div class="forum-bg"><img src="<?php echo base_url('uploads/deal/'.$deal->image); ?>"></div>
				<div class="description">
					<h5><?php echo substr(strip_tags($deal->title),0,25); ?></h5>
					<p><?php echo substr(strip_tags($deal->description),0,150); ?></p>
					<div class="offer-btn">
						<a href="<?php echo base_url('deal/'.create_slug($deal->title).'/'.$deal->id); ?>">Check Offer</a>
					</div>
				</div>
			</div>
		</div>	
		<?php } ?>
	</div><!-- Row End -->
</div>
</section>
<?php } ?>
<section class="connect-social">
	<div class="container">
		<div class="connect-heading">
			<h2>Connect with us on Social Media</h2>
			<p>connect us on our social media plateforms that linked through out the website<br>
		 text will be here with some more texts with some more and more heads and texts.</p>
		</div>
		<div class="social-button">
			<ul class="list-inline outline-img custom-social">
				<li><a href="https://www.facebook.com" target="_blank"><img src="<?php echo base_url('assets/front/'); ?>images/facebook.png">
				<span>Like Us</span>
				</a></li>
				<li><a href="https://www.twitter.com" target="_blank"><img src="<?php echo base_url('assets/front/'); ?>images/twitter.png">
				<span>Follow Us</span>
				</a></li>
				<li><a href="https://www.linkein.com" target="_blank"><img src="<?php echo base_url('assets/front/'); ?>images/linkedin.png">
				<span>Join Us</span>
				</a></li>
				<li><a href="https://www.youtube.com" target="_blank"><img src="<?php echo base_url('assets/front/'); ?>images/youtube.png">
				<span>Watch Us</span>
				</a></li>
			</ul>
		</div>
	</div>
</section>
</div>
<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>