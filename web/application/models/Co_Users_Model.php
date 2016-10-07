<?php
class Co_Users_Model extends CI_Model{
	private static $db;

	function __construct(){
		parent::__construct();
		self::$db = &get_instance()->db;
	}

	public static function company_superadmin_users_get($cb_id){
		return self::$db->get_where('profiles', ['cb_id' => $cb_id])->result();
	}
	public static function add($profile, $users){
		// self::$db->insert('profiles', $profile);
		// $p_id = self::$db->insert_id();
		// // self::$db->insert('users', );
	}
}