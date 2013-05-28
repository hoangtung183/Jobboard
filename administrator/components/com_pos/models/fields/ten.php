<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

JHTML::_('behavior.tooltip');

class JFORMFieldTen extends JFormField   /*chú ý: JFORMField ...: ... là tên định nghĩa */
{
	protected $type='Ten';
	protected function getInput()
	{
		if($this->element['size']){
			$attr .=' size="'.(int) $this->element['size'].'"' ;
				
		}
		else {$attr ='';}
		
		$db=& JFactory::getDbo();
		$query="SELECT * From jos_sach";
		$db->loa($query);
		$return=$db->loadResult();
		return $return;
		
		
		
		
		/* if($this->element['size']){
			$attr .=' size="'.(int) $this->element['size'].'"' ;
			
		}
		else {$attr ='';}

		$db = JFactory::getDbo();
		$sql="SELECT id AS value, ten AS text FROM jos_loai";
		$db->setQuery($sql);

		$return=JHtml::_('select.genericlist', $db->loadObjectList(), $this->name , trim($attr));
		return $return; */
	}
}
?>