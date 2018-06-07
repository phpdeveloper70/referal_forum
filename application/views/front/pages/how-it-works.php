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