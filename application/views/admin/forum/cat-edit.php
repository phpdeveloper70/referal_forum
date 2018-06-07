<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Referal Forum | Add New Forum Category</title>
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
      <h1>Edit Forum Category</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Forum Category</li>
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
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" id="exampleInputEmail1" required placeholder="Enter Title" value="<?php echo $RESULT[0]->title; ?>">				  
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label>
                  <select class="form-control" name="status" required>
					<option value='1' <?php echo($RESULT[0]->status==1)?'selected':''; ?>>Active</option>
					<option value='0' <?php echo($RESULT[0]->status==0)?'selected':''; ?>>Inactive</option>
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
