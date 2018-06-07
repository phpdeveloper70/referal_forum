<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Referal Forum | Users Listing</title>
  <?php $this->load->view('admin/layout/head_css'); ?>
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/datatables/dataTables.bootstrap.css'); ?>">
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
		<h1>All Users</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">All Users</li>			
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<div class="box">
			<div class="box-body">
			<?php echo $this->session->flashdata('msg'); ?>
			<table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
						<th>SNo.</th>
						<th>Full Name</th>
						<th>Email</th>
						<th>Topics</th>
						<th>Plan</th>
						<th>Status</th> 
						<th>joining Date</th>
						<th>Action</th>	
					</tr>
                </thead>
				<?php if(count($RESULT)>0){ ?>
                <tbody>
				<?php $no=0; foreach($RESULT as $record){ $no++; ?>
				<?php $posts = $this->forum_model->select_topics_by_user_id($record->id); ?>	
					<tr>
						<td width="7%"><?php echo $no; ?></td>
						<td><?php echo $record->fname.' '.$record->lname; ?></td>
						<td><?php echo $record->email; ?></td>
						<td><?php echo count($posts); ?></td>
						<td><?php echo $record->plan; ?></td>
						<td width="15%">
							<?php if($record->status==1){ ?>
							<span class="label label-success">Active</span>
							<?php }else{ ?>
							<span class="label label-danger">Inactive</span>
							<?php }?>	
						</td>
						<td><?php echo $record->create_date; ?></td>	
						<td width="15%">
							<a href="<?php echo base_url('admin/user/profile/'.$record->id); ?>#settings" class="btn  btn-success btn-xs"><i class="fa fa-fw fa-edit"></i>Edit</a>
							<a href="<?php echo base_url('admin/user/profile/'.$record->id); ?>" class="btn  btn-primary btn-xs"><i class="fa fa-fw fa-eye"></i>View</a>	
						</td>	
					</tr>
				<?php } ?>	
                </tbody> 
				<?php } ?>	
            </table>
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
<script src="<?php echo base_url('assets/admin/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script>
  $(function () {
    $("#example1").DataTable();   
		
  });
</script>
</body>
</html>
