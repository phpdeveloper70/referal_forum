<?php 
class Cms_model extends CI_Model
{	
	protected $table = 'tbl_cms';
	public function add_deal($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_cms()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_cms_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_cms_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	
	public function get_all_active_cms()
	{
		$this->db->where('status',1);
		return $this->db->get($this->table)->result();
	}	
}
