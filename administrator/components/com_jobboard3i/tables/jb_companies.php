<?php
defined('_JEXEC') or die;

jimport('joomla.database.table');
class TableJb_companies extends JTable {
	public $id = null;
	public $name = null;
	public $date_founding=null;
	public $company_type=null;
	public $number_employees=null;
	public $headquarters_city=null;
	public $revenue=null;
	public $descriptions=null;
	public $contact=null;
	public $logo=null;
	public $address=null;
	public $status=null;
	public $create_date=null;
	public $update_date=null;

	function __construct(&$db){
		parent::__construct('#__jb_companies','id', $db);	
	}
}
?>