<?php
defined('_JEXEC') or die;

jimport('joomla.database.table');
class Tablecategory extends JTable {
	public $category_id = null;
	public $name = null;
	public $description = null;
	public $create_time=null;
	public $update_time=null;
	public $flag = null;
	function __construct(&$db){
		parent::__construct('category','category_id', $db);	
	}
}
?>