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
<?php $this->load->view('front/layout/header'); ?>
<!--- End Header -->

<!--- Home  Page Banner Background -->
<section class="login-form">
<div class="container">

<div class="row">
<div class="col-sm-offset-2 col-sm-8">
<div class="login-area">
<div class="register-heading">
<h3><span>Register Now</span></h3>
<p>Create your account. It's free & only take a minute</p>
</div>
		<?php echo $this->session->flashdata('msg'); ?>
       <form class="form-signin" method="post" action="" id="reg_form">
			<div class="form-group">
                <input type="text"  class="form-control" placeholder="First Name" name='fname' required >
            </div>
            <div class="form-group">
                <input type="text"  class="form-control" placeholder="Last Name" name="lname" required>
            </div>
            <div class="form-group">
                <input type="text"  class="form-control" placeholder="Username" name="username" required >
            </div>
            <div class="form-group">
                <input type="email"  class="form-control" placeholder="Email Address" name="email" required >
            </div>
                
            <div class="form-group">
                <input type="text"  class="form-control" placeholder="Password" name="password" required >
            </div>
            <div id="remember" class="checkbox">
					<label><input type="checkbox" value="remember-me" class="checkbox" required>I accept the <a href="#">Terms of Use</a> & <a href="#">Privacy Policy</a>
                    </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="register">Register Now</button>
        </form><!-- /form -->           
</div>
</div>
</div></div>
</section>
<?php $this->load->view('front/layout/footer.php') ?>
<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
<script class="example">
$(document).ready(function(){
	$('#reg_form').parsley();
});
</script>
</body>
</html>