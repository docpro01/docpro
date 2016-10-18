<?php

class Setup extends MY_Controller{
	
	function __construct(){
		parent::__construct('fragments_setup/master_layout');
        if(!($this->session->userdata('logged_in'))) redirect('login');
	}
	
	public function index(){
        return $this->load->view($this->layout, ['user' => $this->session->userdata('user'), 'content' => 'fragments_setup/content/welcome', 'footer_js' => 'fragments_setup/footer_js/welcome']);
	}

    public function setup_account(){
        $setup_type = $this->input->get('setup_type');
        if($setup_type === 'default'){
            return $this->load->view($this->layout, ['head_css' => 'fragments_setup/head_css/setup_account', 'content' => 'fragments_setup/content/setup_account_default', 'footer_js' => 'fragments_setup/footer_js/setup_account_default', 'user' => $this->session->userdata('user')]);
        }
        return $this->load->view($this->layout, ['head_css' => 'fragments_setup/head_css/setup_account', 'content' => 'fragments_setup/content/setup_account', 'footer_js' => 'fragments_setup/footer_js/setup_account', 'user' => $this->session->userdata('user')]);
    }

    public function get_profile(){
        echo json_encode(['data' => Setup_Model::get_profile($this->session->userdata('user')->cb_id)]);
    }

    public function edit_profile(){
        $data = [
                    'cb_name' => $this->input->get('company_name'),
                    'cb_ind_name' => $this->input->get('individual_name'),
                    'name' => $this->input->get('company_name') !== '' ? $this->input->get('company_name') : $this->input->get('individual_name'),
                    'cb_address' => $this->input->get('address'),
                    'cb_tin' => $this->input->get('tin'),
                    'cb_class' => 'company',
                    'cb_bp_type' => $this->input->get('company_name') === '' ? 'Individual' : 'Non-Individual',
                    'cb_tax_type' => $this->input->get('tax_type'),
                    'cb_cno' => $this->input->get('mobile_number'),
                    'cb_email' => $this->input->get('email'),
                ];

        Setup_Model::edit_profile($data, $this->session->userdata('user'));
    }

    public function add_tin_no(){
        Setup_Model::add_tin_no($this->session->userdata('user')->cb_id, $this->input->get('tin_no'));
    }

    public function add_tax_type(){
        Setup_Model::add_tax_type($this->session->userdata('user')->cb_id, $this->input->get('tax_type'));
    }

    public function add_employee(){
        $data = [
                    'p_fname' => $this->input->get('add-fname'),
                    'p_mname' => $this->input->get('add-mname'),
                    'p_lname' => $this->input->get('add-lname'),
                    'p_address' => $this->input->get('add-emp-address'),
                    'p_cno' => $this->input->get('add-emp-cno'),
                    'p_email' => $this->input->get('add-emp-email'),
                    'cb_id' => $this->session->userdata('user')->cb_id
                ];
        Setup_Model::add_employee($data);
    }

    public function edit_employee(){
        $data = [
                    'p_fname' => $this->input->get('edit-fname'),
                    'p_mname' => $this->input->get('edit-mname'),
                    'p_lname' => $this->input->get('edit-lname'),
                    'p_address' => $this->input->get('edit-emp-address'),
                    'p_cno' => $this->input->get('edit-emp-cno'),
                    'p_email' => $this->input->get('edit-emp-email')
                ];
        Setup_Model::edit_employee($this->input->get('edit-id'), $data);
    }

    public function delete_employee(){
        Setup_Model::delete_employee($this->input->get('p_id'));        
    }

    public function add_branch(){
        $data = [
                'cb_name' => $this->input->get('add-branch-name'),
                'name' => $this->input->get('add-branch-name'),
                'cb_address' => $this->input->get('add-branch-address'),
                'cb_tin' => $this->input->get('add-branch-tin'),
                'cb_cno' => $this->input->get('add-branch-cno'),
                'cb_email' => $this->input->get('add-branch-email'),
            ];
        Setup_Model::add_branch($this->session->userdata('user')->cb_id, $data);
    }

