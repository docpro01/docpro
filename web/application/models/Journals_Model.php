<?php
class Journals_Model extends CI_Model{
    private static $db;

    function __construct() {
        parent::__construct();
        self::$db = get_instance()->db;
    }

    public static function get(){
        return self::$db->where(['j_company' => 'docpro', 'flag' => '1'])->get('journals')->result();
    }

    public static function add($data){
        $last_record = self::$db->query("SELECT * FROM journals WHERE flag='1' AND j_company='docpro' ORDER BY CAST(j_code AS DECIMAL) DESC LIMIT 1")->result();
        $code = count($last_record) > 0 ? (floatval($last_record[0]->j_code) + 1).'' : '1';
    	self::$db->insert('journals', ['j_code' => $code, 'j_name' => $data['j_name'], 'j_shortname' => $data['j_shortname'], 'j_company' => $data['j_company']]);
    }

    public static function edit($id, $data){
    	self::$db->where('j_id', $id)->update('journals', $data);
    	return self::$db->affected_rows() > 0 ? true : false;
    }

    public static function update($data, $id){
        $code = self::$db->get_where('journals', ['j_id' => $id])->result()[0]->j_code;
        self::$db->where('j_id', $id)->update('journals', ['flag' => '0']);
        self::$db->insert('journals', ['j_code' => $code, 'j_name' => $data['j_name'], 'j_shortname' => $data['j_shortname'], 'j_company' => $data['j_company']]);
    }
}