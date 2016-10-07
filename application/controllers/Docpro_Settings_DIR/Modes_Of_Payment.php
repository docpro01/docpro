<?php
class Modes_Of_Payment extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){redirect('login', 'refresh');}
    }
    public function get(){
        echo json_encode(array('data' => Modes_Of_Payment_Model::get()));
    }
    public function add(){
    	if($this->input->post('mop-add-name') !== '' && $this->input->post('mop-add-shortname') !== '' && $this->input->post('mop-add-type-id') !== ''){
    		$data = [
    				'mop_name' => $this->input->post('mop-add-name'),
    				'mop_shortname' => $this->input->post('mop-add-shortname'),
    				'top_id' => $this->input->post('mop-add-type-id'),
    				'mop_company' => 'docpro'
    			];
	    	Modes_Of_Payment_Model::add($data);
    	}
    	redirect('docpro_settings/modes_of_payment', 'refresh');
    }
    public function edit(){
    	if($this->input->post('mop-edit-name') !== '' && $this->input->post('mop-edit-shortname') !== '' && $this->input->post('mop-edit-type-id') !== ''){
    		$data = [
    				'mop_name' => $this->input->post('mop-edit-name'),
    				'mop_shortname' => $this->input->post('mop-edit-shortname'),
    				'top_id' => $this->input->post('mop-edit-type-id')
    			];
    		Modes_Of_Payment_Model::edit($this->input->post('mop-edit-id'), $data);
    	}
        redirect('docpro_settings/modes_of_payment', 'refresh');
    }
    public function update(){
    	if($this->input->post('mop-edit-name') !== '' && $this->input->post('mop-edit-shortname') !== '' && $this->input->post('mop-edit-type-id') !== ''){
    		$data = [
	    				'mop_name' => $this->input->post('mop-update-name'),
	    				'mop_shortname' => $this->input->post('mop-update-shortname'),
	    				'top_id' => $this->input->post('mop-update-type-id'),
	    				'mop_company' => 'docpro'
    				];
    		Modes_Of_Payment_Model::update($this->input->post('mop-update-id'), $data);
    	}
        redirect('docpro_settings/modes_of_payment', 'refresh');

    }
}