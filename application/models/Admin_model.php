<?php 
class Admin_model extends CI_Model{
	
	public function admin_login($email,$password)
	{
		$this->db->where('email',$email);
		$this->db->where('password',base64_encode($password));
		//$rows = $this->db->get('tbl_admin')->num_rows();
		$rows = $this->db->get('tbl_admin')->result();
		return $rows;
	}
	
}
