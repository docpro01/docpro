<?php
class Discounts extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){redirect('login', 'refresh');}
    }
    public function get(){
        echo json_encode(array('data'=>Co_Discounts_Model::get($this->session->userdata('user')->cb_id)));
    }
    public function add(){ 
        $data = array(
                        'co_d_code'=>$this->input->post('add-code'), 
                        'co_d_name'=>$this->input->post('add-name'), 
                        'co_d_shortname'=>$this->input->post('add-shortname'), 
                        'co_d_rate'=>$this->input->post('add-rate'), 
                        'cb_id'=>$this->session->userdata('user')->cb_id
                    );
        Co_Discounts_Model::add($data);
        redirect('company_settings/discounts', 'refresh');
    }
    public function edit(){
        $id = $this->input->post('edit-id');
        $data = array(
                        'co_d_code'=>$this->input->post('edit-code'), 
                        'co_d_name'=>$this->input->post('edit-name'), 
                        'co_d_shortname'=>$this->input->post('edit-shortname'), 
                        'co_d_rate'=>$this->input->post('edit-rate')
                    );
        Co_Discounts_Model::edit($id, $data);
        redirect('company_settings/discounts', 'refresh');
    }
    public function update(){
        $data = array(
                        'co_d_code'=>$this->input->post('update-code'), 
                        'co_d_name'=>$this->input->post('update-name'), 
                        'co_d_shortname'=>$this->input->post('update-shortname'), 
                        'co_d_rate'=>$this->input->post('update-rate'), 
                        'cb_id'=>$this->session->userdata('user')->cb_id
                    );
        Co_Discounts_Model::update($data, $this->input->post('update-id'));
        redirect('company_settings/discounts', 'refresh');    
    }
}