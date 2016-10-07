<?php
class Taxes_Model extends CI_Model{
    private static $db;
    function __construct() {
        parent::__construct();
        self::$db = get_instance()->db;
    }
    public static function get(){
        return self::$db->from('taxes t')->join('tax_types tt', 't.tt_id=tt.tt_id')->where(['t.flag' => '1', 't.t_company' => 'docpro'])->get()->result();
    }
    public static function add($data){
        $last_record = self::$db->query("SELECT * FROM taxes WHERE flag='1' AND t_company='docpro' ORDER BY CAST(t_seq AS DECIMAL) DESC LIMIT 1")->result();
        $seq = count($last_record) > 0 ? (floatval($last_record[0]->t_seq) + 1).'' : '1';
        self::$db->insert('taxes', ['t_seq' => $seq, 't_code' => $data['tt_id'].''.$seq, 't_name' => $data['t_name'], 't_shortname' => $data['t_shortname'], 't_rate' => $data['t_rate'], 't_base' => $data['t_base'], 'tt_id' => $data['tt_id'], 't_company' => $data['t_company'], 't_setup_company' => $data['t_setup_company']]);
    }
    public static function edit($id, $data){
        $seq = self::$db->get_where('taxes', ['t_id' => $id])->result()[0]->t_seq;
        self::$db->where('t_id', $id)->update('taxes', ['t_code' => $data['tt_id'].''.$seq, 't_name' => $data['t_name'], 't_shortname' => $data['t_shortname'], 't_rate' => $data['t_rate'], 't_base' => $data['t_base'], 'tt_id' => $data['tt_id']]);
    }
    public static function update($data, $t_id){
        $seq = self::$db->get_where('taxes', ['t_id' => $t_id])->result()[0]->t_seq;
        self::$db->where('t_id', $t_id)->update('taxes', ['flag' => '0']);
        self::$db->insert('taxes', ['t_seq' => $seq, 't_code' => $data['tt_id'].''.$seq, 't_name' => $data['t_name'], 't_shortname' => $data['t_shortname'], 't_rate' => $data['t_rate'], 't_base' => $data['t_base'], 'tt_id' => $data['tt_id'], 't_company' => $data['t_company']]);
    }
    public static function delete($t_id){
        self::$db->where('t_id', $t_id)->update('taxes', ['flag' => '0']);
    }
}