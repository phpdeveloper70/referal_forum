<?php $user_id = $this->session->userdata('USER_ID'); ?>
<?php
$class =  $this->router->class;
$method = $this->router->method;
?>
<?php if($user_id!=""){ ?>
<?php $notifications = $this->forum_model->get_notifications_unread($user_id); ?>
<div class="header-top">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-4 text-left top-welcome"><span>Welcome to Our Forum Web</span></div>
			<div class="col-xs-12 col-sm-8 col-md-8 top-welcome">
				<div class="top-links">
					<span>Welcome <?php echo $this->session->userdata('USER_NAME'); ?> , Notifications: <a href="<?php echo base_url('user/notifications'); ?>"><i class="fa fa-bell bell" aria-hidden="true"> <span class="badge badge-danger notification"><?php echo count($notifications); ?></span></i></a></span>
					<ul>
						<li><a href="#" class="myprofile">My Profile</a></li>
						<li><a href="<?php echo base_url('user/edit_profile'); ?>">Setting</a></li>
						<li><a href="<?php echo base_url('user/logout'); ?>">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<? } ?>

<header id="nav-sticky">
<div class="container">
<div class="row">
<div class="col-sm-9">
<nav class="navbar navbar-default" role="navigation"> 

<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

<a class="navbar-brand" href="<?php echo base_url(); ?>"><h1>Referal <span class="text-logo">Forum</span></h1></a> </div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<?php if($class=='welcome' && $method=='index'): ?>
	<li class="dropdown active"><a href="" class="">Forum <span class="caret"></span></a>
		<ul class="dropdown-menu" style="top: 40px;">
			<?php $cat_data = $this->forum_model->get_all_active_category(); ?>
			<?php foreach($cat_data as $cat): ?>
			<li><a href="<?php echo base_url('topics/'.create_slug($cat->title).'_'.encode_url($cat->id)); ?>"><?php echo $cat->title; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</li>
<?php endif; ?>
<li><a href="<?php echo base_url('membership-plans'); ?>" class="">Membership Plans</a></li>
<li class="dropdown"><a href="" class="">Market Place <span class="caret"></span></a>
<!--<ul class="dropdown-menu">
<li><a href="#">First Plan</a></li>
</ul>-->
</li>
<?php if(empty($user_id)){ ?>
<li><a href="<?php echo base_url('user/login'); ?>" class="">Login</a></li>
<li><a href="<?php echo base_url('user/register'); ?>" class="">Register</a></li>
<?php } ?>
</ul>
</div>
</nav>
</div>
	<div class="col-sm-3">
		<form class="navbar-form" role="search">
          <div class="input-group">
				<input type="text" class="form-control search-field" placeholder="Search here now" name="srch-term" id="srch-term">
				<div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search search-icon-btn"></i>
				</button>
                </div>
			</div>
		</form>
	</div>
</div>
</div>
</header>
<?php
if(!isset($middele_nav)):
$this->load->view('front/layout/middel-header');
endif;
?>