    public function edit_branch(){
        $data = [
                'cb_name' => $this->input->get('edit-branch-name'),
                'name' => $this->input->get('edit-branch-name'),
                'cb_address' => $this->input->get('edit-branch-address'),
                'cb_tin' => $this->input->get('edit-branch-tin'),
                'cb_cno' => $this->input->get('edit-branch-cno'),
                'cb_email' => $this->input->get('edit-branch-email'),
            ];
        Setup_Model::edit_branch($this->input->get('edit-id'), $data);
    }

    public function delete_branch(){
        Setup_Model::delete_branch($this->input->get('cb_id'), $this->input->get('cbbr_id'));
    }

    public function get_tin_tax_type(){
        echo json_encode(Setup_Model::get_tin_tax_type($this->session->userdata('user')->cb_id));
    }

    public function get_users(){
        echo json_encode(['data' => Setup_Model::get_users($this->session->userdata('user'))]);
    }

    public function get_branch_list(){
        echo json_encode(Setup_Model::get_branch_list($this->session->userdata('user')->cb_id));
    }

    public function add_user(){
        $profile = [
                    'p_fname' => $this->input->get('add-fname'),
                    'p_mname' => $this->input->get('add-mname'),
                    'p_lname' => $this->input->get('add-lname'),
                    'p_address' => $this->input->get('add-user-address'),
                    'p_cno' => $this->input->get('add-user-cno'),
                    'p_email' => $this->input->get('add-user-email'),
                    'cb_id' => $this->session->userdata('user')->cb_id
                ];

        $user = [
                    'u_name' => $this->input->get('add-user-username'),
                    'u_pass' => password_hash($this->input->get('add-user-username'), PASSWORD_BCRYPT, ['cost' => 11]),
                    'u_type' => $this->input->get('add-user-access-level'),
                    'u_company' => 'company',
                    'subs_type' => $this->session->userdata('user')->subs_type,
                    'subs_exp_date' => $this->session->userdata('user')->subs_exp_date,
                    'setup' => '0',
                    'cbbr_id' => $this->input->get('add-user-branch'),
                    'u_validity_date' => $this->input->get('add-user-validity-date')
                ];

        Setup_Model::add_user($profile, $user);
    }

    public function edit_user(){
        $profile = [
                    'p_fname' => $this->input->get('edit-fname'),
                    'p_mname' => $this->input->get('edit-mname'),
                    'p_lname' => $this->input->get('edit-lname'),
                    'p_address' => $this->input->get('edit-user-address'),
                    'p_cno' => $this->input->get('edit-user-cno'),
                    'p_email' => $this->input->get('edit-user-email')
                ];

        $user = [
                    'u_name' => $this->input->get('edit-user-username'),
                    'u_pass' => password_hash($this->input->get('edit-user-username'), PASSWORD_BCRYPT, ['cost' => 11]),
                    'u_type' => $this->input->get('edit-user-access-level'),
                    'cbbr_id' => $this->input->get('edit-user-branch'),
                    'u_validity_date' => $this->input->get('edit-user-validity-date')
                ];
        $p_id = $this->input->get('edit-profile-id');
        $u_id = $this->input->get('edit-user-id');

        Setup_Model::edit_user($profile, $user, $p_id, $u_id);
    }

    public function delete_user(){
        $p_id = $this->input->get('p_id');
        $u_id = $this->input->get('u_id');
        Setup_Model::delete_user($p_id, $u_id);
    }

    public function get_branches(){
        echo json_encode(['data' => Setup_Model::get_branches($this->session->userdata('user')->cb_id)]);
    }

    // public function table_get_employees(){
    //     echo json_encode(['data' => Setup_Model::get_users($this->session->userdata('user')->cbbr_id, $this->session->userdata('user')->p_id)]);
    // }

    public function table_get_branches($slug){
        echo json_encode(['data' => Setup_Model::table_get_branches($this->session->userdata('user')->cb_id, $slug)]);
    }

    public function get_user_available_branch(){
        echo json_encode(Setup_Model::get_user_available_branch($this->session->userdata('user')->cb_id, $this->input->get('p_id')));
    }

    public function get_user_available_branch_edit(){
        echo json_encode(Setup_Model::get_user_available_branch_edit($this->session->userdata('user')->cb_id, $this->input->get('p_id'), $this->input->get('br_id')));
    }

