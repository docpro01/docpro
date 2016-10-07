<?php

class COA extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

// CHART OF ACCOUNTS
	public function coa_get(){
		echo json_encode(['data' => COA_Model::coa_get()]);
	}
	public function coa_add(){
		$data = [
					'coa_code' => $this->input->post('coa-add-code'),
					'coa_name' => $this->input->post('coa-add-name'),
					'lvl_1_id' => $this->input->post('coa-add-lvl-1'),
					'lvl_2_id' => $this->input->post('coa-add-lvl-2'),
					'lvl_3_id' => $this->input->post('coa-add-lvl-3'),
					'lvl_4_id' => $this->input->post('coa-add-lvl-4'),
					'lvl_5_id' => $this->input->post('coa-add-lvl-5-input'),
					// 'lvl_6_id' => $this->input->post('coa-add-lvl-6-input'),
					'coa_company' => 'docpro'
				];
		COA_Model::coa_add($data);
		redirect('docpro_settings/chart_of_accounts');
	}

	public function coa_edit(){
		$data = [
					'coa_code' => $this->input->post('coa-edit-code'),
					'coa_name' => $this->input->post('coa-edit-name'),
					'lvl_1_id' => $this->input->post('coa-edit-lvl-1'),
					'lvl_2_id' => $this->input->post('coa-edit-lvl-2'),
					'lvl_3_id' => $this->input->post('coa-edit-lvl-3'),
					'lvl_4_id' => $this->input->post('coa-edit-lvl-4'),
					'lvl_5_id' => $this->input->post('coa-edit-lvl-5-input'),
					'lvl_6_id' => $this->input->post('coa-edit-lvl-6-input'),
					'coa_company' => 'docpro'
				];
		COA_Model::coa_edit($this->input->post('coa-edit-id'), $data);
		redirect('docpro_settings/chart_of_accounts');
	}
	public function coa_update(){
		$data = [
					'coa_code' => $this->input->post('coa-update-code'),
					'coa_name' => $this->input->post('coa-update-name'),
					'lvl_1_id' => $this->input->post('coa-update-lvl-1'),
					'lvl_2_id' => $this->input->post('coa-update-lvl-2'),
					'lvl_3_id' => $this->input->post('coa-update-lvl-3'),
					'lvl_4_id' => $this->input->post('coa-update-lvl-4'),
					'bir_id'   => $this->input->post('coa-update-bir'),
					'coa_company' => 'docpro'
				];
		COA_Model::coa_edit($this->input->post('coa-update-id'), $data);
		$this->session->set_flashdata('seq_active', '6');
		redirect('docpro_setup/chart_of_accounts');
	}
	public function coa_delete(){
		COA_Model::coa_delete($this->input->post('coa-delete-id'));
		$this->session->set_flashdata('seq_active', '6');
		redirect('docpro_setup/chart_of_accounts');
	}
	public function redirect_coa_setup($slug){
		$this->session->set_flashdata('seq_active', $slug);
		redirect('docpro_setup/chart_of_accounts');
	}

// LEVEL FILTER
	public function filter_lvl1(){
		echo json_encode(COA_Model::filter_lvl1());
	}
	public function filter_lvl2(){
		echo json_encode(COA_Model::filter_lvl2($this->input->get('lvl_id')));
	}
	public function filter_lvl3(){
		echo json_encode(COA_Model::filter_lvl3($this->input->get('lvl_id')));
	}
	public function filter_lvl4(){
		echo json_encode(COA_Model::filter_lvl4($this->input->get('lvl_id')));
	}
	public function filter_lvl5(){
		echo json_encode(COA_Model::filter_lvl5($this->input->get('lvl_id')));
	}
	public function filter_lvl6(){
		echo json_encode(COA_Model::filter_lvl6($this->input->get('lvl_id')));
	}

}

