<?php 
class Plan_model extends CI_Model
{	
	protected $table = 'tbl_plans';
	public function add_deal($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_plan()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_plan_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_plan_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	
	public function get_all_active_plan()
	{
		$this->db->where('status',1);
		return $this->db->get($this->table)->result();
	}	
}