    public function add_user_branch(){
        $u_company = $this->session->userdata('user')->u_company;
        $subs_type = $this->session->userdata('user')->subs_type;
        $subs_exp_date = $this->session->userdata('user')->subs_exp_date;

        $user = [
                    'u_name' => $this->input->get('add-username'),
                    'u_pass' => $this->input->get('add-password'),
                    'u_type' => $this->input->get('add-type'),
                    'u_company' => $u_company,
                    'subs_type' => $subs_type,
                    'subs_exp_date' => $subs_exp_date,
                    'setup' => '0',
                    'p_id' => $this->input->get('add-p-id'),
                    'cbbr_id' => $this->input->get('add-branch'),
                ];
        Setup_Model::add_user_branch($user);
    }

    public function edit_user_branch(){
        $data = [
                    'u_name' => $this->input->get('edit-username'),
                    'u_pass' => $this->input->get('edit-password'),
                    'cbbr_id' => $this->input->get('edit-branch'),
                    'u_type' => $this->input->get('edit-type'),
                    'u_id' => $this->input->get('edit-u-id')
                ];
        Setup_Model::edit_user_branch($data);  
    }

    public function delete_user_branch(){
        Setup_Model::delete_user_branch($this->input->get('u_id'));
    }

    public function get_coa_lvl1(){
        echo json_encode(['data' => Setup_Model::get_coa_lvl1($this->session->userdata('user')->cb_id)]);
    }
    public function get_coa_lvl2($slug){
        echo json_encode(['data' => Setup_Model::get_coa_lvl2($slug, $this->session->userdata('user')->cb_id)]);
    }
    public function get_coa_lvl3($slug){
        echo json_encode(['data' => Setup_Model::get_coa_lvl3($slug, $this->session->userdata('user')->cb_id)]);
    }
    public function get_coa_lvl4($slug){
        echo json_encode(['data' => Setup_Model::get_coa_lvl4($slug, $this->session->userdata('user')->cb_id)]);
    }
    public function get_coa_lvl5($slug){
        echo json_encode(['data' => Setup_Model::get_coa_lvl5($slug, $this->session->userdata('user')->cb_id)]);
    }
    public function get_coa_lvl6(){
        echo json_encode(['data' => Setup_Model::get_coa_lvl6($this->session->userdata('user')->cb_id)]);
    }
    // public function get_level_4(){
    //     echo json_encode(Setup_Model::get_level_4($this->session->userdata('user')->cb_id));
    // }
    public function get_level_5(){
        echo json_encode(Setup_Model::get_level_5($this->session->userdata('user')->cb_id));
    }
    public function get_tax($slug){
        echo json_encode(['data' => Setup_Model::get_tax($slug, $this->session->userdata('user'))]);
    }
    public function add_tax(){
        $data = [
            't_name' => $this->input->get('add-name'),
            't_shortname' => $this->input->get('add-shortname'),
            't_rate' => $this->input->get('add-rate'),
            't_base' => $this->input->get('add-base'),
            'tt_id' => $this->input->get('add-type'),
            't_company' => 'company',
            't_setup_company' => 'company',
            'cb_id' => $this->session->userdata('user')->cb_id
        ];
        Setup_Model::add_tax($data);
    }
    public function edit_tax(){
        $data = [
            't_code' => $this->input->get('edit-code'),
            't_name' => $this->input->get('edit-name'),
            't_shortname' => $this->input->get('edit-shortname'),
            't_rate' => $this->input->get('edit-rate'),
            't_base' => $this->input->get('edit-base'),
            'tt_id' => $this->input->get('edit-type'),
            't_id' => $this->input->get('edit-t-id'),
            't_company' => 'company',
            't_setup_company' => 'company'
        ];
        Setup_Model::edit_tax($data, $this->session->userdata('user'));
    }
    public function delete_tax(){
        $data = [
            't_id' => $this->input->get('t_id'),
            'co_t_id' => $this->input->get('co_t_id')
        ];
        Setup_Model::delete_tax($data);
    }


