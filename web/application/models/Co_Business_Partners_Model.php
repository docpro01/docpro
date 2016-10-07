<?php
class Co_Business_Partners_Model extends CI_Model{
    private static $db;
    function __construct() {
        parent::__construct();
        self::$db = get_instance()->db;
    }
    public static function get($id){
        $bp = self::$db->from('co_business_partners cbt')
                ->join('business_partners_type bpt', 'bpt.bpt_id=cbt.bpt_id')
                ->where('cbt.cb_id', $id)
                ->where('cbt.flag', '1')
                ->get()->result();

        foreach ($bp as $key => &$value) {
            $value->tax_1 = self::$db->from('co_taxes ct')->join('taxes t', 't.t_id=ct.t_id')->where('ct.t_id', $value->co_t_id1)->where('ct.flag', '1')->get()->result();
            $value->tax_2 = self::$db->from('co_taxes ct')->join('taxes t', 't.t_id=ct.t_id')->where('ct.t_id', $value->co_t_id2)->where('ct.flag', '1')->get()->result();
            $value->tax_3 = self::$db->from('co_taxes ct')->join('taxes t', 't.t_id=ct.t_id')->where('ct.t_id', $value->co_t_id3)->where('ct.flag', '1')->get()->result();
        }
        return $bp;
    }
    public static function add($data){
        self::$db->insert('co_business_partners', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
    public static function edit($id, $data){
        self::$db->where('co_bp_id', $id)->update('co_business_partners', $data);
        return self::$db->affected_rows() > 0 ? true : false;
    }
    public static function update($data, $bp_id){
        self::$db->where('co_bp_id', $bp_id)->update('co_business_partners', ['flag' => '0']);
        self::$db->insert('co_business_partners', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
}