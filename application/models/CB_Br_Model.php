<?php
class CB_Br_Model extends CI_Model{
    private static $db;

    function __construct() {
        parent::__construct();
        self::$db = get_instance()->db;
    }

    public static function get($cb_id){
        return self::$db->from('cb_br cbbr')->join('company_history ch', 'cbbr.br_id = ch.ch_cb_id')->where('cbbr.cb_id', $cb_id)->where('cbbr.br_id !=', $cb_id)->where('ch.flag', '1')->get()->result();
    }

    public static function add($cb_id, $data){
        self::$db->insert('company_branches', $data);
        $br_id = self::$db->insert_id();
        self::$db->insert('company_history', ['ch_cb_id' => $br_id, 'ch_cb_name' => $data['cb_name'], 'ch_name' => $data['cb_name'], 'ch_cb_address' => $data['cb_address'], 'ch_cb_tin' => $data['cb_tin'], 'ch_cb_class' => $data['cb_class'], 'ch_cb_bp_type' => $data['cb_bp_type'], 'ch_cb_tax_type' => $data['cb_tax_type'], 'ch_cb_seq' => $data['cb_seq'], 'ch_cb_cno' => $data['cb_cno'], 'ch_cb_email' => $data['cb_email']]);
        self::$db->insert('cb_br', ['cb_id' => $cb_id, 'br_id' => $br_id]);
    }
    public static function edit($br_id, $data){
        self::$db->where('cb_id', $br_id)->update('company_branches', $data);
        self::$db->where('ch_cb_id', $br_id)->update('company_history', ['flag' => '0']);
        self::$db->insert('company_history', ['ch_cb_id' => $br_id, 'ch_cb_name' => $data['cb_name'], 'ch_name' => $data['cb_name'], 'ch_cb_address' => $data['cb_address'], 'ch_cb_tin' => $data['cb_tin'], 'ch_cb_class' => $data['cb_class'], 'ch_cb_bp_type' => $data['cb_bp_type'], 'ch_cb_tax_type' => $data['cb_tax_type'], 'ch_cb_seq' => $data['cb_seq'], 'ch_cb_cno' => $data['cb_cno'], 'ch_cb_email' => $data['cb_email']]);
    }
    public static function update($br_id, $data){
        self::$db->where('ch_cb_id', $br_id)->update('company_history', ['flag' => '0']);
        self::$db->insert('company_history', ['ch_cb_id' => $br_id, 'ch_cb_name' => $data['cb_name'], 'ch_name' => $data['cb_name'], 'ch_cb_address' => $data['cb_address'], 'ch_cb_tin' => $data['cb_tin'], 'ch_cb_class' => $data['cb_class'], 'ch_cb_bp_type' => $data['cb_bp_type'], 'ch_cb_tax_type' => $data['cb_tax_type'], 'ch_cb_seq' => $data['cb_seq'], 'ch_cb_cno' => $data['cb_cno'], 'ch_cb_email' => $data['cb_email']]);
    }
}