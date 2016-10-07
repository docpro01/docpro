<?php
class Co_Journals_Model extends CI_Model{
    private static $db;
    function __construct() {
        parent::__construct();
        self::$db = get_instance()->db;
    }

    public static function get($id){
        return self::$db->from('journals j')->join('co_journals cj', 'cj.j_id = j.j_id')->join('company_branches cb', 'cb.cb_id = cj.cb_id')->where('cb.cb_id', $id)->where('cj.flag', '1')->order_by('j.j_id', 'asc')->get()->result();
    }
    
    public static function add($data){
        self::$db->insert('co_journals', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
    public static function edit($id, $data){
        self::$db->where('co_j_id', $id)->update('co_journals', $data);
        return self::$db->affected_rows() > 0 ? true : false;
    }
    public static function update($data, $co_j_id){
        self::$db->where('co_j_id', $co_j_id)->update('co_journals', ['flag' => '0']);
        self::$db->insert('co_journals', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
}