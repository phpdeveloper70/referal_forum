<div class="middle-nav">
  <div class="container">
    <ul class="list-inline">
      <li><a href="#">News Feed</a></li>
		<li class="dropdown active"><a href="" class="dropdown-toggle" data-toggle="dropdown">Forum <span class="caret"></span></a>
			<ul class="dropdown-menu" style="display: none; top: 40px;">
				<?php $cat_data = $this->forum_model->get_all_active_category(); ?>
				<?php foreach($cat_data as $cat): ?>
				<li><a href="<?php echo base_url('topics/'.create_slug($cat->title).'_'.encode_url($cat->id)); ?>"><?php echo $cat->title; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</li>
      <li><a href="#">Suppart Team</a></li>
      <li><a href="#">VIP Only</a></li>
    </ul>
  </div>
</div>