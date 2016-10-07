<?php
class Co_Services_Model extends CI_Model{
    private static $db;
    function __construct(){
        parent::__construct();
        self::$db = get_instance()->db;
    }
    public static function get($cb_id){
        return self::$db->from('co_services cos')->join('co_profit_cost_centers copcc', 'cos.co_pcc_id=copcc.co_pcc_id')->join('co_departments cod', 'cos.co_de_id=cod.co_de_id')->where('cod.cb_id', $cb_id)->where('cos.flag', '1')->order_by('cos.co_s_id', 'asc')->get()->result();
    }
    
    public static function add($data){
        self::$db->insert('co_services', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
    public static function edit($id, $data){
        self::$db->where('co_s_id', $id)->update('co_services', $data);
        return self::$db->affected_rows() > 0 ? true : false;
    }
    public static function update($data, $co_s_id){
        self::$db->where('co_s_id', $co_s_id)->update('co_services', ['flag' => '0']);
        self::$db->insert('co_services', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
}