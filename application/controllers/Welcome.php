<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$data['middele_nav'] = 'no';
		$this->load->view('front/home',$data);
	}
	
	function all_deals()
	{
		$this->load->view('front/deals/all-deals');
	}
	
	function deal()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->deals_model->get_deal_by_id($args[1]);
		$this->load->view('front/deals/single-deal',$data);
	}
	
	function membership_plan()
	{
		$data['RESULT'] = $this->cms_model->get_cms_by_id(2);
		$data['PLANS'] = $this->plan_model->get_all_active_plan();
		$this->load->view('front/pages/membership-plan',$data);
	}
	
	function how_it_works()
	{
		$data['RESULT'] = $this->cms_model->get_cms_by_id(4);
		$this->load->view('front/pages/how-it-works',$data);
	}
	
	function privacy_policy()
	{
		$data['RESULT'] = $this->cms_model->get_cms_by_id(3);
		$this->load->view('front/pages/privacy-policy',$data);
	}
	
}
