<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Plan  extends CI_Controller 
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
		$this->load->model('plan_model');
	}
	
	public function listing()
	{
		$data['RESULT'] = $this->plan_model->get_all_plan(); 
		$this->load->view('admin/plan/listing',$data);
	}
		
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->plan_model->get_plan_by_id($args[0]); 
		
		if(isset($_POST['submitform']))
		{
			$postdata = $this->input->post();
			if(!empty($postdata['title']))
			{	
				unset($postdata['submitform']);
				$this->plan_model->update_plan_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/plan/listing');				
			}	
		}
		
		$this->load->view('admin/plan/edit',$data);
	}	
	
}