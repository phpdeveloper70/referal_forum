<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forum extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$admin_id = $this->session->userdata('ADMIN_ID');
		if(empty($admin_id))
		{
			redirect('admin');
		}
		//$this->load->library('form_validation');
		$this->load->model('forum_model');
	}
	
	public function category_listing()
	{
		$data['RESULT'] = $this->forum_model->get_all_category(); 
		$this->load->view('admin/forum/cat-listing',$data);
	}
	
	public function category_add()
	{
		if(isset($_POST['submitform']))
		{
			$postdata = $this->input->post();
			if(!empty($postdata['title']))
			{
				unset($postdata['submitform']);
				$postdata['create_date'] = date('Y-m-d h:i:s');				
				$this->forum_model->add_category($postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully saved.</div>');
				redirect('admin/forum/category_listing');				
			}	
		}		
		$this->load->view('admin/forum/cat-add');
	}
	
	public function category_edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->forum_model->get_category_by_id($args[0]); 
		
		if(isset($_POST['submitform']))
		{
			$postdata = $this->input->post();
			if(!empty($postdata['title']))
			{
				unset($postdata['submitform']);
				$this->forum_model->update_category_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/forum/category_listing');				
			}	
		}
		
		$this->load->view('admin/forum/cat-edit',$data);
	}
	
	function topics()
	{	
		$data['RESULT'] = $this->forum_model->topics_with_relations();
		$this->load->view('admin/forum/topic-listing',$data);
	}
	
	function topic_edit()
	{
		$args = func_get_args();
		if(isset($_POST['submitform']))
		{
			$post_data = $this->input->post();
			unset($post_data['submitform']);
			$this->forum_model->update_topic_data($args[0],$post_data);
			$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
			redirect('admin/forum/topics');
		}	
		
		$data['CAT_RESULT'] = $this->forum_model->get_all_category(); 
		$data['RESULT'] = $this->forum_model->select_topic_by_id($args[0]);
		$data['USER_RESULT'] = $this->user_model->get_all_users();
		$this->load->view('admin/forum/topic-edit',$data);
	}
	
	function topic_add()
	{
		$args = func_get_args();
		if(isset($_POST['submitform']))
		{
			$post_data = $this->input->post();
			unset($post_data['submitform']);
			$post_data['create_date'] = date("Y-m-d h:i:s");
			$this->forum_model->save_topic_data($post_data);
			$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully saved.</div>');
			redirect('admin/forum/topics');
		}	
		$data['USER_RESULT'] = $this->user_model->get_all_users();
		$data['CAT_RESULT'] = $this->forum_model->get_all_category(); 
		$this->load->view('admin/forum/topic-add',$data);
	}
	
	function ajax_roports()
	{
		$args = func_get_args();
		if(count($args)>0)
		{
			$data['reports'] = $this->forum_model->get_topic_report($args[0]);
			$this->load->view('admin/forum/ajax_report',$data);
		}	
	}
	
}