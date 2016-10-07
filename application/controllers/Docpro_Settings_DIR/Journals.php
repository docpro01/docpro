<?php

class Journals extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	public function get(){
		echo json_encode(['data' => Journals_Model::get()]);
	}
    public function add(){
        $data = array(
                        'j_name'=>$this->input->post('add-name'), 
                        'j_shortname'=>$this->input->post('add-shortname'), 
                        'j_company'=>'docpro',
                    );
        Journals_Model::add($data);
        redirect('docpro_settings/journals', 'refresh');
    }
    public function edit(){
        $id = $this->input->post('edit-id');
        $data = array(
                        'j_name'=>$this->input->post('edit-name'), 
                        'j_shortname'=>$this->input->post('edit-shortname')
                    );
        Journals_Model::edit($id, $data);
        redirect('docpro_settings/journals', 'refresh');
    }
    public function update(){
        $data = array(
                        'j_name'=>$this->input->post('update-name'), 
                        'j_shortname'=>$this->input->post('update-shortname'),
                        'j_company'=>'docpro' 
                    );
        Journals_Model::update($data, $this->input->post('update-id'));
        redirect('docpro_settings/journals', 'refresh');
    }
}