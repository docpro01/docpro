<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe_model extends CI_Model {
    private static $db;

    public function __construct(){
        parent::__construct();
        self::$db =& get_instance()->db;
    }

    public static function save($company, $profile, $user, $registrant){
    	  $password = password_hash($user['u_pass'], PASSWORD_BCRYPT, ['cost' => 11]);

// Company
        $last_record = self::$db->query("SELECT * FROM company_branches ORDER BY CAST(cb_seq AS DECIMAL) DESC LIMIT 1")->result()[0];
        $last_seq = count($last_record) > 0 ? (floatval($last_record->cb_seq) + 1).'' : '0';
        $zeros = '';
        for($i = 0; $i < (6 - floatval(strlen($last_seq))); $i++){
          $zeros .= '0';
        }
        $seq = $zeros.''.$last_seq;
        $company['cb_seq'] = $seq;
        self::$db->insert('company_branches', $company);
        $cb_id = self::$db->insert_id();

// Company History
        $company_history = [
                                'ch_cb_id'          => $cb_id,
                                'ch_cb_name'        => $company['cb_name'],
                                'ch_cb_ind_name'    => $company['cb_ind_name'],
                                'ch_name'           => $company['name'],
                                'ch_cb_address'     => $company['cb_address'],
                                'ch_cb_bp_type'     => $company['cb_bp_type'],
                                'ch_cb_cno'         => $company['cb_cno'],
                                'ch_cb_email'       => $company['cb_email'],
                                'ch_cb_seq'         => $company['cb_seq']
                            ];
        self::$db->insert('company_history', $company_history);

//CBBR
        self::$db->insert('cb_br', ['cb_id' => $cb_id, 'br_id' => $cb_id]);
        $cbbr_id = self::$db->insert_id();

// Profile
        $profile['cb_id'] = $cb_id;
       	self::$db->insert('profiles', $profile);
       	$p_id = self::$db->insert_id();

// User
        $user['p_id'] = $p_id;
        $user['u_pass'] = $password;
        $user['cbbr_id'] = $cbbr_id;
        $user['u_seq'] = '0';
       	self::$db->insert('users', $user);

// Registrant
        $registrant['cb_id'] = $cb_id;
        self::$db->insert('co_registrant', $registrant);

// COA
        $coa_lvl_1 = self::$db->from('coa_lvl_1')->where(['lvl_1_company' => 'docpro', 'flag' => '1'])->order_by('lvl_1_id', 'asc')->get()->result();
        // $coa_lvl_2 = self::$db->get_where('coa_lvl_2', ['lvl_2_company' => 'docpro', 'flag' => '1'])->result();
        // $coa_lvl_3 = self::$db->get_where('coa_lvl_3', ['lvl_3_company' => 'docpro', 'flag' => '1'])->result();
        // $coa_lvl_4 = self::$db->get_where('coa_lvl_4', ['lvl_4_company' => 'docpro', 'flag' => '1'])->result();

        foreach ($coa_lvl_1 as $key => $lvl1) {
            $lvl_1_data = [
                'lvl_1_code' => $lvl1->lvl_1_code,
                'lvl_1_name' => $lvl1->lvl_1_name,
                'lvl_1_company' => 'company',
                'lvl_1_setup_company' => 'docpro',
            ];
            self::$db->insert('coa_lvl_1', $lvl_1_data);
            $lvl_1_id = self::$db->insert_id();
            self::$db->insert('co_coa_lvl1', ['cb_id' => $cb_id, 'lvl_1_id' => $lvl_1_id]);

            $coalvl_1_2 = self::$db->from('coa_lvl_2 coa2')->join('coalvl_1_2 coa12', 'coa2.lvl_2_id=coa12.lvl_2_id')->where('coa12.lvl_1_id', $lvl1->lvl_1_id)->order_by('coa2.lvl_2_id', 'asc')->get()->result();

            foreach ($coalvl_1_2 as $key => $lvl2) {
                $coa_2_data = [
                    'lvl_2_code' => $lvl2->lvl_2_code,
                    'lvl_2_name' => $lvl2->lvl_2_name,
                    'lvl_2_company' => 'company',
                    'lvl_2_setup_company' => 'docpro',
                ];
                self::$db->insert('coa_lvl_2', $coa_2_data);
                $lvl_2_id = self::$db->insert_id();
                self::$db->insert('coalvl_1_2', ['lvl_1_id' => $lvl_1_id, 'lvl_2_id' => $lvl_2_id]);

                $coalvl_2_3 = self::$db->from('coa_lvl_3 coa3')->join('coalvl_2_3 coa23', 'coa3.lvl_3_id=coa23.lvl_3_id')->where('coa23.lvl_2_id', $lvl2->lvl_2_id)->order_by('coa3.lvl_3_id', 'asc')->get()->result();

                foreach ($coalvl_2_3 as $key => $lvl3) {
                    $coa_3_data = [
                        'lvl_3_code' => $lvl3->lvl_3_code,
                        'lvl_3_code_int' => $lvl3->lvl_3_code_int,
                        'lvl_3_bir' => $lvl3->lvl_3_bir,
                        'lvl_3_name' => $lvl3->lvl_3_name,
                        'lvl_3_company' => 'company',
                        'lvl_3_setup_company' => 'docpro',
                    ];
                    self::$db->insert('coa_lvl_3', $coa_3_data);
                    $lvl_3_id = self::$db->insert_id();
                    self::$db->insert('coalvl_2_3', ['lvl_2_id' => $lvl_2_id, 'lvl_3_id' => $lvl_3_id]);

                    $coalvl_3_4 = self::$db->from('coa_lvl_4 coa4')->join('coalvl_3_4 coa34', 'coa4.lvl_4_id=coa34.lvl_4_id')->where('coa34.lvl_3_id', $lvl3->lvl_3_id)->order_by('coa4.lvl_4_id', 'asc')->get()->result();

                    foreach ($coalvl_3_4 as $key => $lvl4) {
                        $coa_4_data = [
                            'lvl_4_code' => $lvl4->lvl_4_code,
                            'lvl_4_name' => $lvl4->lvl_4_name,
                            'lvl_4_company' => 'company',
                            'lvl_4_setup_company' => 'docpro',
                        ];
                        self::$db->insert('coa_lvl_4', $coa_4_data);
                        $lvl_4_id = self::$db->insert_id();
                        self::$db->insert('coalvl_3_4', ['lvl_3_id' => $lvl_3_id, 'lvl_4_id' => $lvl_4_id]);

                        $coalvl_4_5 = self::$db->from('coa_lvl_5 coa5')->join('coalvl_4_5 coa45', 'coa5.lvl_5_id=coa45.lvl_5_id')->where('coa45.lvl_4_id', $lvl4->lvl_4_id)->order_by('coa5.lvl_5_id', 'asc')->get()->result();

                        foreach ($coalvl_4_5 as $key => $lvl5) {
                            $coa_5_data = [
                                'lvl_5_code' => $lvl5->lvl_5_code,
                                'lvl_5_name' => $lvl5->lvl_5_name,
                                'lvl_5_company' => 'company',
                                'lvl_5_setup_company' => 'docpro',
                            ];
                            self::$db->insert('coa_lvl_5', $coa_5_data);
                            $lvl_5_id = self::$db->insert_id();
                            self::$db->insert('coalvl_4_5', ['lvl_4_id' => $lvl_4_id, 'lvl_5_id' => $lvl_5_id]);

                            $coalvl_5_6 = self::$db->from('coa_lvl_6 coa6')->join('coalvl_5_6 coa56', 'coa6.lvl_6_id=coa56.lvl_6_id')->where('coa56.lvl_5_id', $lvl5->lvl_5_id)->order_by('coa6.lvl_6_id', 'asc')->get()->result();

                            foreach ($coalvl_5_6 as $key => $lvl6) {
                                $coa_6_data = [
                                    'lvl_6_code' => $lvl6->lvl_6_code,
                                    'lvl_6_name' => $lvl6->lvl_6_name,
                                    'lvl_6_company' => 'company',
                                    'lvl_6_setup_company' => 'docpro',
                                ];
                                self::$db->insert('coa_lvl_6', $coa_6_data);
                                $lvl_6_id = self::$db->insert_id();
                                self::$db->insert('coalvl_5_6', ['lvl_5_id' => $lvl_5_id, 'lvl_6_id' => $lvl_6_id]);
                            }
                        }
                    }
                }

            }
        }

// TAXES
        $taxes = self::$db->get_where('taxes', ['t_company' => 'docpro', 'flag' => '1'])->result();
        foreach ($taxes as $key => $tax) {
            $tax = [
                    't_seq' => $tax->t_seq,
                    't_code' => $tax->t_code,
                    't_name' => $tax->t_name,
                    't_shortname' => $tax->t_shortname,
                    't_rate' => $tax->t_rate,
                    't_base' => $tax->t_base,
                    'tt_id' => $tax->tt_id,
                    't_company' => 'company',
                    't_setup_company' => 'docpro'
                ];

            self::$db->insert('taxes', $tax);
            $t_id = self::$db->insert_id();
            self::$db->insert('co_taxes', ['t_id' => $t_id, 'cb_id' => $cb_id]);
        }
    }

}

