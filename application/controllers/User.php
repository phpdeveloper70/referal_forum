<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
	public function register()
	{
		if(isset($_POST['register']))
		{
			$result = $this->user_model->check_email($_POST['email']);
			if(count($result)>0)
			{
				$this->session->set_flashdata('msg','<div class="alert alert-danger">this email address already exists. please choose a different one.</div>');
				redirect('user/register');
			}
			else
			{	
				unset($_POST['register']);				
				$token = sha1(time().$_POST['email']);					
				$_POST['password'] = base64_encode($_POST['password']);
				$_POST['status'] = '0';
				$_POST['plan'] = 'basic';
				$_POST['activate_token'] = $token;
				$_POST['create_date'] = date('Y-m-d h:i:s');
				$user_id = $this->user_model->insert_user($_POST);
				
				$this->load->library('email');
				//SMTP & mail configuration			
				$this->email->set_mailtype("html");
				$this->email->set_newline("\r\n");				
				//Email content
				$htmlContent = 'Thanks for signing up!<br>
								Your account has been created, you can login with the following credentials 
								after you have activated your account by pressing the url below.<br>
								Please click this link to activate your account: <a href='.base_url('user/verifyemail/'.$token).'>Click Here</a> or <br> '.base_url('user/verifyemail/'.$token).'<br><br><br>Thanks<br>Forum Web & Team';

				$this->email->to(trim($_POST['email']));
				$this->email->from(FROM_EMAIL,WEBSITE_TITLE);
				$this->email->subject('Confirm your Referal Forum Account!');
				$this->email->message($htmlContent);				
				//Send email
				$this->email->send();
				
				$this->session->set_flashdata('msg','<div class="alert alert-success">Your Account is created, Please check your email inbox,spam and approve your account</div>');
				redirect('user/login');	
			}	
		}
		$data['middele_nav'] = 'no';
		$this->load->view('front/register',$data);
	}
	
	function login()
	{
		if(isset($_POST['login']))
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			if(empty($email) || empty($password))
			{
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Invalid login credentials</div>');
				redirect('user/login');	
			}
			else
			{
				$rows = $this->user_model->user_login($email,base64_encode($password));
				//print_r($rows); exit;
				if(count($rows)>0)
				{
					if($rows[0]->status==1)
					{
						$admin_data = array('USER_ID'=>$rows[0]->id,'USER_NAME'=>$rows[0]->fname.' '.$rows[0]->lname,'USER_PLAN'=>$rows[0]->plan,'USER_EMAIL'=>$rows[0]->email);
						$this->session->set_userdata($admin_data);						
						if(isset($_GET['redirect']) && !empty($_GET['redirect']))
						{
							redirect($_GET['redirect']);
						}
						else
						{
							redirect('');
						}
					}
					else
					{
						$this->session->set_flashdata('msg','<div class="alert alert-warning">this account is inactive.</div>');
						redirect('user/login');
					}	
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">Invalid login credentials</div>');
					redirect('user/login');	
				}	
				
				//redirect('user/login');
			}
		}
		$data['middele_nav'] = 'no';
		$this->load->view('front/login',$data);
	}
	
	function logout()
	{
		$this->session->unset_userdata('USER_ID');
		$this->session->unset_userdata('USER_EMAIL');
		$this->session->unset_userdata('USER_NAME');
		$this->session->unset_userdata('USER_PLAN');	
		$this->session->sess_destroy();
		redirect('user/login');
	}
	
	function verifyemail()
	{
		$args = func_get_args();
		if(count($args)>0)
		{
			$rows = $this->user_model->get_user_by_email_activate_token($args[0]);
			if(count($rows)==1)
			{
				$user_id = $rows[0]->id;
				$upd_data['status'] = '1';
				$upd_data['activate_token'] = '';
				$this->user_model->update_user($user_id,$upd_data);
				$this->session->set_flashdata('msg','<div class="alert alert-success">your account has been activated successfully.</div>');
				redirect('user/login');
			}else
			{
				$this->session->set_flashdata('msg','<div class="alert alert-warning">security token does not match</div>');
				redirect('user/login');
			}	
		}
		else
		{
			$this->session->set_flashdata('msg','<div class="alert alert-warning">security token does not match</div>');
			redirect('user/login');
		}	
	}
	
	public function forgot_password()
	{
		if(isset($_POST['forgot_password']))
		{
			$email = $this->input->post('email');
			if(empty($email))
			{
				$this->session->set_flashdata('msg','<div class="alert alert-danger">please enter a valid email.</div>');
				redirect('user/forgot_password');
			}
			else
			{
				$user_data = $this->user_model->check_email($email);
				if(count($user_data)==0)
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">email does not matched</div>');
					redirect('user/forgot_password');
				}	
				else
				{
					$user_id = $user_data[0]->id;
					$token = sha1($user_id.time().$_POST['email']);
					$upd_data['forgot_token'] = $token;
					$this->user_model->update_user($user_id,$upd_data);
					
					$this->load->library('email');
					//SMTP & mail configuration			
					$this->email->set_mailtype("html");
					$this->email->set_newline("\r\n");				
					//Email content
					$htmlContent = 'Dear '. $user_data[0]->fname.' '.$user_data[0]->lname .',
								<br>Please click bellow link to reset your password. <a href='.base_url('user/reset_password/'.$token).'>Click Here</a> 
								or If you are not able to access the above link, copy & paste the entire url in your browser address bar and press enter.
								<br> '.base_url('user/reset_password/'.$token).'<br><br><br>Thanks<br>Forum Web & Team';
					$this->email->to(trim($_POST['email']));
					$this->email->from(FROM_EMAIL,WEBSITE_TITLE);
					$this->email->subject('Reset your Referal Forum Account Password!');
					$this->email->message($htmlContent);				
					//Send email
					$this->email->send();
					$this->session->set_flashdata('msg','<div class="alert alert-success">Please check your inbox/spam for an email we just sent you with instructions for how to reset your password</div>');
					redirect('user/forgot_password');					
				}
			}	
		}	
		$this->load->view('front/user/forgot-password');
	}
	
	function reset_password()
	{
		$args = func_get_args();
		if(count($args)>0)
		{
			$rows = $this->user_model->get_user_by_forgot_password_token($args[0]);
			if(count($rows)==1)
			{
				if(isset($_POST['reset_password']))
				{	
					$npwd = $this->input->post('npwd');
					$opwd = $this->input->post('cpwd');
					if(empty($npwd) || empty($opwd))
					{
						$this->session->set_flashdata('msg','<div class="alert alert-danger">please fill all field.</div>');
						redirect('user/reset_password/'.$args[0]);
					}
					else
					{
						if($npwd!=$npwd)
						{
							$this->session->set_flashdata('msg','<div class="alert alert-danger">New password and Confirm password not matched.</div>');
							redirect('user/reset_password/'.$args[0]);
						}
						else
						{
							$user_id = $rows[0]->id;
							$upd_data['forgot_token'] = '';
							$upd_data['password'] = base64_encode($npwd);
							$this->user_model->update_user($user_id,$upd_data);				
							$this->session->set_flashdata('msg','<div class="alert alert-success">your password has been changed successfully</div>');
							redirect('user/login');
						}	
						
					}	
				}
				$this->load->view('front/user/reset-password');
			}else
			{
				$this->session->set_flashdata('msg','<div class="alert alert-warning">security token does not match</div>');
				redirect('user/login');
			}	
		}
		else
		{
			$this->session->set_flashdata('msg','<div class="alert alert-warning">security token does not match</div>');
			redirect('user/login');
		}
	}
	
	function edit_profile()
	{
		$user_id = $this->session->userdata('USER_ID');
		if(isset($_POST['updateprofile']))
		{
			$post_data = $this->input->post();
			unset($post_data['updateprofile']);
			$this->user_model->update_user($user_id,$post_data);
			$this->session->set_flashdata('msg','<div class="alert alert-success">Your profile has been updated successfully</div>');
			redirect('user/edit_profile');
		}	
		
		$data['RESULT']  = $this->user_model->get_user_by_id($user_id);
		$this->load->view('front/settings/edit_profile',$data);
	}
	
	public function change_password()
	{
		$user_id = $this->session->userdata('USER_ID');
		if(isset($_POST['changepass']))
		{
			$post_data = $this->input->post();
			if(empty($post_data['opwd']) || empty($post_data['npwd']) || empty($post_data['cpwd']))
			{
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Please fill all field</div>');
				redirect('user/change_password');
			}
			else
			{
				if($post_data['opwd']==base64_decode($post_data['form_key']))
				{
					if($post_data['npwd']==$post_data['cpwd'])
					{
						unset($post_data['opwd']);
						unset($post_data['cpwd']);
						unset($post_data['form_key']);
						$post_data['password']= base64_encode($post_data['npwd']);
						unset($post_data['changepass']);
						unset($post_data['npwd']);						
						$this->user_model->update_user($user_id,$post_data);
						$this->session->set_flashdata('msg','<div class="alert alert-success">Your password has been changed successfully</div>');
						redirect('user/change_password');
						
					}
					else
					{
						$this->session->set_flashdata('msg','<div class="alert alert-danger">New password and Confirm password not matched.</div>');
						redirect('user/change_password');
					}	
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">Old password not matched.</div>');
					redirect('user/change_password');
				}				
			}
			
		}	
		$data['RESULT']  = $this->user_model->get_user_by_id($user_id);
		$this->load->view('front/settings/change_password',$data);
	}
	
	public function profile_picture()
	{
		$user_id = $this->session->userdata('USER_ID');
		$login_user_data = $this->user_model->get_user_by_id($user_id);
		if(isset($_POST['uploadpicture']))
		{
			if(empty($_FILES['picture']['name']))
			{
				$this->session->set_flashdata('msg','<div class="alert alert-danger">please choose valid image.</div>');
				redirect('user/profile_picture');
			}
			else
			{
				$allow_ext = array('png','jpg','jpeg','JPEG','gif');
				$file_ext = image_extension($_FILES['picture']['name']);
				if(in_array($file_ext,$allow_ext))
				{
					$file_name = create_image_unique($_FILES['picture']['name']);
					$tmp_name = $_FILES['picture']['tmp_name'];
					$path = 'uploads/profile_pic/'.$file_name;
					move_uploaded_file($tmp_name,$path);
					$upd_data['image'] = $file_name;						
					$this->user_model->update_user($user_id,$upd_data);
					delete_file('uploads/profile_pic/',$login_user_data[0]->image);
					$this->session->set_flashdata('msg','<div class="alert alert-success">Profile image has been change.</div>');
					redirect('user/profile_picture');
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">Invalid image format.</div>');
					redirect('user/profile_picture');
				}
			}	
		}	
		
		$data['RESULT']  = $login_user_data;
		$this->load->view('front/settings/change_profile_picture',$data);
	}
	
	function notifications()
	{
		$this->load->view('front/user/notifications');
	}

	public function test()
	{
		//create_image_unique('NGYRF.png');
		echo check_profile_pic('uploads/profile_pic/','3115209376139.png');
	}
}
