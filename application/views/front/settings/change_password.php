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
			<li><a href="#">Setting</a></li>
			<li class="active">Change Password</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<section class="profile-page">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-4 custom-pad">
				<?php $this->load->view('front/layout/user-left-sidebar'); ?>    
			</div>
    
			<div class="col-md-9 col-sm-8">
				<div class="tab-content">
					<div class="tab-pane active" id="profile">					
						<div class="change-password">
							<h3>Change Password</h3>
							<?php echo $this->session->flashdata('msg'); ?>	
							<form class="changepassword" id="profile_form" method="post">
								<input type="hidden" value="<?php echo $RESULT[0]->password; ?>" name="form_key">
								<div class="form-group">
									<label>Old Password</label>
									<input type="password" name="opwd" placeholder="Old Password" class="form-control custom-size" required> 
								</div>
                
								<div class="form-group">
									<label>New Password</label>
									<input type="password" name="npwd" placeholder="New Password" class="form-control custom-size" id='npwd' required> 
								</div>
                
								<div class="form-group">
									<label>Confirm Password</label>
									<input type="password" name="cpwd" placeholder="Confirm Password" class="form-control custom-size" data-parsley-equalto="#npwd" required> 
								</div>
        		
								<div class="form-group">
									<input type="submit" value="Change Password" name="changepass" class="form-control custom-size changpassword-btn">
								</div>
							</form>
						</div>
					</div> 
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