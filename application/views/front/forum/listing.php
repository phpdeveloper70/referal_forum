<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Referal forum - <?php echo $RESULT['category'][0]->title; ?></title>
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
<section class="login-form forum-down">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-md-9">
				<div class="forum-page">
					<span class="forum-left-heading"><?php echo $RESULT['category'][0]->title; ?></span>
					<span class="forum-right-heading pull-right">last Post</span>
				</div>
				<div class="block-table forum-step">
					<div class="table-responsive">
						<table class="table">
							<?php foreach($RESULT['topics'] as $topic): ?>
							<?php $comments = $this->forum_model->count_all_post_comments_reply($topic->id); ?>
							<?php $upvote_data = $this->forum_model->get_upvote_data($topic->id); ?>
							<tr>
								<td width="44%">
									<div class="media">
										<div class="media-body">
											<h4 class="media-heading">
											<a href="<?php echo base_url('topic/'.create_slug($RESULT['category'][0]->title).'/'.create_slug($topic->title).'_'.encode_url($topic->id)); ?>"><?php echo $topic->title; ?></a></span></h4>
											<p class="step-down">Started by <?php echo $topic->full_name; ?>, <?php echo get_timeago(strtotime($topic->create_date)); ?></p>
										</div>
									</div>
								</td>
								<td width="25%">
									<span><strong>Threads:</strong> <?php echo $comments[0]->total_comments; ?></span><br>
									<span><strong>Upvoted:</strong> <?php echo count($upvote_data); ?></span>
								</td>
								<td>
									<div class="media">
										<div class="media-body">
											<span class="plane-styles"><strong><?php echo $topic->full_name; ?></strong></span><br>
											<span class="time-style"><?php echo get_date_with_time($topic->create_date); ?></span>
										</div>
									</div>
								</td>
							</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
<?php $current_url = uri_string(); ?>
<?php $user_id = $this->session->userdata('USER_ID'); ?>
<?php if(empty($user_id)){ $login_url = base_url('user/login').'?redirect='.$current_url; } ?>
				<div class="row">
					<div class="col-sm-3">
						<div class="add-new">
							<?php if(!empty($user_id)){ ?>
							<a href="javascript:void();" onclick="add_topic();">+ New Topic</a>
							<?php }else{ ?>
							<a href="<?php echo $login_url; ?>">+ New Topic</a>
							<?php } ?>
						</div>    
					</div>    
					<div class="col-sm-9">
						<div class="page-nation">
							<ul class="pagination pagination-large pull-right">
								<li class="disabled"><span><i class="fa fa-long-arrow-up" aria-hidden="true"></i></span></li>
								<li class="active"><span>1</span></li>
								<li><a href="#">2</a></li>
								<li><a rel="next" href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-6 col-step">
					<div class="who-online">
						<h5><i class="fa fa-globe"></i> Who is online</h5>
						<p>Users browsing this forum: antiminign & 6 guests.</p>
					</div>
				</div>
				<div class="col-sm-6 col-step2">
					<div class="right-forum">
						<h5>Forum Permission</h5>  
						<ul>
							<li><i class="fa fa-check-circle" aria-hidden="true"></i> You <strong>can</strong> post new topics in this forum</li>
							<li><i class="fa fa-check-circle" aria-hidden="true"></i> You <strong>can</strong> reply to topics in this forum</li>
							<li><i class="fa fa-times-circle" aria-hidden="true"></i> You <strong>cannot</strong> edit your posts in this forum</li>
							<li><i class="fa fa-times-circle" aria-hidden="true"></i> You <strong>cannot</strong> delete your posts in this forum</li>
							<li><i class="fa fa-times-circle" aria-hidden="true"></i> You <strong>cannot</strong> post attachments in this forum</li>
						</ul>
					</div>
				</div>                                                                                                                                                              
			</div> <!-- End Column  --->
           <?php $recent_posts = $this->forum_model->all_topic_data_with_reletion(); ?>
			<div class="col-sm-4 col-md-3">
				<?php if(count($recent_posts)>0){ ?>
				<div class="recent-post">
					<h3 class="forum-title">Recent Topics</h3>
					<hr class="forum-line">      
					<ul class="forum-topic">
						<?php foreach($recent_posts as $posts): ?>
						<li>
							<div class="detail-desc">
								<p><a style="font-size: 14px;" href="<?php echo base_url('topic/'.create_slug($posts->category_name).'/'.create_slug($posts->title).'_'.encode_url($posts->id)); ?>"><?php echo $posts->title; ?></a></p>
								<span class="forum-user" title="<?php echo $posts->full_name; ?>"><i class="fa fa-user"></i> <?php echo substr($posts->full_name,0,6); ?></span>
								<span class="forum-time"><i class="fa fa-clock-o"></i> <?php echo date('d F Y, h:i',strtotime($posts->create_date)); ?></span>
							</div>
						</li>
					<?php endforeach; ?> 						
					</ul>    
				</div>
				<?php } ?>
				<div class="select-category">
					<h3 class="cat-title">Select a Category</h3>
					<hr class="cat-line">
					<ul>
						<?php foreach($all_cat as $cats): ?>
						<li>
							<div class="media">
								<div class="media-body">
									<h4 class="media-heading">
									<a href="<?php echo base_url('topics/'.create_slug($cats->title).'_'.encode_url($cats->id)); ?>"><?php echo $cats->title; ?></a></h4>
								</div>								
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div> <!-- End Column -->      
			<div class="clearfix"></div>
	    </div> <!-- End Row -->
    </div> <!-- End Container  -->
