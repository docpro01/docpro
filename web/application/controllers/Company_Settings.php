<?php

class Company_Settings extends MY_Controller{
	
	function __construct(){
		parent::__construct('master_layout');
                
	}
	
	public function get_company_settings(){
		$this->load->view($this->layout, ['top_navbar'=>'fragments/top_navbar/global_top_navbar', 'head_css'=>'fragments/head_css/company_settings', 'content'=>'fragments/content/company_settings', 'back_button'=>'../home', 'active_nav'=>'companysettings', 'sess_data'=>$this->session->userdata('logged_in')]);
	}
      
	public function get_branches(){
		$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/branches', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/branches', 'footer_js'=>'fragments/footer_js/companysettings/branches', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}
        
	public function get_users(){
		$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/users', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/users', 'footer_js'=>'fragments/footer_js/companysettings/users', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}
        
    public function get_journals(){
    	$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/journals', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/journals', 'footer_js'=>'fragments/footer_js/companysettings/journals', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}
   
	public function get_transactions(){
		$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/transactions', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/transactions', 'footer_js'=>'fragments/footer_js/companysettings/transactions', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}
        
	public function get_documents(){
		$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/documents', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/documents', 'footer_js'=>'fragments/footer_js/companysettings/documents', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'j_name'=>  Co_Journals_Model::get($this->session->userdata('user')->cb_id), 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}
        
	public function get_modes_of_payment(){
		$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/modes_of_payment', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/modes_of_payment', 'footer_js'=>'fragments/footer_js/companysettings/modes_of_payment', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'payment_type'=>Types_Of_Payment_model::get(), 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}
        
	public function get_taxes(){
		$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/taxes', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/taxes', 'footer_js'=>'fragments/footer_js/companysettings/taxes', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'taxes'=>Taxes_Model::get(), 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}
        
	public function get_business_partners(){
		$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/business_partners', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/business_partners', 'footer_js'=>'fragments/footer_js/companysettings/business_partners', 'back_button'=>'../company_settings', 'active_nav'=>'company_settings', 'bpt_type'=>Business_Partners_Type_Model::get(), 'taxes'=>Co_Taxes_Model::get($this->session->userdata('user')->cb_id), 'bpc_class'=>Business_Partners_Class_Model::get(), 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}
        
	public function get_departments(){
		$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/departments', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/departments', 'footer_js'=>'fragments/footer_js/companysettings/departments', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}
        
	public function get_profit_cost_centers(){
		$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/profit_cost_centers', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/profit_cost_centers', 'footer_js'=>'fragments/footer_js/companysettings/profit_cost_centers', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'co_department'=>Co_Departments_Model::get($this->session->userdata('user')->cb_id), 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}
        
	public function get_products(){
		$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/products', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/products', 'footer_js'=>'fragments/footer_js/companysettings/products', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'co_profit_cost_center'=>Co_Profit_Cost_Centers_Model::get($this->session->userdata('user')->cb_id), 'co_department'=>Co_Departments_Model::get($this->session->userdata('user')->cb_id), 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}
        
	public function get_services(){
		$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/services', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/services', 'footer_js'=>'fragments/footer_js/companysettings/services', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'co_profit_cost_center'=>Co_Profit_Cost_Centers_Model::get($this->session->userdata('user')->cb_id), 'co_department'=>Co_Departments_Model::get($this->session->userdata('user')->cb_id), 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}
        
	public function get_discounts(){
		$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/discounts', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/discounts', 'footer_js'=>'fragments/footer_js/companysettings/discounts', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}

	public function get_chart_of_accounts(){
		$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/chart_of_accounts', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/chart_of_accounts', 'footer_js'=>'fragments/footer_js/companysettings/chart_of_accounts', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}
        
	public function get_banks(){
		$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/banks', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/banks', 'footer_js'=>'fragments/footer_js/companysettings/banks', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'bank'=>Banks_Model::get(), 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}
        
	public function get_others(){
		$seq_active = $this->session->flashdata('seq_active') ? $this->session->flashdata('seq_active') : '1';
		$this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/others', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/others', 'footer_js'=>'fragments/footer_js/companysettings/others', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'sess_data'=>$this->session->userdata('logged_in'), 'seq_active' => $seq_active]);
	}
    public function get_types_of_payment(){
       $this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/types_of_payment', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/types_of_payment', 'footer_js'=>'fragments/footer_js/companysettings/types_of_payment', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'sess_data'=>$this->session->userdata('logged_in')]);
    }
    public function get_tax_types(){
        $this->load->view($this->layout, ['head_css'=>'fragments/head_css/companysettings/tax_types', 'top_navbar'=>'fragments/top_navbar/global_top_navbar', 'content'=>'fragments/content/companysettings/tax_types', 'footer_js'=>'fragments/footer_js/companysettings/tax_types', 'back_button'=>'../company_settings', 'active_nav'=>'companysettings', 'sess_data'=>$this->session->userdata('logged_in')]);
    }
}