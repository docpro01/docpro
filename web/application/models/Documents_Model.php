<?php
class Documents_Model extends CI_Model{
    private static $db;
    function __construct() {
        parent::__construct();
        self::$db = get_instance()->db;
    }
    public static function get($cb_id){
        return self::$db->from('documents doc')->join('co_documents codoc', 'codoc.d_id = doc.d_id')->join('journals journ', 'journ.j_id = doc.j_id')->where('codoc.flag', '1')->where('cb_id', $cb_id)->get()->result();
    }
    public static function add($data){
        self::$db->insert('documents', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
    public static function edit($id, $data){
        self::$db->where('d_id', $id)->update('documents', $data);
        return self::$db->affected_rows() > 0 ? true : false;
    }
    public static function update($data, $co_doc_id){
        self::$db->where('co_doc_id', $co_doc_id)->update('co_documents', ['flag' => '0']);
        self::$db->insert('documents', $data);
        return self::$db->affected_rows() > 0 ? self::$db->insert_id() : false;
    }
}