</section>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Add New Topic</h3>
			</div>
			<form action="#" id="topic_form" class="form-horizontal"> 
				<div class="modal-body form">				      
					<div class="form-body"> 
						<div class="form-group">
							<label class="col-sm-3 control-label">Forum Category</label>
							<div class="col-sm-9">
								<select name="cat_id"  id="category_id"  class="form-control" style="width:240px;" required>
									<option value="">Select category</option>
									<?php foreach($all_cat as $cats): ?>
										<option value="<?php echo $cats->id; ?>"><?php echo $cats->title; ?></option>
									<?php endforeach; ?>
								</select>  
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Title</label>
							<div class="col-sm-9">
								<input type="text" name="title" required id="title" value="" class="form-control">
							</div>
						</div>						
						<div class="form-group">
							<label class="col-sm-3 control-label"> Description</label>
							<div class="col-sm-9">
								<textarea class="form-control ckeditor" required name="description" rows="4" cols="50" id="description"></textarea>
							</div>
						</div>
						<!--
						<div class="form-group">
							<label class="col-sm-3 control-label">Status</label>
							<div class="col-sm-9" >
								<select name="status" required class="form-control">
									<option value="">Select Status</option>
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
							</div>
						</div>-->							  
					</div>				
				</div>				
				<div class="modal-footer">
					<button type="submit" id="btnSavedata" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</form>	
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  <!-- End Bootstrap modal -->

<?php $this->load->view('front/layout/footer.php') ?>
<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
<script class="example">
$(document).ready(function(){
	$('#topic_form').parsley();
	$('#topic_form').submit(function(e) { 
        e.preventDefault();
        if ( $(this).parsley().isValid() )
		{
			$.ajax({
				url:'<?php echo base_url('forums/save_topic'); ?>',
				method:'post',
				data:$(this).serialize(),
				cache: false,
				success: function(response_data)
				{
					if(response_data==1)
					{
						location.reload();
					}	
					else
					{
						alert('oops somthing wrong');
					}
				}
				/* error: function()
				{
					alert('oops somthing wrong');
				} */
			});
        }
    });
});

function add_topic()
{
    save_method = 'add';
    $('#topic_form')[0].reset(); // reset form on modals
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add New Topic'); // Set Title to Bootstrap modal title
}
</script>
</body>
</html>