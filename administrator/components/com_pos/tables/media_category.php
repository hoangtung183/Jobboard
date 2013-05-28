<?php
defined('_JEXEC') or die;

jimport('joomla.database.table');
class TableMedia_category extends JTable {
	public $media_category_id = null;
	public $media_id = null;
	public $category_id = null;

	//public $name=null;
	function __construct(&$db){
		parent::__construct('media_category','media_category_id', $db);	
	}
}
?>