<?php
defined('_JEXEC') or die;

jimport('joomla.database.table');
class TableMedia extends JTable {
	public $media_id = null;
	public $name = null;
	public $size = 100;
	public $type ="jpg";
	public $create_time =null;
	public $update_time=null;
	public $flag = 1;
	function __construct(&$db){
		parent::__construct('media','media_id', $db);	
	}
}
?>