<?php

class Setup_Model extends CI_Model{
	private static $db;

	function __construct(){
		parent::__construct();
		self::$db = &get_instance()->db;
	}

    public static function class_list(){
    	return self::$db->get('business_partners_class')->result();
    }

    public static function tax_list(){
    	return self::$db->get('taxes')->result();
    }

    public static function bp_type_list(){
    	return self::$db->get('business_partners_type')->result();
    }

    public static function bank_list(){
    	return self::$db->get('banks')->result();    
    }

// NEW FUNCTIONS

    public static function get_profile($cb_id){
        return self::$db->get_where('company_branches', ['cb_id' => $cb_id])->result();
    }

    public static function edit_profile($data, $user){
        self::$db->where('cb_id', $user->main_company->cb_id)->update('company_branches', $data);
        $ch_data = [
                    'ch_cb_name' => $data['cb_name'],
                    'ch_cb_ind_name' => $data['cb_ind_name'],
                    'ch_name' => $data['name'],
                    'ch_cb_address' => $data['cb_address'],
                    'ch_cb_tin' => $data['cb_tin'],
                    'ch_cb_class' => $data['cb_class'],
                    'ch_cb_bp_type' => $data['cb_bp_type'],
                    'ch_cb_tax_type' => $data['cb_tax_type'],
                    'ch_cb_cno' => $data['cb_cno'],
                    'ch_cb_email' => $data['cb_email'],
                ];
        self::$db->where('ch_id', $user->ch_id)->update('company_history', $ch_data);
    }

    public static function add_tin_no($cb_id, $tin_no){
        self::$db->where('cb_id', $cb_id)->update('company_branches', ['cb_tin' => $tin_no]);
        self::$db->where('ch_cb_id', $cb_id)->update('company_history', ['ch_cb_tin' => $tin_no]);
    }

    public static function add_tax_type($cb_id, $tax_type){
        self::$db->where('cb_id', $cb_id)->update('company_branches', ['cb_tax_type' => $tax_type]);
        self::$db->where('ch_cb_id', $cb_id)->update('company_history', ['ch_cb_tax_type' => $tax_type]);
    }

    public static function add_employee($data){
        self::$db->insert('profiles', $data);
    }

    public static function edit_employee($p_id, $data){
        self::$db->where('p_id', $p_id)->update('profiles', $data);
    }

    public static function delete_employee($p_id){
        self::$db->where('p_id', $p_id)->delete('profiles');
        self::$db->where('p_id', $p_id)->delete('users');
    }

    public static function add_branch($cb_id, $data){
        $cb = self::$db->get_where('company_branches', ['cb_id' => $cb_id])->result()[0];
        $branch = [
                    'cb_name' => $data['cb_name'],
                    'name' => $data['name'],
                    'cb_address' => $data['cb_address'],
                    'cb_tin' => $data['cb_tin'],
                    'cb_class' => 'branch',
                    'cb_bp_type' => $cb->cb_bp_type,
                    'cb_tax_type' => $cb->cb_tax_type,
                    'cb_seq' => $cb->cb_seq,
                    'cb_cno' => $data['cb_cno'],
                    'cb_email' => $data['cb_email'],
                ];
        self::$db->insert('company_branches', $branch);
        $br_id = self::$db->insert_id();
        self::$db->insert('cb_br', ['cb_id' => $cb_id, 'br_id' => $br_id]);

        $history = [
                    'ch_cb_id' => $br_id,
                    'ch_cb_name' => $data['cb_name'],
                    'ch_name' => $data['name'],
                    'ch_cb_address' => $data['cb_address'],
                    'ch_cb_tin' => $data['cb_tin'],
                    'ch_cb_class' => 'branch',
                    'ch_cb_bp_type' => $cb->cb_bp_type,
                    'ch_cb_tax_type' => $cb->cb_tax_type,
                    'ch_cb_seq' => $cb->cb_seq,
                    'ch_cb_cno' => $data['cb_cno'],
                    'ch_cb_email' => $data['cb_email'],
                ];
        self::$db->insert('company_history', $history);
    }

    public static function edit_branch($cb_id, $data){
        self::$db->where('cb_id', $cb_id)->update('company_branches', $data);
        $history = [
                        'ch_cb_name' => $data['cb_name'],
                        'ch_name' => $data['name'],
                        'ch_cb_address' => $data['cb_address'],
                        'ch_cb_tin' => $data['cb_tin'],
                        'ch_cb_cno' => $data['cb_cno'],
                        'ch_cb_email' => $data['cb_email'],
                    ];
        self::$db->where('ch_cb_id', $cb_id)->update('company_history', $history);
    }

