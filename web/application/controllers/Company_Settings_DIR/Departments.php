<?php
class Departments extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){redirect('login', 'refresh');}
    }
    public function get(){
        $sess_data = $this->session->userdata('logged_in');
        echo json_encode(array('data'=> Co_Departments_Model::get($this->session->userdata('user')->cb_id)));
    }
    public function add(){
        $cb_id = $this->session->userdata('logged_in');
        $data = array(
                        'co_de_name'=>$this->input->post('add-name'), 
                        'co_de_shortname'=>$this->input->post('add-shortname'), 
                        'cb_id'=>$cb_id['company']
                    );
        $insert_id = Co_Departments_Model::add($data);
        $code = array('co_de_code'=>$insert_id);
        Co_Departments_Model::edit($insert_id, $code);
        redirect('company_settings/departments', 'refresh');
    }
    public function edit(){
        $id = $this->input->post('edit-id');
        $data = array(
                        'co_de_name'=>$this->input->post('edit-name'), 
                        'co_de_shortname'=>$this->input->post('edit-shortname')
                    );
        Co_Departments_Model::edit($id, $data);
        redirect('company_settings/departments', 'refresh');
    }
    public function update(){
        $cb_id = $this->session->userdata('logged_in');
        $data = array(
                        'co_de_name'=>$this->input->post('update-name'), 
                        'co_de_shortname'=>$this->input->post('update-shortname'), 
                        'cb_id'=>$cb_id['company']
                    );
        $insert_id = Co_Departments_Model::update($data, $this->input->post('update-id'));
        $code = array('co_de_code'=>$insert_id);
        Co_Departments_Model::edit($insert_id, $code);
        redirect('company_settings/departments', 'refresh');   
    }
}