    public function get_tax_types_list(){
        echo json_encode(Setup_Model::get_tax_types_list($this->session->userdata('user')));
    }
    public function get_tax_types(){
        echo json_encode(['data' => Setup_Model::get_tax_types($this->session->userdata('user'))]);
    }
    public function add_tax_types(){
        $data = [
                    'tt_name' => $this->input->get('add-name'),
                    'tt_shortname' => $this->input->get('add-shortname'),
                    'tt_company' => 'company'
                ];
        Setup_Model::add_tax_types($data, $this->session->userdata('user'));
    }
    public function edit_tax_types(){
        $data = [
                    'tt_code' => $this->input->get('edit-code'),
                    'tt_name' => $this->input->get('edit-name'),
                    'tt_shortname' => $this->input->get('edit-shortname')
                ];
        $edit_id = $this->input->get('edit-tt-id');
        Setup_Model::edit_tax_types($data, $edit_id, $this->session->userdata('user'));
    }
    public function delete_tax_types(){
        Setup_Model::delete_tax_types($this->input->get('id'));
    }

    public function add_coa_lvl1(){
        $data = [
                    'lvl_1_name' => $this->input->get('add-lvl-1-name'),
                    'lvl_1_company' => 'company',
                    'lvl_1_setup_company' => 'company',
                ];
        Setup_Model::add_coa_lvl1($data, $this->session->userdata('user'));
    }

    public function edit_coa_lvl1(){
        $data = [
                    'lvl_1_code' => $this->input->get('edit-lvl-1-code'),
                    'lvl_1_name' => $this->input->get('edit-lvl-1-name')
        ];
        Setup_Model::edit_coa_lvl1($data, $this->input->get('edit-id'), $this->session->userdata('user'));
    }

    public function delete_coa_lvl1(){
        Setup_Model::delete_coa_lvl1($this->input->get('id'));
    }

    public function get_level_1(){
        echo json_encode(Setup_Model::get_level_1($this->session->userdata('user')));
    }

    public function add_coa_lvl2(){
        $data = [
                    'lvl_2_name' => $this->input->get('add-lvl-2-name'),
                    'lvl_2_company' => 'company',
                    'lvl_2_setup_company' => 'company'
                ];
        Setup_Model::add_coa_lvl2($data, $this->input->get('lvl-1-id'), $this->session->userdata('user'));
    }

    public function edit_coa_lvl2(){
        $data = [
                    'lvl_2_code' => $this->input->get('edit-lvl-2-code'),
                    'lvl_2_name' => $this->input->get('edit-lvl-2-name')
                ];
        $lvl_1_id = $this->input->get('lvl-1-id');
        $edit_id = $this->input->get('edit-id');
        Setup_Model::edit_coa_lvl2($data, $lvl_1_id, $edit_id, $this->session->userdata('user'));
    }

    public function delete_coa_lvl2(){
        Setup_Model::delete_coa_lvl2($this->input->get('id'));
    }

    public function get_level_2(){
        echo json_encode(Setup_Model::get_level_2($this->session->userdata('user')));
    }

    public function add_coa_lvl3(){
        $data = [
                    'lvl_3_name' => $this->input->get('add-lvl-3-name'),
                    'lvl_3_company' => 'company',
                    'lvl_3_setup_company' => 'company',
                    'lvl_3_bir' => $this->input->get('add-lvl-3-bir'),
                ];
        Setup_Model::add_coa_lvl3($data, $this->input->get('lvl-2-id'), $this->session->userdata('user'));
    }

    public function edit_coa_lvl3(){
        $data = [
                    'lvl_3_code' => $this->input->get('edit-lvl-3-code'),
                    'lvl_3_code_int' => floatval($this->input->get('edit-lvl-3-code')),
                    'lvl_3_name' => $this->input->get('edit-lvl-3-name'),
                    'lvl_3_bir' => $this->input->get('edit-lvl-3-bir'),
                ];
        $lvl_2_id = $this->input->get('lvl-2-id');
        $edit_id = $this->input->get('edit-id');
        Setup_Model::edit_coa_lvl3($data, $lvl_2_id, $edit_id, $this->session->userdata('user'));
    }

    public function delete_coa_lvl3(){
        Setup_Model::delete_coa_lvl3($this->input->get('id'));
    }

    public function get_level_3(){
        echo json_encode(Setup_Model::get_level_3($this->session->userdata('user')));
    }

    public function add_level_4(){
        $data = [
                    'lvl_4_name' => $this->input->get('add-lvl-4-name'),
                    'lvl_4_company' => 'company',
                    'lvl_4_setup_company' => 'company'
                ];
        Setup_Model::add_level_4($data, $this->input->get('lvl-3-id'), $this->session->userdata('user'));
    }

