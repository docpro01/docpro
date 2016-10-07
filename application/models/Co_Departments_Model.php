<?php
class Co_Departments_Model extends CI_Model{
    private static $db;
    function __construct() {
        parent::__construct();
        self::$db = get_instance()->db;
    }
    public static function get($cb_id){
        return self::$db->from('co_departments')->where('cb_id', $cb_id)->where('flag', '1')->get()->result();
    }    
    public static function add($data){
        self::$db->insert('co_departments', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
    public static function edit($id, $data){
        self::$db->where('co_de_id', $id)->update('co_departments', $data);
        return self::$db->affected_rows() > 0 ? true : false;
    }
    public static function update($data, $co_de_id){
        self::$db->where('co_de_id', $co_de_id)->update('co_departments', ['flag' => '0']);
        self::$db->insert('co_departments', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
}