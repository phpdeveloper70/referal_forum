<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Deals - <?php echo $RESULT[0]->title; ?></title>
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
<?php  $this->load->view('front/layout/header'); ?>
<!--- End Header -->
<!--- Home  Page Banner Background -->
<div class="bottom-line">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <ul class="breadcrumb custom-breadcrumb">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
		  <li><a href="<?php echo base_url('deals'); ?>">Deals</a></li>
          <li class="active"><?php echo $RESULT[0]->title; ?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
	<section class="profile-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 id="thread-title" class="ThreadView-title"><?php echo $RESULT[0]->title; ?></h1>
					<div class="thread-details">
						<time class="ThreadView-author-item ThreadView-published">Posted: <?php echo get_timeago(strtotime($RESULT[0]->create_date)); ?></time>
					</div>
					 
					<div class="col-sm-4">					 	    
						<div class="icon-user-reply">
							<img src="<?php echo base_url('uploads/deal/'.$RESULT[0]->image); ?>" style="width:95%;">
						</div>
					</div>
					<div class="col-sm-8">
						<div id="main-post" class="post-content">
							<?php echo $RESULT[0]->description; ?>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</section>	
<?php $deals_data =  $this->deals_model->get_all_active_deals(); ?>
<?php if(count($deals_data)>0){ ?>
<section class="profile-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			    <div class="trending-tops">
					<h3>Others Deals</h3>
				</div>
				<div class="col-sm-12">
					<ul>
					<?php foreach($deals_data as $deal){ ?>
						<li class="list-trend">
							<div class="media">
								<div class="media-left">
									<img src="<?php echo base_url('uploads/deal/'.$deal->image); ?>" width="80">
								</div>
								<div class="media-body trending-list">
									<h5><?php echo $deal->title; ?></h5>
									<p><?php echo substr($deal->description,0,150); ?> <a href="<?php echo base_url('deal/'.create_slug($deal->title).'/'.$deal->id); ?>" style="color:#250386">[Read More]</a></p>					
								</div>

							</div>
						</li>
					<? } ?>
					</ul>
					<a href="<?php echo base_url('deals'); ?>" class="all-trend">View all deals</a>
				</div>
            </div>
		<div class="clearfix"></div>
		</div>
	</div>
</section>
<?php } ?>
<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>