<?php
defined('_JEXEC') or die;

jimport('joomla.database.table');
class TableJb_extra_field extends JTable {
	public $id = null;
	public $value = null;
	public $code=null;
	public $status=null;
	public $create_date=null;
	public $update_date=null;

	function __construct(&$db){
		parent::__construct('#__jb_extra_field','id', $db);	
	}
}
?>