    public static function delete_branch($cb_id, $cbbr_id){
        self::$db->where('cb_id', $cb_id)->delete('company_branches');
        self::$db->where('ch_cb_id', $cb_id)->delete('company_history');
        self::$db->where('cbbr_id', $cbbr_id)->delete('cb_br');
        self::$db->where('cbbr_id', $cbbr_id)->delete('users');
    }

    public static function get_tin_tax_type($cb_id){
        return self::$db->get_where('company_branches', ['cb_id' => $cb_id])->result();
    }

    public static function get_users($cb_id, $p_id){
        $data = self::$db->from('profiles p')->join('users u', 'u.p_id=p.p_id')->where('p.cb_id', $cb_id)->where('p.p_id !=', $p_id)->get()->result();
        foreach ($data as $key => &$value) {
           $branch = self::$db->from('users u')->join('cb_br cbbr', 'cbbr.cbbr_id=u.cbbr_id')->join('company_branches cb', 'cb.cb_id=cbbr.br_id')->get()->result();
           $value->b_name = $branch[0]->name;
           $value->b_id= $branch[0]->br_id;
        }
        return $data;
    }

    public static function get_branch_list($cb_id){
        return self::$db->from('cb_br cbbr')->join('company_branches cb', 'cb.cb_id=cbbr.br_id')->where('cbbr.cb_id', $cb_id)->get()->result();
    }

    public static function add_user($profile, $user){
        self::$db->insert('profiles', $profile);
        $p_id = self::$db->insert_id();
        $last_record = self::$db->query("SELECT * FROM users WHERE cbbr_id='".$user['cbbr_id']."' ORDER BY CAST(u_seq AS DECIMAL) DESC LIMIT 1")->result();
        $seq = count($last_record) > 0 ? (floatval($last_record[0]->u_seq) + 1).'' : '0';
        $user['p_id'] = $p_id;
        $user['u_seq'] = $seq;
        self::$db->insert('users', $user);
    }

    public static function get_branches($cb_id){
        return self::$db->from('cb_br cbbr')->join('company_branches cb', 'cbbr.br_id=cb.cb_id')->where('cbbr.cb_id', $cb_id)->where('cbbr.br_id !=', $cb_id)->get()->result();
    }

    public static function table_get_branches($cb_id, $p_id){
        return self::$db->from('users u')->join('profiles p', 'p.p_id=u.p_id')->join('cb_br cbbr', 'cbbr.cbbr_id=u.cbbr_id')->join('company_branches cb', 'cb.cb_id=cbbr.br_id')->where('p.p_id', $p_id)->get()->result();
    }

    public static function get_user_available_branch($cb_id, $p_id){
        return self::$db->query("SELECT * FROM company_branches AS cb JOIN cb_br AS cbbr ON cb.cb_id=cbbr.br_id WHERE cbbr.cb_id='".$cb_id."' AND cb.cb_id NOT IN (SELECT cbbr.br_id FROM cb_br cbbr INNER JOIN users u ON u.cbbr_id=cbbr.cbbr_id WHERE u.p_id='".$p_id."')")->result();
    }

    public static function get_user_available_branch_edit($cb_id, $p_id, $current_br_id){
        return self::$db->query("SELECT * FROM company_branches AS cb JOIN cb_br AS cbbr ON cb.cb_id=cbbr.br_id WHERE cbbr.cb_id='".$cb_id."' AND cb.cb_id NOT IN (SELECT cbbr.br_id FROM cb_br cbbr INNER JOIN users u ON u.cbbr_id=cbbr.cbbr_id WHERE u.p_id='".$p_id."' AND cbbr.br_id != '".$current_br_id."')")->result();
    }

    public static function add_user_branch($user){
        $user['u_pass'] = password_hash($user['u_pass'], PASSWORD_BCRYPT, ['cost' => 11]);
        $last_record = self::$db->query("SELECT * FROM users WHERE cbbr_id='".$user['cbbr_id']."' ORDER BY CAST(u_seq AS DECIMAL) DESC LIMIT 1")->result();
        $seq = count($last_record) > 0 ? (floatval($last_record[0]->u_seq) + 1).'' : '0';
        $user['u_seq'] = $seq;
        self::$db->insert('users', $user);
    }

