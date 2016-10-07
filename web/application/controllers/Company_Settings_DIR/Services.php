<?php
class Services extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){redirect('login', 'refresh');}
    }
    public function get(){
        $sess_data = $this->session->userdata('logged_in');
        echo json_encode(array('data'=> Co_Services_Model::get($this->session->userdata('user')->cb_id)));
    }
    public function add(){
        $cb_id = $this->session->userdata('logged_in');
        $data = array(
                        'co_s_name'=>$this->input->post('add-name'),
                        'co_s_shortname'=>$this->input->post('add-shortname'), 
                        'co_s_description'=>$this->input->post('add-description'), 
                        'co_pcc_id'=>$this->input->post('add-profit-cost-center-id'), 
                        'co_de_id'=>$this->input->post('add-department-id')
                    );
        $insert_id = Co_Services_Model::add($data);
        $code = array('co_s_code'=>$this->input->post('add-profit-cost-center-code')."".$this->input->post('add-department-code')."".$insert_id);
        Co_Services_Model::edit($insert_id, $code);
        redirect('company_settings/services', 'refresh');
    }
    public function edit(){
        $id = $this->input->post('edit-id');
        $data = array(
                        'co_s_code'=>$this->input->post('edit-profit-cost-center-code')."".$this->input->post('edit-department-code')."".$id, 
                        'co_s_name'=>$this->input->post('edit-name'), 
                        'co_s_shortname'=>$this->input->post('edit-shortname'), 
                        'co_s_description'=>$this->input->post('edit-description'), 
                        'co_pcc_id'=>$this->input->post('edit-profit-cost-center-id'), 
                        'co_de_id'=>$this->input->post('edit-department-id')
                    );
        Co_Services_Model::edit($id, $data);
        redirect('company_settings/services', 'refresh');
    }
    public function update(){
        $cb_id = $this->session->userdata('logged_in');
        $data = array(
                        'co_s_name'=>$this->input->post('update-name'), 
                        'co_s_shortname'=>$this->input->post('update-shortname'), 
                        'co_s_description'=>$this->input->post('update-description'), 
                        'co_pcc_id'=>$this->input->post('update-profit-cost-center-id'), 
                        'co_de_id'=>$this->input->post('update-department-id')
                    );
        $insert_id = Co_Services_Model::update($data, $this->input->post('update-id'));
        $code = array('co_s_code'=>$this->input->post('update-profit-cost-center-code')."".$this->input->post('update-department-code')."".$insert_id);
        Co_Services_Model::edit($insert_id, $code);
        redirect('company_settings/services', 'refresh');  
    }
}