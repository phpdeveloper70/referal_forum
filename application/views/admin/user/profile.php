<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Referal Forum | Users Profile</title>
  <?php $this->load->view('admin/layout/head_css'); ?>
  <style>
  .tab-content {
    background: #fff;
    padding: 10px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}
.nav-tabs-custom{margin-bottom: 0px;}
table{width:100%;}
.post tr td{padding:10px;}
.hidden_password{border: none; font-size: 27px; width: 120px;}
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view('admin/layout/header'); ?>	
  <!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('admin/layout/sidebar'); ?>	
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>User Profile</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="">Users</li>
			<li class="active">Profile</li>	
		</ol><br>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?php echo base_url('admin/user/all'); ?>" class="btn btn-info">Back</a>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes --> 
		<div class="row"> 
			<div class="box-body">				
				<?php echo $this->session->flashdata('msg'); ?>
				<div class="col-md-3">
					<div class="box box-primary">
						<div class="box-body box-profile">
							<img class="profile-user-img img-responsive img-circle" src="<?php echo check_profile_pic('uploads/profile_pic/',$RESULT[0]->image); ?>" alt="User profile picture">
							<h3 class="profile-username text-center"><?php echo $RESULT[0]->fname.' '.$RESULT[0]->lname; ?></h3>
							<p class="text-muted text-center">Join Date: <?php echo $RESULT[0]->create_date; ?></p>
							<?php if($RESULT[0]->status==1){ ?>
							<a href="#" class="btn btn-success btn-block"><b>Active</b></a>
							<?php }else{ ?>
							<a href="#" class="btn btn-danger btn-block"><b>Inactive</b></a>
							<?php } ?>
							<ul class="list-group list-group-unbordered">
								<li class="list-group-item">
									<b>Total Topic Post</b> <a class="pull-right">1</a>
								</li>
								<li class="list-group-item">
									<b>Thanks</b> <a class="pull-right">8</a>
								</li>
								<li class="list-group-item">
									<b>Reply</b> <a class="pull-right">3</a>
								</li>
							</ul>					 
						</div>
					</div>
				</div>
				
				<div class="col-md-9">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#activity" data-toggle="tab">Profile</a></li>
							<li><a href="#settings" class="edit_profile_tab" data-toggle="tab">Edit Profile</a></li>
							<li><a href="#change_password" data-toggle="tab">Change Password</a></li>
						</ul>
					</div>
				
				<div class="tab-content">
					<div class="active tab-pane" id="activity">
						<div class="post">                  
							<table>
								<tr>
									<td><strong>Name: </strong></td>
									<td><?php echo $RESULT[0]->fname.' '.$RESULT[0]->lname; ?></td>
								</tr>
								<tr>
									<td><strong>Email: </strong></td>
									<td><?php echo $RESULT[0]->email; ?></td>
								</tr>
								<tr>
									<td><strong>Password: </strong></td>
									<td>
										<input readonly type="password" class="hidden_password" value="<?php echo base64_decode($RESULT[0]->password); ?>" id="pass_dup">
										<a href="#" id="dispaypass" class="btn btn-info btn-xs">show</a>
									</td>
								</tr>
								<tr>
									<td><strong>About: </strong></td>
									<td><?php echo $RESULT[0]->about; ?></td>
								</tr>								
								<tr>
									<td><strong>DOB: </strong></td>
									<td><?php echo $RESULT[0]->dob; ?></td>
								</tr>
								<tr>
									<td><strong>Gender: </strong></td>
									<td><?php echo $RESULT[0]->gender; ?></td>
								</tr>
								<tr>
									<td><strong>Address: </strong></td>
									<td><?php echo $RESULT[0]->address; ?></td>
								</tr>
								<tr>
									<td><strong>City: </strong></td>
									<td><?php echo $RESULT[0]->city; ?></td>
								</tr>
								<tr>
									<td><strong>State: </strong></td>
									<td><?php echo $RESULT[0]->state; ?></td>
								</tr>
								<tr>
									<td><strong>Status: </strong></td>
									<td><?php echo $RESULT[0]->status; ?></td>
								</tr>
							</table>               
						</div>
					</div>
					<div class="tab-pane" id="settings">
						<form class="form-horizontal post" method="post" id="profile_form" enctype="multipart/form-data">
							<table>
								<tr>
									<td><strong>First Name: </strong></td>
									<td><input type="text" name="fname" class="form-control" value="<?php echo $RESULT[0]->fname; ?>" required></td>
								</tr>
								<tr>
									<td><strong>Last Name: </strong></td>
									<td><input type="text" name="lname" class="form-control" value="<?php echo $RESULT[0]->lname; ?>" required></td>
								</tr>
								<tr>
									<td><strong>Profile Picture </strong></td>
									<td><input type="file" name="image" >
										<img src="<?php echo check_profile_pic('uploads/profile_pic/',$RESULT[0]->image); ?>" style='max-width:40px;'><input type="hidden" name="old_image" value="<?php echo $RESULT[0]->image; ?>" >
									</td>
								</tr>
								<tr>
									<td><strong>About: </strong></td>
									<td><input type="text" name="about" class="form-control" value="<?php echo $RESULT[0]->about; ?>" ></td>
								</tr>								
								<tr>
									<td><strong>DOB: </strong></td>
									<td><input type="text" name="dob" class="form-control" value="<?php echo $RESULT[0]->dob; ?>" ></td>
								</tr>
								<tr>
									<td><strong>Gender: </strong></td>
									<td>
										<select class="form-control"  name="gender" required>
											<option value="male" <?php echo($RESULT[0]->gender=='male')?'selected':''; ?> >Male</option>
											<option value="famale" <?php echo($RESULT[0]->gender=='famale')?'selected':''; ?> >Female</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><strong>Address: </strong></td>
									<td><input type="text" name="address" class="form-control" value="<?php echo $RESULT[0]->address; ?>" ></td>
								</tr>
								<tr>
									<td><strong>City: </strong></td>
									<td><input type="text" name="city" class="form-control" value="<?php echo $RESULT[0]->city; ?>" ></td>
								</tr>
								<tr>
									<td><strong>State: </strong></td>
									<td><input type="text" name="state" class="form-control" value="<?php echo $RESULT[0]->state; ?>" ></td>
								</tr>
								<tr>
									<td><strong>Status: </strong></td>
									<td>
										<select class="form-control"  name="status" required>
											<option value="1" <?php echo($RESULT[0]->status==1)?'selected':''; ?> >Active</option>
											<option value="0" <?php echo($RESULT[0]->status==0)?'selected':''; ?> >Inactive</option>
										</select>
									</td>
								</tr>
							</table> 
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <button type="submit" class="btn btn-danger" name="update_profile">Update Profile</button>
								</div>
							</div>
						</form>
					</div>
					
					
					<div class="tab-pane" id="change_password">
						<form class="form-horizontal post" method="post" id="changepassword_form">
							<table>
								<tr>
									<td><strong>New Password: </strong></td>
									<td><input type="password" name="npwd" class="form-control" value="" required></td>
								</tr>
								<tr>
									<td><strong>Confirm Password: </strong></td>
									<td><input type="password" name="opwd" class="form-control" value="" required></td>
								</tr>								
							</table> 
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <button type="submit" class="btn btn-danger" name="update_password">Submit</button>
								</div>
							</div>
						</form>
					</div>
					
					
				</div>	
				</div>
            </div>
		</div>
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->  
<?php $this->load->view('admin/layout/footer'); ?>
</div>
<!-- ./wrapper -->
<?php $this->load->view('admin/layout/footer_js'); ?>
<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
<script class="example">
$(document).ready(function(){ 
	$('#profile_form').parsley();
	var hashStr = location.hash.replace("#","");
	if(hashStr=='settings')
	{
		$('.edit_profile_tab').click();
	}
	
	$('#dispaypass').click(function(){
		var check_event = $(this).html();
		if(check_event=='show')
		{
			$('.hidden_password').prop('type','text');
			$(this).html('hide');
		}
		else
		{
			$('.hidden_password').prop('type','password');
			$(this).html('show');
		}
	});
	
});
</script>
</body>
</html>
