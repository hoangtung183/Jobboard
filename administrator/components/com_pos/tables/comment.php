<?php
defined('_JEXEC') or die;

jimport('joomla.database.table');
class Tablecomment extends JTable {
	public $comment_id = null;
	public $name = null;
	public $value = null;
	public $create_time=null;
	public $update_time=null;
	public $flag = null;
	function __construct(&$db){
		parent::__construct('comment','comment_id', $db);	
	}
}
?>