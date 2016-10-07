<?php
class Taxes extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){redirect('login', 'refresh');}
    }
    public function get(){
        echo json_encode(array('data' =>Co_Taxes_Model::get($this->session->userdata('user')->cb_id)));
    }
    public function add(){
        $cb_id = $this->session->userdata('logged_in');
        $data = array('t_id'=>$this->input->post('add-tax-id'), 'cb_id' => $cb_id['company']);
        Co_Taxes_Model::add($data);
        redirect('company_settings/taxes', 'refresh');
    }
    public function edit(){
        $id = $this->input->post('edit-id');
        $data = array('t_id'=>$this->input->post('edit-tax-id'));
        Co_Taxes_Model::edit($id, $data);
        redirect('company_settings/taxes', 'refresh');    
    }
    public function update(){
        $id = $this->input->post('update-id');
        $cb_id = $this->session->userdata('logged_in');
        $data = array('t_id'=>$this->input->post('update-tax-id'), 'cb_id' => $cb_id['company']);
        Co_Taxes_Model::update($id, $data);
        redirect('company_settings/taxes', 'refresh');
    }
}