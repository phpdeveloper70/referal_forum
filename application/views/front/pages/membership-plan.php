<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $RESULT[0]->meta_title; ?></title>
<meta name="description" content="<?php echo $RESULT[0]->meta_description; ?>">
<meta name="keywords" content="<?php echo $RESULT[0]->meta_keyword; ?>">
<?php $this->load->view('front/layout/head_css_js'); ?>
</head>
<body>
<!--- Start Header -->
<?php $this->load->view('front/layout/header'); ?>
<!--- End Header -->

<!--- Home  Page Banner Background -->
<section class="login-form">
<div class="container">
	<div class="login-heading pad-btm">
		<h1><?php echo $RESULT[0]->title; ?></h1>
		<p><?php echo $RESULT[0]->description; ?></p>
	</div>

	<div class="row">
		<?php foreach($PLANS as $plan): ?>
		<div class="col-sm-4">
			<div class="membership">
				<div class="free plan-<?php echo $plan->id; ?>">
					<h6 class="title-member"><?php echo $plan->title; ?></h6>
					<h5 class="plan-figure"><?php echo CURRENCY_SYMBOL.$plan->amount; ?>/month</h5>
					<span class="membership-mode"><?php echo $plan->sub_title; ?></span>
					<?php if($plan->recommended==1){ ?>
					<div class="blue-strip">
						<p>Recommended</p>
					</div>
					<?php } ?>
				</div>
				<hr class="sub-line">
				<div class="rule-list">
					<?php echo $plan->description; ?>
				</div>
				<div class="member-btn">
					<a href="#" class="silver-btn">Choose Package</a>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
</section>
<?php $this->load->view('front/layout/footer.php') ?>
<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
<script class="example">
$(document).ready(function(){
	$('#login_form').parsley();
});
</script>
</body>
</html>