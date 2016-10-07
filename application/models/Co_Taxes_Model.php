<?php
class Co_Taxes_Model extends CI_Model{
    private static $db;
    function __construct() {
        parent::__construct();
        self::$db = get_instance()->db;
    }
    public static function get($id){
        return self::$db->from('co_taxes cot')->join('taxes t', 'cot.t_id=t.t_id')->join('tax_types tt', 'tt.tt_id=t.tt_id')->where(['cb_id' => $id, 'cot.flag' => '1'])->get()->result();
    }
    public static function add($data){
        self::$db->insert('co_taxes', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
    public static function edit($id, $data){
        self::$db->where('co_t_id', $id)->update('co_taxes', $data);
        return self::$db->affected_rows() > 0 ? true : false;
    }
    public static function update($id, $data){
        self::$db->where('co_t_id', $id)->update('co_taxes', ['flag' => '0']);
        self::$db->insert('co_taxes', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
}