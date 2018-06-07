<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Referal forum - Edit Profile</title>
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
			<li class="active">Edit Profile</li>
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
						<div class="edit-profiles-details">
							<h3>Personal Details</h3>
							<?php echo $this->session->flashdata('msg'); ?>	
							<form method="post" class="setting-form" id="profile_form">  
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>First Name :</label>
											<input type="text" class="form-control" value="<?php echo $RESULT[0]->fname; ?>" name="fname" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Last Name :</label>
											<input type="text" class="form-control" value="<?php echo $RESULT[0]->lname; ?>" name="lname" required>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-sm-6">
										 <div class="form-group">
											<label>Gender :</label>
											<select class="form-control" name="gender">
												<option value="male" <?php echo($RESULT[0]->gender=='male')?'selected':''; ?> >Male</option>
												<option value='female' <?php echo($RESULT[0]->gender=='female')?'selected':''; ?>>Female</option>
											<select>	
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>D.O.B :</label>
											<input type="text" class="form-control" name="dob" value="<?php echo $RESULT[0]->dob; ?>" required>
										</div>
									</div>
									<div class="clearfix"></div>
								
									<div class="col-sm-6">
										<div class="form-group">
											<label>Contact No. :</label>
											<input type="text" class="form-control" name="contact_no" value="<?php echo $RESULT[0]->contact_no; ?>" required data-parsley-minlength="10"  data-parsley-type="digits" data-parsley-trigger="keyup"  >
										</div>
									</div>
								
									<div class="col-sm-6">
										<div class="form-group">
											<label>Address :</label>
											<input type="text" class="form-control" name="address" value="<?php echo $RESULT[0]->address; ?>" required>
										</div>
									</div>
									<div class="clearfix"></div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>City :</label>
											<input type="text" class="form-control" name="city" value="<?php echo $RESULT[0]->city; ?>" required>
										</div>
									</div>
								
									<div class="col-sm-6">
										<div class="form-group">
											<label>State :</label>
											<input type="text" class="form-control" name="state" value="<?php echo $RESULT[0]->state; ?>" required>
										</div>
									</div>
									<div class="clearfix"></div>
									
									<div class="col-sm-12">
										<div class="form-group">
											<label>Bio</label>
											<textarea class="form-control" name="about" required><?php echo $RESULT[0]->about; ?></textarea>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="submit" value="Update" name="updateprofile" class="update-btn">
										</div>
									</div>                
								</div> <!--- Row End -->
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