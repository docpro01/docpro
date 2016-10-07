<?php
class Journals extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){redirect('login', 'refresh');}
    }
    public function get(){
        echo json_encode(array('data'=>Co_Journals_Model::get($this->session->userdata('user')->cb_id)));
    }
    public function add(){
        $data = array(
                        'j_name'=>$this->input->post('add-name'), 
                        'j_shortname'=>$this->input->post('add-shortname'), 
                    );
        $j_id = Journals_Model::add($data);
        Journals_Model::edit($j_id, ['j_code' => $j_id]);
        Co_Journals_Model::add(['j_id' => $j_id, 'cb_id' => $this->session->userdata('user')->cb_id]);
        redirect('company_settings/journals', 'refresh');
    }
    public function edit(){
        $id = $this->input->post('edit-id');
        $data = array(
                        'j_name'=>$this->input->post('edit-name'), 
                        'j_shortname'=>$this->input->post('edit-shortname')
                    );
        Journals_Model::edit($id, $data);
        redirect('company_settings/journals', 'refresh');
    }
    public function update(){
        $data = array(
                        'j_name'=>$this->input->post('update-name'), 
                        'j_shortname'=>$this->input->post('update-shortname'), 
                    );
        $j_id = Journals_Model::update($data, $this->input->post('update-id'));
        Journals_Model::edit($j_id, ['j_code' => $j_id]);
        Co_Journals_Model::update(['j_id' => $j_id, 'cb_id' => $this->session->userdata('user')->cb_id], $this->input->post('co-j-id'));
        redirect('company_settings/journals', 'refresh');
    }
}