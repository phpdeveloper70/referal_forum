<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Referal Forum | All Topics</title>
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
		<h1>All Topics</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">All Topics</li>
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
						<th width="5%">ID</th>
						<th>Title</th>
						<th width="15%">Categoty</th>
						<th width="10%">Posted By</th>
						<th width="5%">Replies</th>
						<th width="5%">Reports</th>
						<th width="5%">Status</th>
						<th width="12%">Posted Date</th>	
						<th width="10%">Action</th>	
					</tr>
                </thead>
				<?php if(count($RESULT)>0){ ?>
                <tbody>
				<?php $no=0; foreach($RESULT as $record){ $no++; ?>	
				<?php $reports = $this->forum_model->get_topic_report($record->id); ?>	
					<tr>
						<td><?php echo $record->id; ?></td>
						<td><?php echo $record->title; ?></td>
						<td><?php echo $record->category_name; ?></td>
						<td><?php echo $record->user_name; ?></td>
						<td><?php echo $record->total_comments; ?></td>
						<td><a href="#" id="dispaypass" class="btn btn-info btn-xs" <?php if(count($reports)>0){ ?>onclick="show_report('<?php echo $record->id; ?>')" <?php } ?>>(<?php echo count($reports); ?>) show</a></td>		
						<td>
							<?php if($record->status==1){ ?>
							<span class="label label-success">Active</span>
							<?php }else{ ?>
							<span class="label label-danger">Inactive</span>
							<?php }?>	
						</td>
						<td><?php echo $record->create_date; ?></td>	
						<td >
							<a href="<?php echo base_url('admin/forum/topic_edit/'.$record->id); ?>" class="btn  btn-success btn-xs"><i class="fa fa-fw fa-edit"></i>Edit</a>
							<!--<a href="#" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs"><i class="fa fa-fw fa-trash"></i>Delete</a>-->
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
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Report</h4>
				</div>
				<div class="modal-body" id="response_data">
					<p></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
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

function show_report(TOPIC_ID)
{
	$('#myModal').modal('show');
	$('#response_data').load("<?php echo base_url('admin/forum/ajax_roports/'); ?>"+TOPIC_ID);
}

</script>
</body>
</html>
