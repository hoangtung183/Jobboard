<?php
defined('_JEXEC') or die;

jimport('joomla.database.table');
class TableJb_jobs_categories extends JTable {
	public $id = null;
	public $name = null;
	public $address = null;
	public $description=null;
	
	public $status=null;
	public $create_date=null;
	public $update_date=null;
	public $delflg = null;
	public $idparent=null;
	function __construct(&$db){
		parent::__construct('#__jb_jobs_categories','id', $db);	
	}
}
?>