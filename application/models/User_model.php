<?php 
class User_model extends CI_Model{
	
	protected $table = 'tbl_users';
	public function get_all_users()
	{
		return $this->db->get($this->table)->result();
	}
	
	/* public function get_all_users()
	{
		$this->db->select('user.*', 'count(tbl_forum_posts.id) as postcount');
		$this->db->from("tbl_users as user");
		$this->db->join("tbl_forum_posts as post","user.id = tbl_forum_posts.user_id","left");
		$this->db->group_by('tbl_forum_posts.user_id');
		return $this->db->get()->result();
	} */
	
	public function insert_user($data)
	{
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}
	
	public function update_user($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update($this->table,$data);
	}
	
	public function check_email($email)
	{
		$this->db->where('email',$email);
		//$array = array('username' => $username, 'email' => $email);
		//$this->db->or_where($array);		
		$rows = $this->db->get($this->table)->result();
		return $rows;
	}
	
	public function user_login($email,$password)
	{
		$this->db->where('email',$email);
		$this->db->where('password',$password);	
		$rows = $this->db->get($this->table)->result();
		return $rows;
	}
	
	public function get_user_by_email_activate_token($token)
	{
		$this->db->where('activate_token',$token);
		$rows = $this->db->get($this->table)->result();
		return $rows;
	}
	
	public function get_user_by_id($id)
	{
		$this->db->where('id',$id);
		$rows = $this->db->get($this->table)->result();
		return $rows;
	}
	function get_all_users_by_ststus($status)
	{
		if($status!='all')
		{	
			$this->db->where('status',$status);
		}
		$rows = $this->db->get($this->table)->result();
		return $rows;
	}
}
