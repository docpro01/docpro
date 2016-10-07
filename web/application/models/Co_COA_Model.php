<?php

class Co_COA_Model extends CI_Model{
	private static $db;

	function __construct(){
		parent::__construct();
		self::$db = &get_instance()->db;
	}

	public static function get_lvl_1($cb_id){
		return self::$db->from('coa_lvl_1 coa1')->join('co_coa_lvl1 cocoa1', 'cocoa1.lvl_1_id = coa1.lvl_1_id')->where(['cocoa1.cb_id' => $cb_id, 'cocoa1.flag' => '1'])->get()->result();
	}

	public static function get_lvl_2($cb_id, $lvl_1_id){
		return self::$db->from('coa_lvl_2 coa2')->join('coalvl_1_2 coa12', 'coa12.lvl_2_id = coa2.lvl_2_id')->where(['coa12.lvl_1_id' => $lvl_1_id, 'coa12.flag' => '1'])->get()->result();
	}

	public static function get_lvl_3($cb_id, $lvl_2_id){
		return self::$db->from('coa_lvl_3 coa3')->join('coalvl_2_3 coa23', 'coa23.lvl_3_id = coa3.lvl_3_id')->where(['coa23.lvl_2_id' => $lvl_2_id, 'coa23.flag' => '1'])->get()->result();
	}

	public static function get_lvl_4($cb_id, $lvl_3_id){
		return self::$db->from('coa_lvl_4 coa4')->join('coalvl_3_4 coa34', 'coa34.lvl_4_id = coa4.lvl_4_id')->where(['coa34.lvl_3_id' => $lvl_3_id, 'coa34.flag' => '1'])->get()->result();
	}

	public static function add_lvl_1($data, $cb_id){
		self::$db->insert('coa_lvl_1', $data);
		$lvl_1_id = self::$db->insert_id();
		self::$db->insert('co_coa_lvl1', ['cb_id' => $cb_id, 'lvl_1_id' => $lvl_1_id]);
	}

	public static function edit_lvl_1($data, $lvl_1_id, $cb_id){
		self::$db->where('lvl_1_id', $lvl_1_id)->update('coa_lvl_1', $data);
	}

	public static function delete_lvl_1($co_coa_lvl1_id){
		self::$db->where('id', $co_coa_lvl1_id)->update('co_coa_lvl1', ['flag' => '0']);
	}

	public static function add_lvl_2($data, $lvl_1_id){
		self::$db->insert('coa_lvl_2', $data);
		$lvl_2_id = self::$db->insert_id();
		self::$db->insert('coalvl_1_2', ['lvl_1_id' => $lvl_1_id, 'lvl_2_id' => $lvl_2_id]);
	}

	public static function edit_lvl_2($data, $lvl_2_id, $cb_id){
		self::$db->where('lvl_2_id', $lvl_2_id)->update('coa_lvl_2', $data);
	}

	public static function delete_lvl_2($coalvl_1_2_id){
		self::$db->where('id', $coalvl_1_2_id)->update('coalvl_1_2', ['flag' => '0']);
	}

	public static function add_lvl_3($data, $lvl_2_id){
		self::$db->insert('coa_lvl_3', $data);
		$lvl_3_id = self::$db->insert_id();
		self::$db->insert('coalvl_2_3', ['lvl_2_id' => $lvl_2_id, 'lvl_3_id' => $lvl_3_id]);
	}

	public static function edit_lvl_3($data, $lvl_3_id, $cb_id){
		self::$db->where('lvl_3_id', $lvl_3_id)->update('coa_lvl_3', $data);
	}

	public static function delete_lvl_3($coalvl_2_3_id){
		self::$db->where('id', $coalvl_2_3_id)->update('coalvl_2_3', ['flag' => '0']);
	}

	public static function add_lvl_4($data, $lvl_3_id){
		self::$db->insert('coa_lvl_4', $data);
		$lvl_4_id = self::$db->insert_id();
		self::$db->insert('coalvl_3_4', ['lvl_3_id' => $lvl_3_id, 'lvl_4_id' => $lvl_4_id]);
	}

	public static function edit_lvl_4($data, $lvl_4_id, $cb_id){
		self::$db->where('lvl_4_id', $lvl_4_id)->update('coa_lvl_4', $data);
	}

	public static function delete_lvl_4($coalvl_3_4_id){
		self::$db->where('id', $coalvl_3_4_id)->update('coalvl_3_4', ['flag' => '0']);
	}


	//Company COA

	public static function co_coa($cb_id){
		return '';
	}
}