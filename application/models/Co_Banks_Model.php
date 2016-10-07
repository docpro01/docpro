<?php
class Co_Banks_Model extends CI_Model{
    private static $db;
    function __construct() {
        parent::__construct();
        self::$db = get_instance()->db;
    }
    public static function get($id){
        return self::$db->from('co_banks cob')->join('banks b', 'cob.b_id=b.b_id')->where('cob.flag', '1')->where('cob.cb_id', $id)->get()->result();
    }
    public static function add($data){
        self::$db->insert('co_banks', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
    public static function edit($id, $data){
        self::$db->where('co_b_id', $id)->update('co_banks', $data);
        return self::$db->affected_rows() > 0 ? true : false;
    }
    public static function update($data, $co_b_id){
        self::$db->where('co_b_id', $co_b_id)->update('co_banks', ['flag' => '0']);
        self::$db->insert('co_banks', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
}