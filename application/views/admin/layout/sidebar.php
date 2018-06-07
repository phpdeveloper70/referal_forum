<?php $all_users = $this->user_model->get_all_users_by_ststus('all'); ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">      
      <ul class="sidebar-menu">
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>Dashboard</span>           
          </a>          
        </li>        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Users</span> 
			
            <span class="pull-right-container">			
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user/all'); ?>"><i class="fa fa-circle-o"></i>All Users  &nbsp;&nbsp;&nbsp;<small class="label label-primary"><?php echo count($all_users); ?></small></a> </li>
			<li><a href="#"><i class="fa fa-circle-o"></i>Add New</a></li>
          </ul>		  
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-clone"></i> <span>Forum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/forum/category_listing'); ?>"><i class="fa fa-circle-o"></i>All Category</a></li>
			<li><a href="<?php echo base_url('admin/forum/category_add'); ?>"><i class="fa fa-circle-o"></i>Add New Category</a></li>
			<li><a href="<?php echo base_url('admin/forum/topics'); ?>"><i class="fa fa-circle-o"></i>All Topics</a></li>
			<li><a href="<?php echo base_url('admin/forum/topic_add'); ?>"><i class="fa fa-circle-o"></i>Add New Topic</a></li>
		  </ul>		  
        </li>
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Deals </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/deals/listing'); ?>"><i class="fa fa-circle-o"></i>All Deals</a></li>
			<li><a href="<?php echo base_url('admin/deals/add'); ?>"><i class="fa fa-circle-o"></i>Add New</a></li>
          </ul>		  
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i> <span>CMS Pages </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/cms/listing'); ?>"><i class="fa fa-circle-o"></i>All Pages</a></li>
          </ul>		  
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Plans </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/plan/listing'); ?>"><i class="fa fa-circle-o"></i>All Plan</a></li>
          </ul>		  
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>