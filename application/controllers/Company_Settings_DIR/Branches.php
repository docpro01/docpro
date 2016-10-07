<?php
class Branches extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in')){redirect('login', 'refresh');}
    }
    public function get(){
        echo json_encode(array('data'=>CB_Br_Model::get($this->session->userdata('user')->cb_id)));
    }
    public function add(){
        $data = [
            'cb_name' => $this->input->post('add-name'),
            'name' => $this->input->post('add-name'),
            'cb_address' => $this->input->post('add-address'),
            'cb_tin' => $this->input->post('add-tin'),
            'cb_class' => 'branch',
            'cb_bp_type' => $this->session->userdata('user')->ch_cb_bp_type,
            'cb_tax_type' => $this->session->userdata('user')->ch_cb_tax_type,
            'cb_seq' => $this->session->userdata('user')->ch_cb_seq,
            'cb_cno' => $this->input->post('add-cno'),
            'cb_email' => $this->input->post('add-email')
        ];
        CB_Br_Model::add($this->session->userdata('user')->cb_id, $data);
        $this->session->set_flashdata('seq_active', '2');
        redirect('company_settings/branches', 'refresh');
    }
    public function edit(){     
        $data = array(
                        'cb_name'=>$this->input->post('edit-name'), 
                        'name'=>$this->input->post('edit-name'), 
                        'cb_address'=>$this->input->post('edit-address'), 
                        'cb_tin'=>$this->input->post('edit-tin'), 
                        'cb_class' => 'branch',
                        'cb_bp_type' => $this->session->userdata('user')->ch_cb_bp_type,
                        'cb_tax_type' => $this->session->userdata('user')->ch_cb_tax_type,
                        'cb_seq' => $this->session->userdata('user')->ch_cb_seq,
                        'cb_cno'=>$this->input->post('edit-cno'), 
                        'cb_email'=>$this->input->post('edit-email'), 
                    );
        CB_Br_Model::edit($this->input->post('edit-id'), $data);
        $this->session->set_flashdata('seq_active', '2');
        redirect('company_settings/branches', 'refresh');
    }
    public function update(){
        $data = array(
                        'cb_name'=>$this->input->post('update-name'), 
                        'name'=>$this->input->post('update-name'), 
                        'cb_address'=>$this->input->post('update-address'), 
                        'cb_tin'=>$this->input->post('update-tin'), 
                        'cb_class' => 'branch',
                        'cb_bp_type' => $this->session->userdata('user')->ch_cb_bp_type,
                        'cb_tax_type' => $this->session->userdata('user')->ch_cb_tax_type,
                        'cb_seq' => $this->session->userdata('user')->ch_cb_seq,
                        'cb_cno'=>$this->input->post('update-cno'), 
                        'cb_email'=>$this->input->post('update-email'), 
                    );
        CB_Br_Model::update($this->input->post('update-id'), $data);
        $this->session->set_flashdata('seq_active', '2');
        redirect('company_settings/branches', 'refresh');
    }
}