    public function edit_level_4(){
        $data = [
                    'lvl_4_code' => $this->input->get('edit-lvl-4-code'),
                    'lvl_4_name' => $this->input->get('edit-lvl-4-name')
                ];
        $lvl_3_id = $this->input->get('lvl-3-id');
        $edit_id = $this->input->get('edit-id');
        Setup_Model::edit_level_4($data, $lvl_3_id, $edit_id, $this->session->userdata('user'));
    }

    public function delete_level_4(){
        Setup_Model::delete_level_4($this->input->get('id'));
    }

    public function get_level_4(){
        echo json_encode(Setup_Model::get_level_4($this->session->userdata('user')));
    }

    public function add_level_5(){
        $data = [
                    'lvl_5_name' => $this->input->get('lvl-5-name'),
                    'lvl_5_company' => 'company',
                    'lvl_5_setup_company' => 'company'
                ];
        Setup_Model::add_level_5($data, $this->input->get('lvl-4-id'), $this->session->userdata('user'));
    }

    public function edit_level_5(){
        $data = [
                    'lvl_5_code' => $this->input->get('edit-lvl-5-code'),
                    'lvl_5_name' => $this->input->get('edit-lvl-5-name')
                ];
        $lvl_4_id = $this->input->get('lvl-4-id');
        $edit_id = $this->input->get('edit-id');
        Setup_Model::edit_level_5($data, $lvl_4_id, $edit_id, $this->session->userdata('user'));
    }

    public function delete_level_5(){
        Setup_Model::delete_level_5($this->input->get('id'));
    }

    public function finish_setup(){
        redirect('logout');
    }

// OLD

    public function add_coa_lvl5(){
        $data = [
                'lvl_5_name' => $this->input->get('add-lvl-5-name'),
                'lvl_5_company' => 'company',
                'lvl_5_setup_company' => 'company',
                'lvl_4_id' => $this->input->get('add-lvl-4'),
                'cb_id' => $this->session->userdata('user')->cb_id
        ];
        Setup_Model::add_coa_lvl5($data);
    }

    public function edit_coa_lvl5(){
        $data = [
            'lvl_5_code' => $this->input->get('edit-lvl-5-code'),
            'lvl_5_name' => $this->input->get('edit-lvl-5-name'),
            'lvl_5_id' => $this->input->get('edit-lvl-5-id'),
            'lvl_4_id' => $this->input->get('edit-lvl-4'),
            'cb_id' => $this->session->userdata('user')->cb_id
        ];
        Setup_Model::edit_coa_lvl5($data);
    }

    public function delete_coa_lvl5(){
        $data = [
            'lvl_5_id' => $this->input->get('lvl_5_id'),
            'coalvl45_id' => $this->input->get('coalvl45_id')
        ];
        Setup_Model::delete_coa_lvl5($data);
    }

    public function add_coa_lvl6(){
        $data = [
                'lvl_6_name' => $this->input->get('add-lvl-6-name'),
                'lvl_6_company' => 'company',
                'lvl_6_setup_company' => 'company',
                'lvl_5_id' => $this->input->get('add-lvl-5'),
                'cb_id' => $this->session->userdata('user')->cb_id
        ];
        Setup_Model::add_coa_lvl6($data);
    }

    public function edit_coa_lvl6(){
        $data = [
                'lvl_6_code' => $this->input->get('edit-lvl-6-code'),
                'lvl_6_name' => $this->input->get('edit-lvl-6-name'),
                'lvl_6_id' => $this->input->get('edit-lvl-6-id'),
                'lvl_5_id' => $this->input->get('edit-lvl-5'),
                'cb_id' => $this->session->userdata('user')->cb_id
        ];
        Setup_Model::edit_coa_lvl6($data);
    }

    public function delete_coa_lvl6(){
        $data = [
                'lvl_6_id' => $this->input->get('lvl_6_id'),
                'coalvl56_id' => $this->input->get('coalvl56_id')
        ];
        Setup_Model::delete_coa_lvl6($data);
    }

// OLD VERSION

    public function class_list(){
        echo json_encode(Setup_Model::class_list());
    }

    public function tax_list(){
        echo json_encode(Setup_Model::tax_list());
    }

    public function bp_type_list(){
        echo json_encode(Setup_Model::bp_type_list());
    }

    public function bank_list(){
        echo json_encode(Setup_Model::bank_list());
    }
}