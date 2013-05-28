<?php
defined('_JEXEC') or die;

jimport('joomla.database.table');
class TableJb_city extends JTable {
	public $id = null;
	public $name = null;
	public $country_id=null;
	public $description=null;

	function __construct(&$db){
		parent::__construct('#__jb_city','id', $db);	
	}
}
?>