<?php
class Taxes extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){redirect('login', 'refresh');}
    }
    public function get(){
        echo json_encode(array('data' => Taxes_Model::get()));
    }
    public function add(){
        $data = array(
                        't_name'=>$this->input->post('add-name'), 
                        't_shortname'=>$this->input->post('add-shortname'), 
                        't_rate'=>$this->input->post('add-rate'), 
                        't_base'=>$this->input->post('add-base'), 
                        'tt_id'=>$this->input->post('add-type-id'),
                        't_company'=>'docpro',
                        't_setup_company'=>'docpro'
                    );
        Taxes_Model::add($data);
        $this->session->set_flashdata('seq_active', '2');
        redirect('docpro_setup/taxes', 'refresh');
    }
    public function edit(){
        $id = $this->input->post('edit-id');
        $data = array(
                        't_name'=>$this->input->post('edit-name'), 
                        't_shortname'=>$this->input->post('edit-shortname'), 
                        't_rate'=>$this->input->post('edit-rate'), 
                        't_base'=>$this->input->post('edit-base'), 
                        'tt_id'=>$this->input->post('edit-type-id')
                    );
        Taxes_Model::edit($id, $data);
        $this->session->set_flashdata('seq_active', '2');
        redirect('docpro_setup/taxes', 'refresh');
    }
    public function update(){
        $data = array(
                        't_name'=>$this->input->post('update-name'), 
                        't_shortname'=>$this->input->post('update-shortname'), 
                        't_rate'=>$this->input->post('update-rate'), 
                        't_base'=>$this->input->post('update-base'), 
                        'tt_id'=>$this->input->post('update-type-id'),
                        't_company'=>'docpro'
                    );
        Taxes_Model::update($data, $this->input->post('update-id'));
        $this->session->set_flashdata('seq_active', '2');
        redirect('docpro_setup/taxes', 'refresh');
    }
    public function delete(){
        Taxes_Model::delete($this->input->post('delete-id'));
        $this->session->set_flashdata('seq_active', '2');
        redirect('docpro_setup/taxes', 'refresh');
    }
}
