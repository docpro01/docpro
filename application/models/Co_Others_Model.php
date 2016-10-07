<?php
class Co_Others_Model extends CI_Model{
    private static $db;
    function __construct() {
        parent::__construct();
        self::$db = get_instance()->db;
    }
    public static function get($cb_id){
        return self::$db->from('co_others')->where('cb_id', $cb_id)->where('flag', '1')->get()->result();
    }
    public static function add($data){
        self::$db->insert('co_others', $data);
        return self::$db->affected_rows() > 0 ? true : false;
    }
    public static function edit($id, $data){
        self::$db->where('co_o_id', $id)->update('co_others', $data);
        return self::$db->affected_rows() > 0 ? true : false;
    }
    public static function update($data, $co_o_id){
        self::$db->where('co_o_id', $co_o_id)->update('co_others', ['flag' => '0']);
        self::$db->insert('co_others', $data);
        return self::$db->affected_rows() > 0 ? true : false;
    }
}