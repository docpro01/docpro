<?php
class Banks extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){redirect('login', 'refresh');}
    }
    public function get(){
        echo json_encode(array('data'=>Co_Banks_Model::get($this->session->userdata('user')->cb_id)));
    }
    public function add(){
        $data = array(
                        'co_b_no'=>$this->input->post('add-number'), 
                        'co_b_class'=>$this->input->post('add-classification'), 
                        'b_id'=>$this->input->post('add-bank-id'), 
                        'cb_id'=>$this->session->userdata('user')->cb_id
                    );
        Co_Banks_Model::add($data);
        redirect('company_settings/banks', 'refresh');
    }
    public function edit(){
        $id = $this->input->post('edit-id');
        $data = array(
                        'co_b_no'=>$this->input->post('edit-number'), 
                        'co_b_class'=>$this->input->post('edit-classification'), 
                        'b_id'=>$this->input->post('edit-bank-id')
                    );
        Co_Banks_Model::edit($id, $data);
        redirect('company_settings/banks', 'refresh');
    }
    public function update(){
        $data = array(
                        'co_b_no'=>$this->input->post('update-number'), 
                        'co_b_class'=>$this->input->post('update-classification'), 
                        'b_id'=>$this->input->post('update-bank-id'), 
                        'cb_id'=>$this->session->userdata('user')->cb_id
                    );
        Co_Banks_Model::update($data, $this->input->post('update-id'));
        redirect('company_settings/banks', 'refresh');
    }
}