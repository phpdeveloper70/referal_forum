<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Deals extends CI_Controller 
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
		$this->load->model('deals_model');
	}
	
	public function listing()
	{
		$data['RESULT'] = $this->deals_model->get_all_deals(); 
		$this->load->view('admin/deal/listing',$data);
	}
	
	public function add()
	{
		if(isset($_POST['submitform']))
		{
			$postdata = $this->input->post();
			if(!empty($postdata['title']))
			{
				unset($postdata['submitform']);
				$postdata['create_date'] = date('Y-m-d h:i:s');
				$image = time().$_FILES['image']['name'];
				$tmp_name = $_FILES['image']['tmp_name'];
				$upload_path= 'uploads/deal/'.$image;
				move_uploaded_file($tmp_name,$upload_path);
				$postdata['image'] = $image;
				$this->deals_model->add_deal($postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully saved.</div>');
				redirect('admin/deals/listing');				
			}	
		}		
		$this->load->view('admin/deal/add');
	}
	
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->deals_model->get_deal_by_id($args[0]); 
		
		if(isset($_POST['submitform']))
		{
			$postdata = $this->input->post();
			if(!empty($postdata['title']))
			{
				unset($postdata['submitform']);
				if(!empty($_FILES['image']['name']))
				{	
					$image = time().$_FILES['image']['name'];
					$tmp_name = $_FILES['image']['tmp_name'];
					$upload_path= 'uploads/deal/'.$image;
					move_uploaded_file($tmp_name,$upload_path);
					$postdata['image'] = $image;
				}
				else
				{
					$postdata['image'] = $_POST['hidden_file'];
				}
				unset($postdata['hidden_file']);
				$this->deals_model->update_deal_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/deals/listing');				
			}	
		}
		
		$this->load->view('admin/deal/edit',$data);
	}
	
	public function delete_deal()
	{
		$args = func_get_args();
		$this->deals_model->delete_deal_by_id($args[0]); 
		$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully deleted.</div>');
		redirect('admin/deals/listing');
	}
}