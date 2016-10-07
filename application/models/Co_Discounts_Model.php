<?php
class Co_Discounts_Model extends CI_Model{
    private static $db;
    function __construct() {
        parent::__construct();
        self::$db = get_instance()->db;
    }
    public static function get($cb_id){
        return self::$db->get_where('co_discounts', ['cb_id' => $cb_id, 'flag' => '1'])->result();
    }
    public static function add($data){
        self::$db->insert('co_discounts', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
    public static function edit($id, $data){
        self::$db->where('co_d_id', $id)->update('co_discounts', $data);
        return self::$db->affected_rows() > 0 ? true : false;
    }
    public static function update($data, $co_d_id){
        self::$db->where('co_d_id', $co_d_id)->update('co_discounts', ['flag' => '0']);
        self::$db->insert('co_discounts', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
}