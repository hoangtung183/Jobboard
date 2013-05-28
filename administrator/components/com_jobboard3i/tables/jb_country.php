<?php
defined('_JEXEC') or die;

jimport('joomla.database.table');
class TableJb_country extends JTable {
	public $id = null;
	public $name = null;
	public $description=null;

	function __construct(&$db){
		parent::__construct('#__jb_country','id', $db);	
	}
}
?>