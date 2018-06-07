<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cms  extends CI_Controller 
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
		$this->load->model('cms_model');
	}
	
	public function listing()
	{
		$data['RESULT'] = $this->cms_model->get_all_cms(); 
		$this->load->view('admin/cms/listing',$data);
	}
		
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->cms_model->get_cms_by_id($args[0]); 
		
		if(isset($_POST['submitform']))
		{
			$postdata = $this->input->post();
			if(!empty($postdata['title']))
			{	
				unset($postdata['submitform']);
				$this->cms_model->update_cms_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/cms/listing');				
			}	
		}
		
		$this->load->view('admin/cms/edit',$data);
	}	
	
}