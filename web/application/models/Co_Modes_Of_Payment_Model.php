<?php
class Co_Modes_Of_Payment_Model extends CI_Model{
    private static $db;
    function __construct() {
        parent::__construct();
        self::$db = get_instance()->db;
    }
    public static function get($id){
        return self::$db->from('modes_of_payment mop')->join('types_of_payment top', 'mop.top_id=top.top_id')->join('co_modes_of_payment comop', 'comop.mop_id=mop.mop_id')->where('comop.cb_id', $id)->where('comop.flag', '1')->order_by('mop.mop_id', 'asc')->get()->result();
    }

    public static function add($data){
        self::$db->insert('co_modes_of_payment', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
    public static function edit($id, $data){
        self::$db->where('co_mop_id', $id)->update('co_modes_of_payment', $data);
        return self::$db->affected_rows() > 0 ? true : false;
    }
    public static function update($data, $co_mop_id){
        self::$db->where('co_mop_id', $co_mop_id)->update('co_modes_of_payment', ['flag' => '0']);
        self::$db->insert('co_modes_of_payment', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
}