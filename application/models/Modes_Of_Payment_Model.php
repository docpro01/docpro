<?php
class Modes_Of_Payment_Model extends CI_Model{
    private static $db;
    function __construct() {
        parent::__construct();
        self::$db = get_instance()->db;
    }
    public static function get(){
        return self::$db->from('modes_of_payment mop')->join('types_of_payment top', 'mop.top_id=top.top_id')->where(['mop.mop_company' => 'docpro', 'mop.flag' => '1'])->get()->result();
    }
    public static function add($data){
        $last_record = self::$db->query("SELECT * FROM modes_of_payment WHERE flag='1' AND mop_company='docpro' ORDER BY CAST(mop_seq AS DECIMAL) DESC LIMIT 1")->result();
        $seq = count($last_record) > 0 ? (floatval($last_record[0]->mop_seq) + 1).'' : '1';
        self::$db->insert('modes_of_payment', ['mop_seq' => $seq, 'mop_code' => $data['top_id'].''.$seq, 'mop_name' => $data['mop_name'], 'mop_shortname' => $data['mop_shortname'], 'top_id' => $data['top_id'], 'mop_company' => $data['mop_company']]);
    }
    public static function edit($id, $data){
        $seq = self::$db->get_where('modes_of_payment', ['mop_id' => $id])->result()[0]->mop_seq;
        self::$db->where('mop_id', $id)->update('modes_of_payment', ['mop_code' => $data['top_id'].''.$seq, 'mop_name' => $data['mop_name'], 'mop_shortname' => $data['mop_shortname'], 'top_id' => $data['top_id']]);
    }
    public static function update($id, $data){
        $seq = self::$db->get_where('modes_of_payment', ['mop_id' => $id])->result()[0]->mop_seq;
        self::$db->where('mop_id', $id)->update('modes_of_payment', ['flag' => '0']);
        self::$db->insert('modes_of_payment', ['mop_seq' => $seq, 'mop_code' => $data['top_id'].''.$seq, 'mop_name' => $data['mop_name'], 'mop_shortname' => $data['mop_shortname'], 'top_id' => $data['top_id'], 'mop_company' => $data['mop_company']]);
    }
}