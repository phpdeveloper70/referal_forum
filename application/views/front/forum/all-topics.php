<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Referal forum - All Topic</title>
<link href="<?php echo base_url('assets/front/') ?>css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/style.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/responsive.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/aos.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/font-awesome.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<style>
.naseem{color: #696969 !important;   font-size: 14px;}
.naseem span a{font-size: 12px !important; }
</style>
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
					<span class="forum-left-heading">All Topics</span>
					<span class="forum-right-heading pull-right"></span>
				</div>
				<div class="block-table forum-step">
					<div class="table-responsive">
						<table class="table">
							<?php //print_r($RESULT['topics']); ?>
							<?php foreach($RESULT as $topic): ?>
							<?php $comments = $this->forum_model->count_all_post_comments_reply($topic->id); ?>
							<?php $upvote_data = $this->forum_model->get_upvote_data($topic->id); ?>
							<tr>
								<td width="100%">
									<div class="media">
										<div class="media-body">
											<h4 class="media-heading">
											<a href="<?php echo base_url('topic/'.create_slug($topic->category_name).'/'.create_slug($topic->title).'_'.encode_url($topic->id)); ?>"><?php echo $topic->title; ?></a></span></h4>
											<div class="step-down" ><strong><?php echo $topic->full_name; ?></strong> <?php echo get_timeago(strtotime($topic->create_date)); ?> in <strong><?php echo $topic->category_name;  ?></strong></div>
											<div class="naseem"><?php echo substr($topic->description,0,160); ?> .. <span><a href="<?php echo base_url('topic/'.create_slug($topic->category_name).'/'.create_slug($topic->title).'_'.encode_url($topic->id)); ?>"> [read more]</a></span></div>
											<div class="step-down" >&nbsp;&nbsp;<strong><?php echo $comments[0]->total_comments; ?> Replies</strong> </div>
										</div>
									</div>
								</td>								
							</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>

				<div class="clearfix"></div>				                                                                                                                                                           
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
								<p><a style="font-size: 14px;" href="<?php echo base_url('forum/'.create_slug($posts->category_name).'/'.create_slug($posts->title).'_'.encode_url($posts->id)); ?>"><?php echo $posts->title; ?></a></p>
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
									<a href="<?php echo base_url('forum/'.create_slug($cats->title).'_'.encode_url($cats->id)); ?>"><?php echo $cats->title; ?></a></h4>
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

<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>