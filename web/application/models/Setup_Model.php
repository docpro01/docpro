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
        self::$db->where('cb_id', $cb_id)->update('company_branches', ['flag' => '0']);
        self::$db->where('ch_cb_id', $cb_id)->update('company_history', ['flag' => '0']);
        self::$db->where('cbbr_id', $cbbr_id)->update('users', ['u_flag' => '0']);
        // self::$db->where('cbbr_id', $cbbr_id)->delete('cb_br');
    }

    public static function get_tin_tax_type($cb_id){
        return self::$db->get_where('company_branches', ['cb_id' => $cb_id])->result();
    }

    public static function get_users($user){
        $data = self::$db->from('profiles p')->join('users u', 'u.p_id=p.p_id')->where('p.cb_id', $user->cb_id)->where('p.p_id !=', $user->p_id)->where('u.u_flag', '1')->get()->result();
        foreach ($data as $key => &$value) {
           $branch = self::$db->from('users u')->join('cb_br cbbr', 'cbbr.cbbr_id=u.cbbr_id')->join('company_branches cb', 'cb.cb_id=cbbr.br_id')->where(['u.p_id' => $value->p_id, 'cbbr.cb_id' => $value->cb_id])->get()->result();
           $value->b_name = $branch[0]->name;
           $value->b_id= $branch[0]->br_id;
        }
        return $data;
    }

    public static function get_branch_list($cb_id){
        return self::$db->from('cb_br cbbr')->join('company_branches cb', 'cb.cb_id=cbbr.br_id')->where(['cbbr.cb_id' => $cb_id, 'cb.flag' => '1'])->get()->result();
    }

    public static function add_user($profile, $user){
        self::$db->insert('profiles', $profile);
        $p_id = self::$db->insert_id();
        $last_record = self::$db->query("SELECT * FROM users WHERE cbbr_id='".$user['cbbr_id']."' ORDER BY CAST(u_seq AS DECIMAL) DESC LIMIT 1")->result();
        $seq = count($last_record) > 0 ? (floatval($last_record[0]->u_seq) + 1).'' : '1';
        $user['p_id'] = $p_id;
        $user['u_seq'] = $seq;
        self::$db->insert('users', $user);
    }

    public static function edit_user($profile, $user, $p_id, $u_id){
        self::$db->where('p_id', $p_id)->update('profiles', $profile);
        self::$db->where('u_id', $u_id)->update('users', $user);
    }

    public static function delete_user($p_id, $u_id){
        self::$db->where('p_id', $p_id)->delete('profiles');
        self::$db->where('u_id', $u_id)->delete('users');
    }

    public static function get_branches($cb_id){
        return self::$db->from('cb_br cbbr')->join('company_branches cb', 'cbbr.br_id=cb.cb_id')->where('cbbr.cb_id', $cb_id)->where('cb.flag', '1')->where('cbbr.br_id !=', $cb_id)->get()->result();
    }

    public static function table_get_branches($cb_id, $p_id){
        return self::$db->from('users u')->join('profiles p', 'p.p_id=u.p_id')->join('cb_br cbbr', 'cbbr.cbbr_id=u.cbbr_id')->join('company_branches cb', 'cb.cb_id=cbbr.br_id')->where(['p.p_id' => $p_id, 'cb.flag' => '1'])->get()->result();
    }

    public static function get_user_available_branch($cb_id, $p_id){
        return self::$db->query("SELECT * FROM company_branches AS cb JOIN cb_br AS cbbr ON cb.cb_id=cbbr.br_id WHERE cbbr.cb_id='".$cb_id."' AND cb.cb_id NOT IN (SELECT cbbr.br_id FROM cb_br cbbr INNER JOIN users u ON u.cbbr_id=cbbr.cbbr_id WHERE u.p_id='".$p_id."') AND cb.flag='1'")->result();
    }

    public static function get_user_available_branch_edit($cb_id, $p_id, $current_br_id){
        return self::$db->query("SELECT * FROM company_branches AS cb JOIN cb_br AS cbbr ON cb.cb_id=cbbr.br_id WHERE cbbr.cb_id='".$cb_id."' AND cb.cb_id NOT IN (SELECT cbbr.br_id FROM cb_br cbbr INNER JOIN users u ON u.cbbr_id=cbbr.cbbr_id WHERE u.p_id='".$p_id."' AND cbbr.br_id != '".$current_br_id."' AND u.u_flag='1')")->result();
    }

    public static function add_user_branch($user){
        $user['u_pass'] = password_hash($user['u_pass'], PASSWORD_BCRYPT, ['cost' => 11]);
        $last_record = self::$db->query("SELECT * FROM users WHERE cbbr_id='".$user['cbbr_id']."' ORDER BY CAST(u_seq AS DECIMAL) DESC LIMIT 1")->result();
        $seq = count($last_record) > 0 ? (floatval($last_record[0]->u_seq) + 1).'' : '1';
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
        return self::$db->from('coa_lvl_1 coa1')->join('co_coa_lvl1 cocoa1', 'coa1.lvl_1_id=cocoa1.lvl_1_id')->where('cocoa1.cb_id', $cb_id)->where('coa1.flag', '1')->get()->result();
    }

    public static function add_coa_lvl1($data, $user){
        $last_record = self::$db->query("SELECT * FROM coa_lvl_1 coa1 JOIN co_coa_lvl1 cocoa1 ON cocoa1.lvl_1_id=coa1.lvl_1_id WHERE cocoa1.cb_id='".$user->cb_id."' ORDER BY CAST(coa1.lvl_1_code AS DECIMAL) DESC LIMIT 1")->result();
        $seq = count($last_record) > 0 ? (floatval($last_record[0]->lvl_1_seq) + 1).'' : '1';
        $code = count($last_record) > 0 ? (floatval($last_record[0]->lvl_1_code) + 1).'' : '0';
        $data['lvl_1_code'] = $code;
        $data['lvl_1_seq'] = $seq;
        self::$db->insert('coa_lvl_1', $data);
        $lvl_1_id = self::$db->insert_id();
        self::$db->insert('co_coa_lvl1', ['cb_id' => $user->cb_id, 'lvl_1_id' => $lvl_1_id]);
    }

    public static function edit_coa_lvl1($data, $id, $user){
        self::$db->query("UPDATE coa_lvl_1 coa1 SET coa1.lvl_1_code='' WHERE coa1.lvl_1_id IN (SELECT lvl_1_id FROM (SELECT coa1.lvl_1_id FROM coa_lvl_1 coa1 JOIN co_coa_lvl1 cocoa1 ON coa1.lvl_1_id=cocoa1.lvl_1_id WHERE cocoa1.cb_id='".$user->cb_id."' AND coa1.lvl_1_code='".$data['lvl_1_code']."') t) AND coa1.flag='1'");
        self::$db->where('lvl_1_id', $id)->update('coa_lvl_1', $data);
    }

    public static function delete_coa_lvl1($id){
        self::$db->where('lvl_1_id', $id)->update('coa_lvl_1', ['flag' => '0']);
    }

    public static function get_coa_lvl2($lvl_1_id, $cb_id){
        return self::$db->from('coa_lvl_2 coa2')->join('coalvl_1_2 coa12', 'coa2.lvl_2_id=coa12.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa12.lvl_1_id')->where(['cocoa1.cb_id' => $cb_id, 'cocoa1.lvl_1_id' => $lvl_1_id, 'coa2.flag' => '1'])->get()->result();
    }

    public static function get_level_1($user){
        return self::$db->from('coa_lvl_1 coa1')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa1.lvl_1_id')->where(['cocoa1.cb_id' => $user->cb_id, 'coa1.flag' => '1'])->get()->result();
    }

    public static function add_coa_lvl2($data, $lvl_1_id, $user){
        $last_record = self::$db->query("SELECT * FROM coa_lvl_2 coa2 JOIN coalvl_1_2 coa12 ON coa12.lvl_2_id=coa2.lvl_2_id JOIN coa_lvl_1 coa1 ON coa1.lvl_1_id=coa12.lvl_1_id JOIN co_coa_lvl1 cocoa1 ON cocoa1.lvl_1_id=coa1.lvl_1_id WHERE cocoa1.cb_id='".$user->cb_id."' AND coa1.lvl_1_id='".$lvl_1_id."' ORDER BY CAST(coa2.lvl_2_code AS DECIMAL) DESC LIMIT 1")->result();
        $seq = count($last_record) > 0 ? (floatval($last_record[0]->lvl_2_seq) + 1).'' : '1';
        $code = count($last_record) > 0 ? (floatval($last_record[0]->lvl_2_code) + 1).'' : '0';
        $data['lvl_2_code'] = $code;
        $data['lvl_2_seq'] = $seq;
        self::$db->insert('coa_lvl_2', $data);
        $lvl_2_id = self::$db->insert_id();
        self::$db->insert('coalvl_1_2', ['lvl_1_id' => $lvl_1_id, 'lvl_2_id' => $lvl_2_id]);
    }

    public static function edit_coa_lvl2($data, $lvl_1_id, $id, $user){
        self::$db->query("UPDATE coa_lvl_2 coa2 SET coa2.lvl_2_code='' WHERE coa2.lvl_2_id IN (SELECT lvl_2_id FROM (SELECT coa2.lvl_2_id FROM coa_lvl_2 coa2 JOIN coalvl_1_2 coa12 ON coa2.lvl_2_id=coa12.lvl_2_id JOIN coa_lvl_1 coa1 ON coa1.lvl_1_id=coa12.lvl_1_id JOIN co_coa_lvl1 cocoa1 ON coa1.lvl_1_id=cocoa1.lvl_1_id WHERE cocoa1.cb_id='".$user->cb_id."' AND coa2.lvl_2_code='".$data['lvl_2_code']."' AND coa1.lvl_1_id='".$lvl_1_id."') t) AND coa2.flag='1'");
        self::$db->where('lvl_2_id', $id)->update('coa_lvl_2', $data);
    }

    public static function delete_coa_lvl2($id){
        self::$db->where('lvl_2_id', $id)->update('coa_lvl_2', ['flag' => '0']);
    }

    public static function get_level_2($user){
        return self::$db->from('coa_lvl_2 coa2')->join('coalvl_1_2 coa12', 'coa12.lvl_2_id=coa2.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa1.lvl_1_id')->where(['cocoa1.cb_id' => $user->cb_id, 'coa2.flag' => '1'])->get()->result();
    }

    public static function add_coa_lvl3($data, $lvl_2_id, $user){
        $last_record = self::$db->query("SELECT * FROM coa_lvl_3 coa3 JOIN coalvl_2_3 coa23 ON coa23.lvl_3_id=coa3.lvl_3_id JOIN coa_lvl_2 coa2 ON coa2.lvl_2_id=coa23.lvl_2_id JOIN coalvl_1_2 coa12 ON coa12.lvl_2_id=coa2.lvl_2_id JOIN coa_lvl_1 coa1 ON coa1.lvl_1_id=coa12.lvl_1_id JOIN co_coa_lvl1 cocoa1 ON cocoa1.lvl_1_id=coa1.lvl_1_id WHERE cocoa1.cb_id='".$user->cb_id."' AND coa2.lvl_2_id='".$lvl_2_id."' ORDER BY CAST(coa3.lvl_3_code_int AS DECIMAL) DESC LIMIT 1")->result();
        $seq = count($last_record) > 0 ? (floatval($last_record[0]->lvl_3_seq) + 1).'' : '1';
        $code_int = count($last_record) > 0 ? (floatval($last_record[0]->lvl_3_code_int) + 1).'' : '0';
        $code = strlen($code_int) === 1 ? '0'.$code_int : $code_int;
        $data['lvl_3_code_int'] = $code_int;
        $data['lvl_3_code'] = $code;
        $data['lvl_3_seq'] = $seq;
        self::$db->insert('coa_lvl_3', $data);
        $lvl_3_id = self::$db->insert_id();
        self::$db->insert('coalvl_2_3', ['lvl_2_id' => $lvl_2_id, 'lvl_3_id' => $lvl_3_id]);
    }

    public static function edit_coa_lvl3($data, $lvl_2_id, $id, $user){
        self::$db->query("UPDATE coa_lvl_3 coa3 SET coa3.lvl_3_code='', coa3.lvl_3_code_int='' WHERE coa3.lvl_3_id IN (SELECT lvl_3_id FROM (SELECT coa3.lvl_3_id FROM coa_lvl_3 coa3 JOIN coalvl_2_3 coa23 ON coa23.lvl_3_id=coa3.lvl_3_id JOIN coa_lvl_2 coa2 ON coa2.lvl_2_id=coa23.lvl_2_id JOIN coalvl_1_2 coa12 ON coa2.lvl_2_id=coa12.lvl_2_id JOIN coa_lvl_1 coa1 ON coa1.lvl_1_id=coa12.lvl_1_id JOIN co_coa_lvl1 cocoa1 ON coa1.lvl_1_id=cocoa1.lvl_1_id WHERE cocoa1.cb_id='".$user->cb_id."' AND coa3.lvl_3_code='".$data['lvl_3_code']."' AND coa2.lvl_2_id='".$lvl_2_id."') t) AND coa3.flag='1'");

        self::$db->where('lvl_3_id', $id)->update('coa_lvl_3', $data);
    }

    public static function delete_coa_lvl3($id){
        self::$db->where('lvl_3_id', $id)->update('coa_lvl_3', ['flag' => '0']);
    }

    public static function get_level_3($user){
        return self::$db->from('coa_lvl_3 coa3')->join('coalvl_2_3 coa23', 'coa23.lvl_3_id=coa3.lvl_3_id')->join('coa_lvl_2 coa2', 'coa2.lvl_2_id=coa23.lvl_2_id')->join('coalvl_1_2 coa12', 'coa12.lvl_2_id=coa2.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa1.lvl_1_id')->where(['cocoa1.cb_id' => $user->cb_id, 'coa3.flag' => '1'])->get()->result();
    }

    public static function add_level_4($data, $lvl_3_id, $user){
        $last_record = self::$db->query("SELECT * FROM coa_lvl_4 coa4 JOIN coalvl_3_4 coa34 ON coa34.lvl_4_id=coa4.lvl_4_id JOIN coa_lvl_3 coa3 ON coa3.lvl_3_id=coa34.lvl_3_id JOIN coalvl_2_3 coa23 ON coa23.lvl_3_id=coa3.lvl_3_id JOIN coa_lvl_2 coa2 ON coa2.lvl_2_id=coa23.lvl_2_id JOIN coalvl_1_2 coa12 ON coa12.lvl_2_id=coa2.lvl_2_id JOIN coa_lvl_1 coa1 ON coa1.lvl_1_id=coa12.lvl_1_id JOIN co_coa_lvl1 cocoa1 ON cocoa1.lvl_1_id=coa1.lvl_1_id WHERE cocoa1.cb_id='".$user->cb_id."' AND coa3.lvl_3_id='".$lvl_3_id."' ORDER BY CAST(coa4.lvl_4_code AS DECIMAL) DESC LIMIT 1")->result();
        $seq = count($last_record) > 0 ? (floatval($last_record[0]->lvl_4_seq) + 1).'' : '1';
        $code = count($last_record) > 0 ? (floatval($last_record[0]->lvl_4_code) + 1).'' : '0';
        $data['lvl_4_code'] = $code;
        $data['lvl_4_seq'] = $seq;
        self::$db->insert('coa_lvl_4', $data);
        $lvl_4_id = self::$db->insert_id();
        self::$db->insert('coalvl_3_4', ['lvl_3_id' => $lvl_3_id, 'lvl_4_id' => $lvl_4_id]);
    }

    public static function edit_level_4($data, $lvl_3_id, $id, $user){
        self::$db->query("UPDATE coa_lvl_4 coa4 SET coa4.lvl_4_code='' WHERE coa4.lvl_4_id IN (SELECT lvl_4_id FROM (SELECT coa4.lvl_4_id FROM coa_lvl_4 coa4 JOIN coalvl_3_4 coa34 ON coa34.lvl_4_id=coa4.lvl_4_id JOIN coa_lvl_3 coa3 ON coa3.lvl_3_id=coa34.lvl_3_id JOIN coalvl_2_3 coa23 ON coa23.lvl_3_id=coa3.lvl_3_id JOIN coa_lvl_2 coa2 ON coa2.lvl_2_id=coa23.lvl_2_id JOIN coalvl_1_2 coa12 ON coa2.lvl_2_id=coa12.lvl_2_id JOIN coa_lvl_1 coa1 ON coa1.lvl_1_id=coa12.lvl_1_id JOIN co_coa_lvl1 cocoa1 ON coa1.lvl_1_id=cocoa1.lvl_1_id WHERE cocoa1.cb_id='".$user->cb_id."' AND coa4.lvl_4_code='".$data['lvl_4_code']."' AND coa3.lvl_3_id='".$lvl_3_id."') t) AND coa4.flag='1'");

        self::$db->where('lvl_4_id', $id)->update('coa_lvl_4', $data);
    }

    public static function delete_level_4($id){
        self::$db->where('lvl_4_id', $id)->update('coa_lvl_4', ['flag' => '0']);
    }

    public static function get_level_4($user){
        return self::$db->from('coa_lvl_4 coa4')->join('coalvl_3_4 coa34', 'coa34.lvl_4_id=coa4.lvl_4_id')->join('coa_lvl_3 coa3', 'coa3.lvl_3_id=coa34.lvl_3_id')->join('coalvl_2_3 coa23', 'coa23.lvl_3_id=coa3.lvl_3_id')->join('coa_lvl_2 coa2', 'coa2.lvl_2_id=coa23.lvl_2_id')->join('coalvl_1_2 coa12', 'coa12.lvl_2_id=coa2.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa1.lvl_1_id')->where(['cocoa1.cb_id' => $user->cb_id, 'coa3.flag' => '1'])->get()->result();
    }

    public static function add_level_5($data, $lvl_4_id, $user){
        $last_record = self::$db->query("SELECT * FROM coa_lvl_5 coa5 JOIN coalvl_4_5 coa45 ON coa45.lvl_5_id=coa5.lvl_5_id JOIN coa_lvl_4 coa4 ON coa4.lvl_4_id=coa45.lvl_4_id JOIN coalvl_3_4 coa34 ON coa34.lvl_4_id=coa4.lvl_4_id JOIN coa_lvl_3 coa3 ON coa3.lvl_3_id=coa34.lvl_3_id JOIN coalvl_2_3 coa23 ON coa23.lvl_3_id=coa3.lvl_3_id JOIN coa_lvl_2 coa2 ON coa2.lvl_2_id=coa23.lvl_2_id JOIN coalvl_1_2 coa12 ON coa12.lvl_2_id=coa2.lvl_2_id JOIN coa_lvl_1 coa1 ON coa1.lvl_1_id=coa12.lvl_1_id JOIN co_coa_lvl1 cocoa1 ON cocoa1.lvl_1_id=coa1.lvl_1_id WHERE cocoa1.cb_id='".$user->cb_id."' AND coa4.lvl_4_id='".$lvl_4_id."' ORDER BY CAST(coa5.lvl_5_code AS DECIMAL) DESC LIMIT 1")->result();
        $seq = count($last_record) > 0 ? (floatval($last_record[0]->lvl_5_seq) + 1).'' : '1';
        $code = count($last_record) > 0 ? (floatval($last_record[0]->lvl_5_code) + 1).'' : '0';
        $data['lvl_5_code'] = $code;
        $data['lvl_5_seq'] = $seq;
        self::$db->insert('coa_lvl_5', $data);
        $lvl_5_id = self::$db->insert_id();
        self::$db->insert('coalvl_4_5', ['lvl_4_id' => $lvl_4_id, 'lvl_5_id' => $lvl_5_id]);
    }

    public static function edit_level_5($data, $lvl_4_id, $id, $user){
        self::$db->query("UPDATE coa_lvl_5 coa5 SET coa5.lvl_5_code='' WHERE coa5.lvl_5_id IN (SELECT lvl_5_id FROM (SELECT coa5.lvl_5_id FROM coa_lvl_5 coa5 JOIN coalvl_4_5 coa45 ON coa45.lvl_5_id=coa5.lvl_5_id JOIN coa_lvl_4 coa4 ON coa4.lvl_4_id=coa45.lvl_4_id JOIN coalvl_3_4 coa34 ON coa34.lvl_4_id=coa4.lvl_4_id JOIN coa_lvl_3 coa3 ON coa3.lvl_3_id=coa34.lvl_3_id JOIN coalvl_2_3 coa23 ON coa23.lvl_3_id=coa3.lvl_3_id JOIN coa_lvl_2 coa2 ON coa2.lvl_2_id=coa23.lvl_2_id JOIN coalvl_1_2 coa12 ON coa2.lvl_2_id=coa12.lvl_2_id JOIN coa_lvl_1 coa1 ON coa1.lvl_1_id=coa12.lvl_1_id JOIN co_coa_lvl1 cocoa1 ON coa1.lvl_1_id=cocoa1.lvl_1_id WHERE cocoa1.cb_id='".$user->cb_id."' AND coa5.lvl_5_code='".$data['lvl_5_code']."' AND coa4.lvl_4_id='".$lvl_4_id."') t) AND coa5.flag='1'");

        self::$db->where('lvl_5_id', $id)->update('coa_lvl_5', $data);
    }

    public static function delete_level_5($id){
        self::$db->where('lvl_5_id', $id)->update('coa_lvl_5', ['flag' => '0']);
    }

    public static function get_coa_lvl3($lvl_2_id, $cb_id){
        return self::$db->from('coa_lvl_3 coa3')->join('coalvl_2_3 coa23', 'coa23.lvl_3_id=coa3.lvl_3_id')->join('coa_lvl_2 coa2', 'coa2.lvl_2_id=coa23.lvl_2_id')->join('coalvl_1_2 coa12', 'coa2.lvl_2_id=coa12.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa12.lvl_1_id')->where(['cocoa1.cb_id' => $cb_id, 'coa2.lvl_2_id' => $lvl_2_id, 'coa3.flag' => '1'])->get()->result();
    }

    public static function get_coa_lvl4($lvl_3_id, $cb_id){
        return self::$db->from('coa_lvl_4 coa4')->join('coalvl_3_4 coa34', 'coa4.lvl_4_id=coa34.lvl_4_id')->join('coa_lvl_3 coa3', 'coa3.lvl_3_id=coa34.lvl_3_id')->join('coalvl_2_3 coa23', 'coa23.lvl_3_id=coa3.lvl_3_id')->join('coa_lvl_2 coa2', 'coa2.lvl_2_id=coa23.lvl_2_id')->join('coalvl_1_2 coa12', 'coa2.lvl_2_id=coa12.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa12.lvl_1_id')->where(['cocoa1.cb_id' => $cb_id, 'coa3.lvl_3_id' => $lvl_3_id, 'coa4.flag' => '1'])->get()->result();
    }

    public static function get_coa_lvl5($lvl_4_id, $cb_id){
        return self::$db->from('coa_lvl_5 coa5')->join('coalvl_4_5 coa45', 'coa45.lvl_5_id=coa5.lvl_5_id')->join('coa_lvl_4 coa4', 'coa4.lvl_4_id=coa45.lvl_4_id')->join('coalvl_3_4 coa34', 'coa4.lvl_4_id=coa34.lvl_4_id')->join('coa_lvl_3 coa3', 'coa3.lvl_3_id=coa34.lvl_3_id')->join('coalvl_2_3 coa23', 'coa23.lvl_3_id=coa3.lvl_3_id')->join('coa_lvl_2 coa2', 'coa2.lvl_2_id=coa23.lvl_2_id')->join('coalvl_1_2 coa12', 'coa2.lvl_2_id=coa12.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa12.lvl_1_id')->where(['cocoa1.cb_id' => $cb_id, 'coa4.lvl_4_id' => $lvl_4_id, 'coa5.flag' => '1'])->get()->result();
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

    // public static function get_coa_lvl6($cb_id){
    //     // return self::$db->from('coa_lvl_6 coa6')->join('coalvl_5_6 coa56', 'coa6.lvl_6_id=coa56.lvl_6_id')->join('coa_lvl_5 coa5', 'coa5.lvl_5_id=coa56.lvl_5_id')->join('coalvl_4_5 coa45', 'coa45.lvl_5_id=coa5.lvl_5_id')->join('coa_lvl_4 coa4', 'coa4.lvl_4_id=coa45.lvl_4_id')->join('coalvl_3_4 coa34', 'coa4.lvl_4_id=coa34.lvl_4_id')->join('coa_lvl_3 coa3', 'coa3.lvl_3_id=coa34.lvl_3_id')->join('coalvl_2_3 coa23', 'coa23.lvl_3_id=coa3.lvl_3_id')->join('coa_lvl_2 coa2', 'coa2.lvl_2_id=coa23.lvl_2_id')->join('coalvl_1_2 coa12', 'coa2.lvl_2_id=coa12.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa12.lvl_1_id')->where('cocoa1.cb_id', $cb_id)->get()->result();
    //     return '';
    // }

    // public static function add_coa_lvl6($data){
    //     $last_record = self::$db->query("SELECT * FROM coa_lvl_6 coa6 JOIN coalvl_5_6 coa56 ON coa6.lvl_6_id=coa56.lvl_6_id JOIN coa_lvl_5 coa5 ON coa5.lvl_5_id=coa56.lvl_5_id JOIN coalvl_4_5 coa45 ON coa45.lvl_5_id=coa5.lvl_5_id JOIN coa_lvl_4 coa4 ON coa4.lvl_4_id=coa45.lvl_4_id JOIN coalvl_3_4 coa34 ON coa4.lvl_4_id=coa34.lvl_4_id JOIN coa_lvl_3 coa3 ON coa3.lvl_3_id=coa34.lvl_3_id JOIN coalvl_2_3 coa23 ON coa23.lvl_3_id=coa3.lvl_3_id JOIN coa_lvl_2 coa2 ON coa2.lvl_2_id=coa23.lvl_2_id JOIN coalvl_1_2 coa12 ON coa2.lvl_2_id=coa12.lvl_2_id JOIN coa_lvl_1 coa1 ON coa1.lvl_1_id=coa12.lvl_1_id JOIN co_coa_lvl1 cocoa1 ON cocoa1.lvl_1_id=coa12.lvl_1_id WHERE cocoa1.cb_id='".$data['cb_id']."' AND coa5.lvl_5_id='".$data['lvl_5_id']."' ORDER BY CAST(coa6.lvl_6_code AS DECIMAL) DESC LIMIT 1")->result();

    //     $code = count($last_record) > 0 ? (floatval($last_record[0]->lvl_6_code) + 1).'' : '0';
    //     self::$db->insert('coa_lvl_6', ['lvl_6_code' => $code, 'lvl_6_name' => $data['lvl_6_name'], 'lvl_6_company' => $data['lvl_6_company'], 'lvl_6_setup_company' => $data['lvl_6_setup_company']]);
    //     $lvl_6_id = self::$db->insert_id();
    //     self::$db->insert('coalvl_5_6', ['lvl_5_id' => $data['lvl_5_id'], 'lvl_6_id' => $lvl_6_id]);
        
    // }

    // public static function edit_coa_lvl6($data){
    //     self::$db->where('lvl_6_id', $data['lvl_6_id'])->update('coa_lvl_6', ['lvl_6_code' => $data['lvl_6_code'], 'lvl_6_name' => $data['lvl_6_name']]);
    //     self::$db->where('lvl_6_id', $data['lvl_6_id'])->update('coalvl_5_6', ['lvl_5_id' => $data['lvl_5_id']]);
    // }

    // public static function delete_coa_lvl6($data){
    //     self::$db->where('lvl_6_id', $data['lvl_6_id'])->delete('coa_lvl_6');
    //     self::$db->where('coalvl56_id', $data['coalvl56_id'])->delete('coalvl_5_6');
    // }

    // public static function get_level_4($cb_id){
    //     return self::$db->from('coa_lvl_4 coa4')->join('coalvl_3_4 coa34', 'coa4.lvl_4_id=coa34.lvl_4_id')->join('coa_lvl_3 coa3', 'coa3.lvl_3_id=coa34.lvl_3_id')->join('coalvl_2_3 coa23', 'coa23.lvl_3_id=coa3.lvl_3_id')->join('coa_lvl_2 coa2', 'coa2.lvl_2_id=coa23.lvl_2_id')->join('coalvl_1_2 coa12', 'coa2.lvl_2_id=coa12.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa12.lvl_1_id')->where('cocoa1.cb_id', $cb_id)->get()->result();
    // }

    // public static function get_level_5($cb_id){
    //     return self::$db->from('coa_lvl_5 coa5')->join('coalvl_4_5 coa45', 'coa45.lvl_5_id=coa5.lvl_5_id')->join('coa_lvl_4 coa4', 'coa4.lvl_4_id=coa45.lvl_4_id')->join('coalvl_3_4 coa34', 'coa4.lvl_4_id=coa34.lvl_4_id')->join('coa_lvl_3 coa3', 'coa3.lvl_3_id=coa34.lvl_3_id')->join('coalvl_2_3 coa23', 'coa23.lvl_3_id=coa3.lvl_3_id')->join('coa_lvl_2 coa2', 'coa2.lvl_2_id=coa23.lvl_2_id')->join('coalvl_1_2 coa12', 'coa2.lvl_2_id=coa12.lvl_2_id')->join('coa_lvl_1 coa1', 'coa1.lvl_1_id=coa12.lvl_1_id')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id=coa12.lvl_1_id')->where('cocoa1.cb_id', $cb_id)->get()->result();
    // }

    public static function get_tax($tt_id, $user){
        return self::$db->from('taxes t')->join('co_taxes ct', 'ct.t_id=t.t_id')->join('tax_types tt', 'tt.tt_id=t.tt_id')->where(['t.flag' => '1', 'ct.cb_id' => $user->cb_id, 'tt.tt_id' => $tt_id])->get()->result();
    }

    public static function add_tax($data){
        $last_record = self::$db->query("SELECT * FROM taxes t JOIN co_taxes cot ON t.t_id=cot.t_id WHERE cot.cb_id='".$data['cb_id']."' AND t.tt_id='".$data['tt_id']."' ORDER BY CAST(t.t_seq AS DECIMAL) DESC LIMIT 1")->result();
        $seq = count($last_record) > 0 ? (floatval($last_record[0]->t_seq) + 1).'' : '1';
        $tt_code = self::$db->get_where('tax_types', ['tt_id' => $data['tt_id']])->result()[0]->tt_code;
        $t_code = $tt_code.''.$seq;
        self::$db->insert('taxes', ['t_seq' => $seq, 't_code' => $t_code, 't_name' => $data['t_name'], 't_shortname' => $data['t_shortname'], 't_rate' => $data['t_rate'], 't_base' => $data['t_base'], 'tt_id' => $data['tt_id'], 't_company' => $data['t_company'], 't_setup_company' => $data['t_setup_company']]);
        $t_id = self::$db->insert_id();
        self::$db->insert('co_taxes', ['t_id' => $t_id, 'cb_id' => $data['cb_id']]);
    }

    public static function edit_tax($data, $user){
        self::$db->query("UPDATE taxes t SET t.t_code='' WHERE t.t_id IN (SELECT t_id FROM (SELECT t.t_id FROM taxes t JOIN co_taxes cot ON cot.t_id=t.t_id JOIN tax_types tt ON tt.tt_id=t.tt_id WHERE tt.tt_id='".$data['tt_id']."' AND t.t_code='".$data['t_code']."' AND cot.cb_id='".$user->cb_id."') t) AND t.flag='1'");
        self::$db->where('t_id', $data['t_id'])->update('taxes', ['t_code' => $data['t_code'], 't_name' => $data['t_name'], 't_shortname' => $data['t_shortname'], 't_rate' => $data['t_rate'], 't_base' => $data['t_base'], 'tt_id' => $data['tt_id'], 't_company' => $data['t_company'], 't_setup_company' => $data['t_setup_company']]);
    }

    public static function delete_tax($data){
        self::$db->where('t_id', $data['t_id'])->update('taxes', ['flag' => '0']);
    }   

    public static function get_tax_types_list($user){
        return self::$db->from('tax_types tt')->join('co_tax_types cott', 'cott.tt_id=tt.tt_id')->where(['tt.tt_company' => 'company', 'cott.cb_id' => $user->cb_id])->get()->result();
    }

    public static function get_tax_types($user){
        return self::$db->from('co_tax_types cott')->join('tax_types tt', 'tt.tt_id=cott.tt_id')->where(['tt.flag' => '1', 'tt.tt_company' => 'company', 'cott.cb_id' => $user->cb_id])->get()->result();
    }

    public static function add_tax_types($data, $user){
        $last_record = self::$db->query("SELECT * FROM tax_types tt JOIN co_tax_types cott ON cott.tt_id=tt.tt_id WHERE cott.cb_id='".$user->cb_id."' AND tt.tt_company='company' ORDER BY CAST(tt.tt_code AS DECIMAL) DESC LIMIT 1")->result();
        $seq = count($last_record) > 0 ? (floatval($last_record[0]->tt_seq) + 1).'' : '1';
        $code = count($last_record) > 0 ? (floatval($last_record[0]->tt_code) + 1).'' : '0';
        $data['tt_code'] = $code;
        $data['tt_seq'] = $seq;
        self::$db->insert('tax_types', $data);
        $tt_id = self::$db->insert_id();
        self::$db->insert('co_tax_types', ['tt_id' => $tt_id, 'cb_id' => $user->cb_id]);
    }

    public static function edit_tax_types($data, $id, $user){
        self::$db->query("UPDATE tax_types tt SET tt.tt_code='' WHERE tt.tt_id IN (SELECT tt_id FROM (SELECT tt.tt_id FROM tax_types tt JOIN co_tax_types cott ON cott.tt_id=tt.tt_id WHERE cott.cb_id='".$user->cb_id."' AND tt.flag='1' AND tt.tt_company='company' AND tt.tt_code='".$data['tt_code']."') t) AND tt.flag='1'");

        self::$db->where('tt_id', $id)->update('tax_types', $data);
    }

    public static function delete_tax_types($id){
        self::$db->where('tt_id', $id)->update('tax_types', ['flag' => '0']);
    }
}