<?php
class Co_Products_Model extends CI_Model{
    private static $db;
    function __construct(){
        parent::__construct();
        self::$db = get_instance()->db;
    }
    public static function get($cb_id){
        return self::$db->from('co_products cop')->join('co_profit_cost_centers copcc', 'cop.co_pcc_id=copcc.co_pcc_id')->join('co_departments cod', 'cop.co_de_id=cod.co_de_id')->where('cod.cb_id', $cb_id)->where('cop.flag', '1')->order_by('cop.co_p_id', 'asc')->get()->result();
    }
    
    public static function add($data){
        self::$db->insert('co_products', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
    public static function edit($id, $data){
        self::$db->where('co_p_id', $id)->update('co_products', $data);
        return self::$db->affected_rows() > 0 ? true : false;
    }
    public static function update($data, $co_p_id){
        self::$db->where('co_p_id', $co_p_id)->update('co_products', ['flag' => '0']);
        self::$db->insert('co_products', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
}