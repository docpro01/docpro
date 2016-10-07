<?php
class Co_Tax_Types_Model extends CI_Model{
    private static $db;
    function __construct(){
        parent::__construct();
        self::$db = get_instance()->db;
    }
    public static function get(){
        return self::$db->from('co_tax_types')->get()->result();
    }
}