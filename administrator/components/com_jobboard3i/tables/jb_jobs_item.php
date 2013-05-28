<?php
defined('_JEXEC') or die;

jimport('joomla.database.table');
class TableJb_jobs_item extends JTable {
	public $id = null;
	public $name = null;
	public $address = null;
	public $create_time=null;
	public $level_job=null;
	public $description=null;
	public $companies_id=null;
	public $status=null;
	public $create_date=null;
	public $update_date=null;
	public $delflg = null;
	function __construct(&$db){
		parent::__construct('#__jb_jobs_item','id', $db);	
	}
}
?>