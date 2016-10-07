<?php
class Others extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){redirect('login', 'refresh');}
    }
    public function get(){
        echo json_encode(array('data'=>Co_Others_Model::get($this->session->userdata('user')->cb_id)));
    }
    public function add(){
        $data = array('co_o_name'=>$this->input->post('add-name'), 'cb_id'=>$this->session->userdata('user')->cb_id);
        Co_Others_Model::add($data);
        redirect('company_settings/others', 'refresh');
    }
    public function edit(){
        $id = $this->input->post('edit-id');
        $data = array('co_o_name'=>$this->input->post('edit-name'));
        Co_Others_Model::edit($id, $data);
        redirect('company_settings/others', 'refresh');
    }
    public function update(){
        $data = array('co_o_name'=>$this->input->post('update-name'), 'cb_id'=>$this->session->userdata('user')->cb_id);
        Co_Others_Model::update($data, $this->input->post('update-id'));
        redirect('company_settings/others', 'refresh');
    }
}