    public static function edit_user_branch($data){
        if($data['u_pass'] !== ''){
            $pass = password_hash($data['u_pass'], PASSWORD_BCRYPT, ['cost' => 11]);
            self::$db->where('u_id', $data['u_id'])->update('users', ['u_name' => $data['u_name'], 'u_pass' => $pass, 'u_type' => $data['u_type'], 'cbbr_id' => $data['cbbr_id']]);
        }else{
            self::$db->where('u_id', $data['u_id'])->update('users', ['u_name' => $data['u_name'], 'u_type' => $data['u_type'], 'cbbr_id' => $data['cbbr_id']]);
        }
    }

    public static function delete_user_branch($u_id){
        self::$db->where('u_id', $u_id)->delete('users');
    }

    public static function get_coa_lvl1($cb_id){
        return self::$db->from('coa_lvl_1 coa1')->join('co_coa_lvl1 cocoa1', 'coa1.lvl_1_id=cocoa1.lvl_1_id')->where('cocoa1.cb_id', $cb_id)->get()->result();
    }

    public static function get_coa_lvl2($cb_id){
        return self::$db->from('coa_lvl_2 coa2')->join('coalvl_1_2 coa12', 'coa2.lvl_2_id=coa12.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa12.lvl_1_id')->where('cocoa1.cb_id', $cb_id)->get()->result();
    }

    public static function get_coa_lvl3($cb_id){
        return self::$db->from('coa_lvl_3 coa3')->join('coalvl_2_3 coa23', 'coa23.lvl_3_id=coa3.lvl_3_id')->join('coa_lvl_2 coa2', 'coa2.lvl_2_id=coa23.lvl_2_id')->join('coalvl_1_2 coa12', 'coa2.lvl_2_id=coa12.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa12.lvl_1_id')->where('cocoa1.cb_id', $cb_id)->get()->result();
    }

    public static function get_coa_lvl4($cb_id){
        return self::$db->from('coa_lvl_4 coa4')->join('coalvl_3_4 coa34', 'coa4.lvl_4_id=coa34.lvl_4_id')->join('coa_lvl_3 coa3', 'coa3.lvl_3_id=coa34.lvl_3_id')->join('coalvl_2_3 coa23', 'coa23.lvl_3_id=coa3.lvl_3_id')->join('coa_lvl_2 coa2', 'coa2.lvl_2_id=coa23.lvl_2_id')->join('coalvl_1_2 coa12', 'coa2.lvl_2_id=coa12.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa12.lvl_1_id')->where('cocoa1.cb_id', $cb_id)->get()->result();
    }

    public static function get_coa_lvl5($cb_id){
        return self::$db->from('coa_lvl_5 coa5')->join('coalvl_4_5 coa45', 'coa45.lvl_5_id=coa5.lvl_5_id')->join('coa_lvl_4 coa4', 'coa4.lvl_4_id=coa45.lvl_4_id')->join('coalvl_3_4 coa34', 'coa4.lvl_4_id=coa34.lvl_4_id')->join('coa_lvl_3 coa3', 'coa3.lvl_3_id=coa34.lvl_3_id')->join('coalvl_2_3 coa23', 'coa23.lvl_3_id=coa3.lvl_3_id')->join('coa_lvl_2 coa2', 'coa2.lvl_2_id=coa23.lvl_2_id')->join('coalvl_1_2 coa12', 'coa2.lvl_2_id=coa12.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa12.lvl_1_id')->where('cocoa1.cb_id', $cb_id)->get()->result();
    }

    public static function add_coa_lvl5($data){
        $last_record = self::$db->query("SELECT * FROM coa_lvl_5 coa5 JOIN coalvl_4_5 coa45 ON coa45.lvl_5_id=coa5.lvl_5_id JOIN coa_lvl_4 coa4 ON coa4.lvl_4_id=coa45.lvl_4_id JOIN coalvl_3_4 coa34 ON coa4.lvl_4_id=coa34.lvl_4_id JOIN coa_lvl_3 coa3 ON coa3.lvl_3_id=coa34.lvl_3_id JOIN coalvl_2_3 coa23 ON coa23.lvl_3_id=coa3.lvl_3_id JOIN coa_lvl_2 coa2 ON coa2.lvl_2_id=coa23.lvl_2_id JOIN coalvl_1_2 coa12 ON coa2.lvl_2_id=coa12.lvl_2_id JOIN coa_lvl_1 coa1 ON coa1.lvl_1_id=coa12.lvl_1_id JOIN co_coa_lvl1 cocoa1 ON cocoa1.lvl_1_id=coa12.lvl_1_id WHERE cocoa1.cb_id='".$data['cb_id']."' AND coa4.lvl_4_id='".$data['lvl_4_id']."' ORDER BY CAST(coa5.lvl_5_code AS DECIMAL) DESC LIMIT 1")->result();

        $code = count($last_record) > 0 ? (floatval($last_record[0]->lvl_5_code) + 1).'' : '0';

        self::$db->insert('coa_lvl_5', ['lvl_5_code' => $code, 'lvl_5_name' => $data['lvl_5_name'], 'lvl_5_company' => $data['lvl_5_company'], 'lvl_5_setup_company' => $data['lvl_5_setup_company']]);
        $lvl_5_id = self::$db->insert_id();
        self::$db->insert('coalvl_4_5', ['lvl_4_id' => $data['lvl_4_id'], 'lvl_5_id' => $lvl_5_id]);
    }

