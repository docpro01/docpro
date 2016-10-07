<?php
class Banks_Model extends CI_Model{
    private static $db;
    function __construct() {
        parent::__construct();
        self::$db = get_instance()->db;
    }
    public static function get(){
        return self::$db->get_where('banks', ['flag' => '1', 'b_company' => 'docpro'])->result();
    }
    public static function add($data){
        $last_record = self::$db->query("SELECT * FROM banks WHERE flag='1' AND b_company='docpro' ORDER BY CAST(b_code AS DECIMAL) DESC LIMIT 1")->result();
        $code = count($last_record) > 0 ? (floatval($last_record[0]->b_code) + 1).'' : '1';
        self::$db->insert('banks', ['b_code' => $code, 'b_name' => $data['b_name'], 'b_shortname' => $data['b_shortname'], 'b_company' => $data['b_company']]);
    }
    public static function edit($id, $data){
        $code = self::$db->get_where('banks', ['b_id' => $id])->result()[0]->b_code;
        self::$db->where('b_id', $id)->update('banks', ['b_code' => $code, 'b_name' => $data['b_name'], 'b_shortname' => $data['b_shortname']]);
    }
    public static function update($data, $b_id){
        $code = self::$db->get_where('banks', ['b_id' => $b_id])->result()[0]->b_code;
        self::$db->where('b_id', $b_id)->update('banks', ['flag' => '0']);
        self::$db->insert('banks', ['b_code' => $code, 'b_name' => $data['b_name'], 'b_shortname' => $data['b_shortname'], 'b_company' => $data['b_company']]);
    }
}