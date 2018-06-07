<?php 
class Deals_model extends CI_Model
{	
	protected $table = 'tbl_deals';
	public function add_deal($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_deals()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_deal_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_deal_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function delete_deal_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
	
	public function get_all_active_deals()
	{
		$this->db->where('status',1);
		return $this->db->get($this->table)->result();
	}	
}
