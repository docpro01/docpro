<?php
class Products extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){redirect('login', 'refresh');}
    }
    public function get(){
        $sess_data = $this->session->userdata('logged_in');
        echo json_encode(array('data'=> Co_Products_Model::get($this->session->userdata('user')->cb_id)));
    }
    public function add(){
        $cb_id = $this->session->userdata('logged_in');
        $data = array(
                        'co_p_name'=>$this->input->post('add-name'), 
                        'co_p_shortname'=>$this->input->post('add-shortname'), 
                        'co_p_description'=>$this->input->post('add-description'), 
                        'co_pcc_id'=>$this->input->post('add-profit-cost-center-id'), 
                        'co_de_id'=>$this->input->post('add-department-id'),
                    );
        $insert_id = Co_Products_Model::add($data);
        $code = array('co_p_code'=>$this->input->post('add-profit-cost-center-code')."".$this->input->post('add-department-code')."".$insert_id);
        Co_Products_Model::edit($insert_id, $code);
        redirect('company_settings/products', 'refresh');
    }
    public function edit(){
        $id = $this->input->post('edit-id');
        $data = array(
                        'co_p_code'=>$this->input->post('edit-profit-cost-center-code')."".$this->input->post('edit-department-code')."".$id, 
                        'co_p_name'=>$this->input->post('edit-name'), 
                        'co_p_shortname'=>$this->input->post('edit-shortname'), 
                        'co_p_description'=>$this->input->post('edit-description'), 
                        'co_pcc_id'=>$this->input->post('edit-profit-cost-center-id'), 
                        'co_de_id'=>$this->input->post('edit-department-id')
                    );
        Co_Products_Model::edit($id, $data);
        redirect('company_settings/products', 'refresh');
    }
    public function update(){
        $cb_id = $this->session->userdata('logged_in');
        $data = array(
                        'co_p_name'=>$this->input->post('update-name'), 
                        'co_p_shortname'=>$this->input->post('update-shortname'), 
                        'co_p_description'=>$this->input->post('update-description'), 
                        'co_pcc_id'=>$this->input->post('update-profit-cost-center-id'), 
                        'co_de_id'=>$this->input->post('update-department-id')
                    );
        $insert_id = Co_Products_Model::update($data, $this->input->post('update-id'));
        $code = array('co_p_code'=>$this->input->post('update-profit-cost-center-code')."".$this->input->post('update-department-code')."".$insert_id);
        Co_Products_Model::edit($insert_id, $code);
        redirect('company_settings/products', 'refresh');  
    }
}