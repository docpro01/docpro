<?php
class Business_Partners extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in')){redirect('login', 'refresh');}
    }
    public function get(){
        echo json_encode(array('data' => Co_Business_Partners_Model::get($this->session->userdata('user')->cb_id)));
    }
    public function add(){
        $cb_id = $this->session->userdata('logged_in');
        $data = array(
                      'co_bp_name'=>$this->input->post('add-name'),
                      'co_bp_ind_name'=>$this->input->post('add-ind-name'),
                      'bp_name'=>($this->input->post('add-name') != NULL) ? $this->input->post('add-name') : $this->input->post('add-ind-name'),
                      'co_bp_shortname'=>$this->input->post('add-shortname'),
                      'co_bp_bus_style'=>$this->input->post('add-style'),
                      'co_bp_address'=>$this->input->post('add-address'),
                      'co_bp_tin'=>$this->input->post('add-tin'),
                      'co_bp_particulars'=>$this->input->post('add-particulars'),
                      'co_bp_class'=>$this->input->post('add-class'),
                      'co_bp_class_code'=>$this->input->post('add-class-code'),
                      'bpt_id'=>$this->input->post('add-type-id'),
                      'co_t_id1'=>$this->input->post('add-tax-1-id'),
                      'co_t_id2'=>$this->input->post('add-tax-2-id'),
                      'co_t_id3'=>$this->input->post('add-tax-3-id'),
                      'cb_id'=>$cb_id['company']
                    );    
        $insert_id = Co_Business_Partners_Model::add($data);
        $code = array('co_bp_code'=>$this->input->post('add-class-code')."".$insert_id);
        Co_Business_Partners_Model::edit($insert_id, $code);
        redirect('company_settings/business_partners', 'refresh');
    }
    public function edit(){
        $id = $this->input->post('edit-id');        
        $data = array(
                        'co_bp_code'=>$this->input->post('edit-class-code')."".$id,
                        'co_bp_name'=>$this->input->post('edit-name'),
                        'co_bp_ind_name'=>$this->input->post('edit-ind-name'),
                        'bp_name'=>($this->input->post('edit-name') != NULL) ? $this->input->post('edit-name') : $this->input->post('edit-ind-name'),
                        'co_bp_shortname'=>$this->input->post('edit-shortname'),
                        'co_bp_bus_style'=>$this->input->post('edit-style'),
                        'co_bp_address'=>$this->input->post('edit-address'),
                        'co_bp_tin'=>$this->input->post('edit-tin'),
                        'co_bp_particulars'=>$this->input->post('edit-particulars'),
                        'co_bp_class'=>$this->input->post('edit-class'),
                        'co_bp_class_code'=>$this->input->post('edit-class-code'),
                        'bpt_id'=>$this->input->post('edit-type-id'),
                        'co_t_id1'=>$this->input->post('edit-tax-1-id'),
                        'co_t_id2'=>$this->input->post('edit-tax-2-id'),
                        'co_t_id3'=>$this->input->post('edit-tax-3-id'),
                    );    
        Co_Business_Partners_Model::edit($id, $data);
        redirect('company_settings/business_partners', 'refresh');
    }
    public function update(){
        $cb_id = $this->session->userdata('logged_in');
            $data = array(
                          'co_bp_name'=>$this->input->post('update-name'),
                          'co_bp_ind_name'=>$this->input->post('update-ind-name'),
                          'bp_name'=>($this->input->post('update-name') != NULL) ? $this->input->post('update-name') : $this->input->post('update-ind-name'),
                          'co_bp_shortname'=>$this->input->post('update-shortname'),
                          'co_bp_bus_style'=>$this->input->post('update-style'),
                          'co_bp_address'=>$this->input->post('update-address'),
                          'co_bp_tin'=>$this->input->post('update-tin'),
                          'co_bp_particulars'=>$this->input->post('update-particulars'),
                          'co_bp_class'=>$this->input->post('update-class'),
                          'co_bp_class_code'=>$this->input->post('update-class-code'),
                          'bpt_id'=>$this->input->post('update-type-id'),
                          'co_t_id1'=>$this->input->post('update-tax-1-id'),
                          'co_t_id2'=>$this->input->post('update-tax-2-id'),
                          'co_t_id3'=>$this->input->post('update-tax-3-id'),
                          'cb_id'=>$cb_id['company']
                        );    
        $insert_id = Co_Business_Partners_Model::update($data, $this->input->post('update-id'));
        $code = array('co_bp_code'=>$this->input->post('update-class-code')."".$insert_id);
        Co_Business_Partners_Model::edit($insert_id, $code);
        redirect('company_settings/business_partners', 'refresh');
    }
}