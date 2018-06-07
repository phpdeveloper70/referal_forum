<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Referal forum - change password</title>
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
<?php $this->load->view('front/layout/header'); ?>
<!--- End Header -->

<div class="bottom-line">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <ul class="breadcrumb custom-breadcrumb">
			<li><a href="#">Home</a></li>
			<li><a href="#">User</a></li>
			<li class="active">Notifications</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<section class="profile-page">
	<div class="container">
    <div class="row">
      <div class="col-sm-8 col-md-9">
		<div class="notification-single">
		<ul>     
			<li>
				<div class="wrap-notify">
					<div class="title-notification">
						<p>sdgfdgdfgdf</p>
						<p><span class="date-notify">Date:</span> 13/03/2018</p>
					</div> 
					<div class="clearfix"></div>					
				</div>
			</li>  
      </ul>  
      </div>	
           </div>
           
      <!-- Colmn End -->
      
      <div class="col-sm- col-md-3">
      <div class="banner-side">
      <img src="images/side-banner.jpg">
      </div>
      
      
      <div class="slider">
      <div class="leader-header">
        <h1 class="leader-title feature-art">Featured ArtWork</h1>
        </div>
      <div id="myCarousel" class="carousel slide">        
                <div class="carousel-inner">           
                    <div class="item"> 
                    	<a href="#"><img class="img-responsive" src="images/slider.jpg" alt="Slide1"></a>
                        <div class="caption slider-txt">
                       	  <h4>Artwork heading will be here with some texts</h4>
                          <span>3 hours ago /</span> <span class="users">by Username</span>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr..  </p>
                        </div>
                    </div>
                    <div class="item active"> 
                    	<a href="#"><img cclass="img-responsive" src="images/slider.jpg" alt="Slide2"></a>
                        <div class="caption slider-txt">
                       	  <h4>Artwork heading will be here with some texts</h4>
                          <span>3 hours ago /</span> <span class="users">by Username</span>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr... </p>
                        </div>                                                           
                     </div>  
                    <div class="item"> 
                    	<a href="#"><img class="img-responsive" src="images/slider.jpg" alt="Slide3"></a>
                        <div class="caption slider-txt">
                       	  <h4>Artwork heading will be here with some texts</h4>
                          <span>3 hours ago /</span> <span class="users">by Username</span>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr..  </p>
                        </div>                        
                    </div>                                                                                   
                </div>
                 <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                    <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                  </ol>                                                                 
            </div><!-- End Carousel -->  
            
            </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</section>

<?php $this->load->view('front/layout/footer.php') ?>
<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
<script class="example">
$(document).ready(function(){
	$('#profile_form').parsley();	
});
</script>
</body>
</html>