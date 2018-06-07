<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Referal forum - reset password</title>
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

<!--- Home  Page Banner Background -->
<section class="login-form">
<div class="container">
	<div class="login-heading">
		<h1>Reset Password</h1>
		<p>Enter your new password to reset your password.</p>
	</div>

	<div class="row">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="login-area">
				<div class="account-heading">					
					<?php echo $this->session->flashdata('msg'); ?>
				</div>
				<form  class="form-signin" method="post" id="login_form">
					<input type="password" id="npwd" class="form-control" name="npwd" required placeholder="Enter New Password" >
					<input type="password" id="cpwd" class="form-control" name="cpwd" required placeholder="Enter Confirm Password" data-parsley-equalto="#npwd"
					parsley-required="true" data-parsley-trigger="blur">
					<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="reset_password">Submit</button>
				</form><!-- /form -->
				<div class="bottom-login">					
					<div class="clearfix"></div>
					<p class="back-home">
						<a href="<?php echo base_url('user/login'); ?>">
							<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
							Back to login
						</a>
					</p>
			</div>

			</div>
		</div>
	</div>
</div>
</section>
<?php $this->load->view('front/layout/footer.php') ?>
<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
<script class="example">
$(document).ready(function(){
	$('#login_form').parsley();
});
</script>
</body>
</html>