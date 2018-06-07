<?php
class Forums extends CI_Controller
{
	function index()
	{
		$data['RESULT'] = $this->forum_model->select_topics_with_cat_name();
		$data['all_cat'] = $this->forum_model->get_all_active_category();
		$this->load->view('front/forum/all-topics',$data);
	}
	
	public function listing()
	{
		$args = func_get_args();
		$cat_id = get_cat_id($args[0]);			
		$data['RESULT'] = $this->forum_model->get_categoty_with_post($cat_id);
		$data['all_cat'] = $this->forum_model->get_all_active_category();
		$this->load->view('front/forum/listing',$data);
	}
	public function detail()
	{
		$args = func_get_args();
		$topic_id = get_cat_id($args[1]);
		$user_id = $this->session->userdata('USER_ID');
		if(isset($_POST['submitcomments']))
		{
			$post_data = $this->input->post();
			unset($post_data['submitcomments']);
			$post_data['status'] ='1';
			$post_data['user_id'] =$user_id;
			$post_data['create_date'] = date('Y-m-d h:i:s');
			$post_data['parent_id'] =0;
			$post_data['type'] = 'comment';
			$this->forum_model->save_topic_comments($post_data);
			$this->session->set_flashdata('msg','<div class="alert alert-success">Your comment has been submitted.</div>');
			redirect('forum/'.$args[0].'/'.$args[1]);
		}	
		
		$data['RESULT'] = $this->forum_model->select_topic_data_with_reletion($topic_id);
		$data['COMMENTS'] = $this->forum_model->get_all_comments($topic_id);
		$data['SUB_VOT'] = $this->forum_model->get_user_upvote_subcribe_data($topic_id,$user_id);
		$data['all_cat'] = $this->forum_model->get_all_active_category();
		$this->load->view('front/forum/details',$data);
	}
	public function save_topic()
	{
		//echo $_SERVER['HTTP_X_REQUESTED_WITH'];
		$user_id = $this->session->userdata('USER_ID');
		if(!empty($user_id))
		{	
			$post_data = $this->input->post();
			if(count($post_data)>0)
			{
				$post_data['user_id'] = $user_id;
				$post_data['create_date'] = date('Y-m-d h:i:s');
				$this->forum_model->save_topic_data($post_data);
				echo '1';
			}
			else
			{
				echo '0';
			}			 
		}
	}
	
	function subscribe_ajax()
	{
		if(isset($_POST))
		{	
			$user_id = $this->session->userdata('USER_ID');
			if(!empty($user_id))
			{	
				$post_id = $this->input->post('post_id');
				$row = $this->forum_model->get_subcribe_data_by_post_user($post_id,$user_id);
				if(count($row)==0)
				{
					$ind_data['post_id'] = $post_id;
					$ind_data['user_id'] = $user_id;
					$ind_data['status'] = '1';
					$ind_data['create_date'] = date('Y-m-d h:i:s');
					$this->forum_model->save_subcribe_data($ind_data);
					echo 'subscribed';
				}
				else
				{
					if($row[0]->status==0)
					{	
						$upd_data['status'] = '1';
						$this->forum_model->update_subcribe_data($row[0]->id,$upd_data);
						echo 'subscribed';
					}
					else
					{
						$upd_data['status'] = '0';
						$this->forum_model->update_subcribe_data($row[0]->id,$upd_data);
						echo 'subscribe';
					}	
				}	
			}
			else
			{
				echo 'error';
			}	
		}
		else
		{
			echo 'error';
		}
	}
	
	
	function upvote_ajax()
	{
		if(isset($_POST))
		{	
			$user_id = $this->session->userdata('USER_ID');
			if(!empty($user_id))
			{	
				$post_id = $this->input->post('post_id');
				$row = $this->forum_model->get_upvote_data_by_post_user($post_id,$user_id);
				if(count($row)==0)
				{
					$ind_data['post_id'] = $post_id;
					$ind_data['user_id'] = $user_id;
					$ind_data['status'] = '1';
					$ind_data['create_date'] = date('Y-m-d h:i:s');
					$this->forum_model->save_upvote_data($ind_data);
					echo 'upvoted';
				}
				else
				{
					if($row[0]->status==0)
					{	
						$upd_data['status'] = '1';
						$this->forum_model->update_upvote_data($row[0]->id,$upd_data);
						echo 'upvoted';
					}
					else
					{
						$upd_data['status'] = '0';
						$this->forum_model->update_upvote_data($row[0]->id,$upd_data);
						echo 'upvote';
					}	
				}	
			}
			else
			{
				echo 'error';
			}	
		}
		else
		{
			echo 'error';
		}
	}
	
	
	function do_thanks_ajax()
	{
		if(isset($_POST))
		{	
			$user_id = $this->session->userdata('USER_ID');
			if(!empty($user_id))
			{	
				$comment_id = $this->input->post('comment_id');
				$row = $this->forum_model->get_thanks_data_by_comment_user($comment_id,$user_id);
				if(count($row)==0)
				{
					$ind_data['comment_id'] = $comment_id;
					$ind_data['user_id'] = $user_id;
					$ind_data['status'] = '1';
					$ind_data['create_date'] = date('Y-m-d h:i:s');
					$this->forum_model->save_thanks_data($ind_data);
					echo 'Remove Thanks';
				}
				else
				{
					if($row[0]->status==0)
					{	
						$upd_data['status'] = '1';
						$this->forum_model->update_thanks_data($row[0]->id,$upd_data);
						echo 'Remove Thanks';
					}
					else
					{
						$upd_data['status'] = '0';
						$this->forum_model->update_thanks_data($row[0]->id,$upd_data);
						echo 'Thanks';
					}	
				}
				//print_r($row);
			}
			else
			{
				echo 'error';
			}
		}
		else
		{
			echo 'error';
		}
	}
	
	
	function save_reply()
	{
		$user_id = $this->session->userdata('USER_ID');
		if(!empty($user_id))
		{	
			$post_data = $this->input->post();
			if(count($post_data)>0)
			{
				$post_data['user_id'] = $user_id;
				$post_data['create_date'] = date('Y-m-d h:i:s');
				$current_id = $this->forum_model->save_topic_comments($post_data);
				$data['comment'] = $this->forum_model->get_comments_reply_by_id($current_id);
				$this->save_notifications($post_data['post_id'],$user_id);
				if($post_data['type']=='reply')
				{
					$this->load->view('front/ajax/display_single_reply',$data);
				}
				if($post_data['type']=='comment')
				{
					$this->load->view('front/ajax/display_single_comment',$data);
				}
			}
			else
			{
				echo '0';
			}			 
		}
	}
	
	function save_notifications($post_id,$login_user)
	{
		$subscribe_users = $this->forum_model->get_all_subscriber($post_id);  //$post_data['post_id']
		$login_user_name = $this->session->userdata('USER_NAME');
		if(count($subscribe_users)>0)
		{
			$topic_data = $this->forum_model->select_topic_title($post_id);
			foreach($subscribe_users as $users)
			{
				if($users->id!=$login_user)
				{
					$save_data['user_id'] = $users->id;
					$save_data['topic_id'] = $post_id;
					//$save_data['reply_id'] = $reply_id;
					$save_data['notification'] = '<b>'.$login_user_name.'</b> replied to '.$topic_data[0]->title;
					$save_data['view_status'] = '0';
					$save_data['create_date'] = date('Y-m-d h:i:s');
					$this->forum_model->save_notification_data($save_data);
				}
			}
		}
		
		//print_r($subscribe_users);
	}
	
}
