<?php

class Chart_of_Accounts extends MY_Controller{

	function __construct(){
		parent::__construct('master_layout');
	}

	public function get_lvl_1(){
		echo json_encode(['data' => Co_COA_Model::get_lvl_1($this->session->userdata('user')->cb_id)]);
	}

	public function get_lvl_2($lvl_1_id){
		echo json_encode(['data' => Co_COA_Model::get_lvl_2($this->session->userdata('user')->cb_id, $lvl_1_id)]);
	}

	public function get_lvl_3($lvl_2_id){
		echo json_encode(['data' => Co_COA_Model::get_lvl_3($this->session->userdata('user')->cb_id, $lvl_2_id)]);
	}

	public function get_lvl_4($lvl_3_id){
		echo json_encode(['data' => Co_COA_Model::get_lvl_4($this->session->userdata('user')->cb_id, $lvl_3_id)]);
	}

	public function setup(){
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/coa_setup', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/coa_setup', 'footer_js'=>'fragments/footer_js/companysettings/coa_setup', 'back_button'=>'../company_settings/chart_of_accounts', 'active_nav'=>'companysettings', 'sess_data'=>$this->session->userdata('logged_in')]);
	}

	public function co_coa(){
		echo json_encode(['data' => CO_COA_Model::co_coa($this->session->userdata('user')->cb_id)]);
	}

	public function add_lvl_1(){
		$data = [
					'lvl_1_code' => $this->input->post('add-code-level-1'),
					'lvl_1_name' => $this->input->post('add-name-level-1')
				];
		CO_COA_Model::add_lvl_1($data, $this->session->userdata('user')->cb_id);
	}

	public function edit_lvl_1(){
		$data = [
					'lvl_1_code' => $this->input->post('edit-code-level-1'),
					'lvl_1_name' => $this->input->post('edit-name-level-1')
				];

		CO_COA_Model::edit_lvl_1($data, $this->input->post('edit-lvl-1-id'), $this->session->userdata('user')->cb_id);
	}

	public function delete_lvl_1(){
		CO_COA_Model::delete_lvl_1($this->input->post('co-coa-lvl1-id'));
	}

	public function add_lvl_2(){
		$data = [
					'lvl_2_code' => $this->input->post('add-code-level-2'),
					'lvl_2_name' => $this->input->post('add-name-level-2')
				];
		CO_COA_Model::add_lvl_2($data, $this->session->userdata('user')->cb_id);
		echo "Ok";
	}

	public function edit_lvl_2(){
		$data = [
					'lvl_2_code' => $this->input->post('edit-code-level-2'),
					'lvl_2_name' => $this->input->post('edit-name-level-2')
				];

		CO_COA_Model::edit_lvl_2($data, $this->input->post('edit-lvl-2-id'), $this->session->userdata('user')->cb_id);
	}

	public function delete_lvl_2(){
		CO_COA_Model::delete_lvl_2($this->input->post('coalvl_1_2-id'));
	}

	public function add_lvl_3(){
		$data = [
					'lvl_3_code' => $this->input->post('add-code-level-3'),
					'lvl_3_name' => $this->input->post('add-name-level-3')
				];
		CO_COA_Model::add_lvl_3($data, $this->input->post('add-level-2-id'));
	}

	public function edit_lvl_3(){
		$data = [
					'lvl_3_code' => $this->input->post('edit-code-level-3'),
					'lvl_3_name' => $this->input->post('edit-name-level-3')
				];

		CO_COA_Model::edit_lvl_3($data, $this->input->post('edit-lvl-3-id'), $this->session->userdata('user')->cb_id);
	}

	public function delete_lvl_3(){
		CO_COA_Model::delete_lvl_3($this->input->post('coalvl_2_3-id'));
	}

	public function add_lvl_4(){
		$data = [
					'lvl_4_code' => $this->input->post('add-code-level-4'),
					'lvl_4_name' => $this->input->post('add-name-level-4')
				];
		CO_COA_Model::add_lvl_4($data, $this->input->post('add-level-3-id'));
	}

	public function edit_lvl_4(){
		$data = [
					'lvl_4_code' => $this->input->post('edit-code-level-4'),
					'lvl_4_name' => $this->input->post('edit-name-level-4')
				];

		CO_COA_Model::edit_lvl_4($data, $this->input->post('edit-lvl-4-id'), $this->session->userdata('user')->cb_id);
	}

	public function delete_lvl_4(){
		CO_COA_Model::delete_lvl_4($this->input->post('coalvl_3_4-id'));
	}
}