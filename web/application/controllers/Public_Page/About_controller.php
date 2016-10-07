<?php

class About_controller extends MY_Controller{
	
	function __construct(){
		parent::__construct('public_page/master_layout');
	}
	
	public function index(){
		return $this->load->view($this->layout, ['active_nav' => 'about', 'content' => 'public_page/fragments/content/about']);
	}
}
?>