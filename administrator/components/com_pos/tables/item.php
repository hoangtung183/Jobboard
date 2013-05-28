<?php
defined('_JEXEC') or die;
jimport('joomla.database.table');

class Tableitem extends JTable {
	public $item_id = null;
	public $name = null;
	public $description = null;
	public $category_id = null;
	public $media_id = null;
	public $create_time = null;
	public $update_time = null;
	public $flag = null;
	
	function __construct(&$db){
		parent::__construct('items','item_id', $db);	
	}
}
?>