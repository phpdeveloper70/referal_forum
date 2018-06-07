<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller 
{
    function __construct()
	{
		parent::__construct();
		$admin_id = $this->session->userdata('ADMIN_ID');
		if(empty($admin_id))
		{
			redirect('admin');
		}
		$this->load->model('user_model');
	}	
	
	public function all()
	{
		$data['RESULT'] = $this->user_model->get_all_users(); 
		$this->load->view('admin/user/listing',$data);
	}
	
	public function profile()
	{
		$args = func_get_args();
		if(isset($_POST['update_profile']))
		{
			$post_data = $this->input->post();	
			if(empty($_FILES['image']['name']))
			{
				$post_data['image'] = $post_data['old_image'];				
			}
			else
			{
				$allow_ext = array('png','jpg','jpeg','JPEG','gif');
				$file_ext = image_extension($_FILES['image']['name']);
				if(in_array($file_ext,$allow_ext))
				{
					$file_name = create_image_unique($_FILES['image']['name']);
					$tmp_name = $_FILES['image']['tmp_name'];
					$path = 'uploads/profile_pic/'.$file_name;
					move_uploaded_file($tmp_name,$path);										
					$post_data['image'] = $file_name;
					delete_file('uploads/profile_pic/',$post_data['old_image']);					
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">Invalid image format.</div>');
					redirect('admin/user/profile/1#settings');
				}
			}
			
			unset($post_data['old_image']);
			unset($post_data['update_profile']);
			$this->user_model->update_user($args[0],$post_data);
			$this->session->set_flashdata('msg','<div class="alert alert-success">Profile has been updated successfully</div>');
			redirect('admin/user/profile/'.$args[0]);
		}	
		
		if(isset($_POST['update_password']))
		{
			$npwd = $this->input->post('npwd');
			$opwd = $this->input->post('opwd');
			if(empty($npwd) || empty($opwd))
			{
				$this->session->set_flashdata('msg','<div class="alert alert-danger">please fill all fields</div>');
				redirect('admin/user/profile/'.$args[0]);
			}
			else
			{
				if($npwd!=$opwd)
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">New password and confirm password not matched.</div>');
					redirect('admin/user/profile/'.$args[0]);
				}
				else
				{
					$upd_data['password'] = base64_encode($npwd);
					$this->user_model->update_user($args[0],$upd_data);
					$this->session->set_flashdata('msg','<div class="alert alert-success">password has been updated successfully</div>');
					redirect('admin/user/profile/'.$args[0]);
				}	
			}	
		}	
		
		$data['RESULT'] = $this->user_model->get_user_by_id($args[0]); 
		$this->load->view('admin/user/profile',$data);
	}
}