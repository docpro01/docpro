<?php
class Co_Profit_Cost_Centers_Model extends CI_Model{
    private static $db;
    function __construct(){
        parent::__construct();
        self::$db = get_instance()->db;
    }
    public static function get($cb_id){
        return self::$db->from('co_profit_cost_centers copcc')->join('co_departments cod', 'copcc.co_de_id=cod.co_de_id')->where('cod.cb_id', $cb_id)->where('copcc.flag', '1')->get()->result();
    }
    
    public static function add($data){
        self::$db->insert('co_profit_cost_centers', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
    public static function edit($id, $data){
        self::$db->where('co_pcc_id', $id)->update('co_profit_cost_centers', $data);
        return self::$db->affected_rows() > 0 ? true : false;
    }
    public static function update($data, $co_pcc_id){
        self::$db->where('co_pcc_id', $co_pcc_id)->update('co_profit_cost_centers', ['flag' => '0']);
        self::$db->insert('co_profit_cost_centers', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
}