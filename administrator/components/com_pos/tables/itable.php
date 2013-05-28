<?php
defined('_JEXEC') or die;
jimport('joomla.database.table');

class Tableitable extends JTable {
	public $itable_id = null;
	public $code_table = "";
	public $description_table = "";
	public $create_time="";
	public $update_time="";
	public $status="";
	public $flag="";
	
	function __construct(&$db){
		parent::__construct('itable','itable_id', $db);	
	}
}
?>