    public static function edit_coa_lvl5($data){
        self::$db->where('lvl_5_id', $data['lvl_5_id'])->update('coa_lvl_5', ['lvl_5_code' => $data['lvl_5_code'], 'lvl_5_name' => $data['lvl_5_name']]);
        self::$db->where('lvl_5_id', $data['lvl_5_id'])->update('coalvl_4_5', ['lvl_4_id' => $data['lvl_4_id']]);
    }

    public static function delete_coa_lvl5($data){
        self::$db->where('lvl_5_id', $data['lvl_5_id'])->delete('coa_lvl_5');
        self::$db->where('coalvl45_id', $data['coalvl45_id'])->delete('coalvl_4_5');
    }

    public static function get_coa_lvl6($cb_id){
        // return self::$db->from('coa_lvl_6 coa6')->join('coalvl_5_6 coa56', 'coa6.lvl_6_id=coa56.lvl_6_id')->join('coa_lvl_5 coa5', 'coa5.lvl_5_id=coa56.lvl_5_id')->join('coalvl_4_5 coa45', 'coa45.lvl_5_id=coa5.lvl_5_id')->join('coa_lvl_4 coa4', 'coa4.lvl_4_id=coa45.lvl_4_id')->join('coalvl_3_4 coa34', 'coa4.lvl_4_id=coa34.lvl_4_id')->join('coa_lvl_3 coa3', 'coa3.lvl_3_id=coa34.lvl_3_id')->join('coalvl_2_3 coa23', 'coa23.lvl_3_id=coa3.lvl_3_id')->join('coa_lvl_2 coa2', 'coa2.lvl_2_id=coa23.lvl_2_id')->join('coalvl_1_2 coa12', 'coa2.lvl_2_id=coa12.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa12.lvl_1_id')->where('cocoa1.cb_id', $cb_id)->get()->result();
        return '';
    }

    public static function add_coa_lvl6($data){
        $last_record = self::$db->query("SELECT * FROM coa_lvl_6 coa6 JOIN coalvl_5_6 coa56 ON coa6.lvl_6_id=coa56.lvl_6_id JOIN coa_lvl_5 coa5 ON coa5.lvl_5_id=coa56.lvl_5_id JOIN coalvl_4_5 coa45 ON coa45.lvl_5_id=coa5.lvl_5_id JOIN coa_lvl_4 coa4 ON coa4.lvl_4_id=coa45.lvl_4_id JOIN coalvl_3_4 coa34 ON coa4.lvl_4_id=coa34.lvl_4_id JOIN coa_lvl_3 coa3 ON coa3.lvl_3_id=coa34.lvl_3_id JOIN coalvl_2_3 coa23 ON coa23.lvl_3_id=coa3.lvl_3_id JOIN coa_lvl_2 coa2 ON coa2.lvl_2_id=coa23.lvl_2_id JOIN coalvl_1_2 coa12 ON coa2.lvl_2_id=coa12.lvl_2_id JOIN coa_lvl_1 coa1 ON coa1.lvl_1_id=coa12.lvl_1_id JOIN co_coa_lvl1 cocoa1 ON cocoa1.lvl_1_id=coa12.lvl_1_id WHERE cocoa1.cb_id='".$data['cb_id']."' AND coa5.lvl_5_id='".$data['lvl_5_id']."' ORDER BY CAST(coa6.lvl_6_code AS DECIMAL) DESC LIMIT 1")->result();

        $code = count($last_record) > 0 ? (floatval($last_record[0]->lvl_6_code) + 1).'' : '0';
        self::$db->insert('coa_lvl_6', ['lvl_6_code' => $code, 'lvl_6_name' => $data['lvl_6_name'], 'lvl_6_company' => $data['lvl_6_company'], 'lvl_6_setup_company' => $data['lvl_6_setup_company']]);
        $lvl_6_id = self::$db->insert_id();
        self::$db->insert('coalvl_5_6', ['lvl_5_id' => $data['lvl_5_id'], 'lvl_6_id' => $lvl_6_id]);
        
    }

