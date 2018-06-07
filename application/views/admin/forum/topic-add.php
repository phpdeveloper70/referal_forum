<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Referal Forum | Add Topic</title>
  <?php $this->load->view('admin/layout/head_css'); ?>
  <?php $this->load->view('admin/layout/tiny-mce'); ?>
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
      <h1>Add New Topic</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		 <li><a href="<?php echo base_url('admin/forum/topics'); ?>">All Topics</a></li>
        <li class="active">Add New Topic</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="box">
     <div class="box-body">
            <div class="box box-primary">            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" id="form">
              <div class="box-body">
				<div class="form-group">
                  <label for="exampleInputEmail1">User</label>
					<select class="form-control" name="user_id">
						<?php foreach($USER_RESULT as $user){ ?>
						<option value="<?php echo $user->id; ?>"><?php echo $user->fname.' '.$user->lname; ?></option>
						<?php } ?>
					</select>	
				</div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" id="exampleInputEmail1" required placeholder="Enter Title" value="">				  
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
					<select class="form-control" name="cat_id">
						<?php foreach($CAT_RESULT as $cat){ ?>
						<option value="<?php echo $cat->id; ?>"><?php echo $cat->title; ?></option>
						<?php } ?>
					</select>	
				</div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea class="form-control" name="description"></textarea>				  
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label>
                  <select class="form-control" name="status" required>
					<option value='1'>Active</option>
					<option value='0'>Inactive</option>
				  </select>
                </div> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submitform">Update</button>
              </div>
            </form>
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
<script src="http://localhost/forum/assets/admin/parsley/parsley.js"></script>
<script class="example">
$(document).ready(function(){
	$('#form').parsley();
});
</script>
</body>
</html>
