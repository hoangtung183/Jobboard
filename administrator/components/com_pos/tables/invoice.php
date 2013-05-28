<?php
defined('_JEXEC') or die;
jimport('joomla.database.table');

class Tableinvoice extends JTable {
	public $inv_id = null;
	public $total = "";
	public $inv_code = "";
	public $vat = "";
	public $commision = "";
	public $inv_endtime = "";
	public $inv_startime = "";
	public $user_id = "";
	
	function __construct(&$db){
		parent::__construct('invoice','inv_id', $db);	
	}
}
?>