    public static function edit_coa_lvl6($data){
        self::$db->where('lvl_6_id', $data['lvl_6_id'])->update('coa_lvl_6', ['lvl_6_code' => $data['lvl_6_code'], 'lvl_6_name' => $data['lvl_6_name']]);
        self::$db->where('lvl_6_id', $data['lvl_6_id'])->update('coalvl_5_6', ['lvl_5_id' => $data['lvl_5_id']]);
    }

    public static function delete_coa_lvl6($data){
        self::$db->where('lvl_6_id', $data['lvl_6_id'])->delete('coa_lvl_6');
        self::$db->where('coalvl56_id', $data['coalvl56_id'])->delete('coalvl_5_6');
    }

    public static function get_level_4($cb_id){
        return self::$db->from('coa_lvl_4 coa4')->join('coalvl_3_4 coa34', 'coa4.lvl_4_id=coa34.lvl_4_id')->join('coa_lvl_3 coa3', 'coa3.lvl_3_id=coa34.lvl_3_id')->join('coalvl_2_3 coa23', 'coa23.lvl_3_id=coa3.lvl_3_id')->join('coa_lvl_2 coa2', 'coa2.lvl_2_id=coa23.lvl_2_id')->join('coalvl_1_2 coa12', 'coa2.lvl_2_id=coa12.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa12.lvl_1_id')->where('cocoa1.cb_id', $cb_id)->get()->result();
    }

    public static function get_level_5($cb_id){
        return self::$db->from('coa_lvl_5 coa5')->join('coalvl_4_5 coa45', 'coa45.lvl_5_id=coa5.lvl_5_id')->join('coa_lvl_4 coa4', 'coa4.lvl_4_id=coa45.lvl_4_id')->join('coalvl_3_4 coa34', 'coa4.lvl_4_id=coa34.lvl_4_id')->join('coa_lvl_3 coa3', 'coa3.lvl_3_id=coa34.lvl_3_id')->join('coalvl_2_3 coa23', 'coa23.lvl_3_id=coa3.lvl_3_id')->join('coa_lvl_2 coa2', 'coa2.lvl_2_id=coa23.lvl_2_id')->join('coalvl_1_2 coa12', 'coa2.lvl_2_id=coa12.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa12.lvl_1_id')->where('cocoa1.cb_id', $cb_id)->get()->result();
    }

    public static function get_tax($cb_id){
        return self::$db->from('taxes t')->join('co_taxes ct', 'ct.t_id=t.t_id')->join('tax_types tt', 'tt.tt_id=t.tt_id')->get()->result();
    }

    public static function add_tax($data){
        $last_record = self::$db->query("SELECT * FROM taxes t JOIN co_taxes cot ON t.t_id=cot.t_id WHERE cot.cb_id='".$data['cb_id']."' ORDER BY CAST(t.t_seq AS DECIMAL) DESC LIMIT 1")->result();
        $seq = count($last_record) > 0 ? (floatval($last_record[0]->t_seq) + 1).'' : '0';
        self::$db->insert('taxes', ['t_seq' => $seq, 't_code' => $data['tt_id'].''.$seq, 't_name' => $data['t_name'], 't_shortname' => $data['t_shortname'], 't_rate' => $data['t_rate'], 't_base' => $data['t_base'], 'tt_id' => $data['tt_id'], 't_company' => $data['t_company'], 't_setup_company' => $data['t_setup_company']]);
        $t_id = self::$db->insert_id();
        self::$db->insert('co_taxes', ['t_id' => $t_id, 'cb_id' => $data['cb_id']]);
    }

    public static function edit_tax($data){
        self::$db->where('t_id', $data['t_id'])->update('taxes', ['t_code' => $data['t_code'], 't_name' => $data['t_name'], 't_shortname' => $data['t_shortname'], 't_rate' => $data['t_rate'], 't_base' => $data['t_base'], 'tt_id' => $data['tt_id'], 't_company' => $data['t_company'], 't_setup_company' => $data['t_setup_company']]);
    }

    public static function delete_tax($data){
        self::$db->where('t_id', $data['t_id'])->delete('taxes');
        self::$db->where('co_t_id', $data['co_t_id'])->delete('co_taxes');
    }   

    public static function get_tax_types(){
        return self::$db->get_where('tax_types', ['tt_company' => 'docpro'])->result();
    }
}