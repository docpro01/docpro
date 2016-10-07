<?php
class Company extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in')){redirect('login', 'refresh');}
    }
    public function get(){
        echo json_encode(array('data' => Company_Branches_Model::get($this->session->userdata('user')->cb_id)));
    }
    public function add(){
        $data = array(
                      'cb_ind_name'=>$this->input->post('add-ind-name'),
                      'cb_name'=>$this->input->post('add-name'),
                      'name'=>($this->input->post('add-name') != NULL) ? $this->input->post('add-name') : $this->input->post('add-ind-name'),
                      'cb_address'=>$this->input->post('add-address'), 
                      'cb_tin'=>$this->input->post('add-tin'), 
                      'cb_class'=>'Company', 
                      'bpt_id'=>$this->input->post('add-type-id'), 
                      'cb_tax_type'=>$this->input->post('add-tax-type'),
                      'cb_cno'=>$this->input->post('add-cno'),
                      'cb_email'=>$this->input->post('add-email')
                    );

        $insert_id = Company_Branches_Model::add($data);
        $code = array('cb_code'=>$this->input->post('add-type-code')."".$this->input->post('add-tax-type-code')."".$insert_id);
        Company_Branches_Model::edit($insert_id, $code);        
        redirect('docpro_settings/company', 'refresh');
    }
    public function edit(){
        $id = $this->input->post('edit-id');        
        $data = array( 
                      'cb_address'=>$this->input->post('edit-address'),
                      'cb_cno'=>$this->input->post('edit-cno'),
                      'cb_email'=>$this->input->post('edit-email')
                    );
        Company_Branches_Model::edit($id, $data);
        $this->session->set_flashdata('seq_active', '1');
        redirect('docpro_settings/company', 'refresh');
    }
    public function update(){
            $data = array(
                          'cb_address'=>$this->input->post('update-address'), 
                          'cb_cno'=>$this->input->post('update-cno'),
                          'cb_email'=>$this->input->post('update-email')
                        );
        Company_Branches_Model::update($data, $this->input->post('update-id'));
        $this->session->set_flashdata('seq_active', '1');    
        redirect('docpro_settings/company', 'refresh');
    }
    public function get_branch($slug){
        echo json_encode(['data' => Company_Branches_Model::get_branch($slug)]);
    }
}