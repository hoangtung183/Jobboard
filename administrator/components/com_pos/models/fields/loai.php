<?php

/**
* @version 1.4.0
* @package RSform!Pro 1.4.0
* @copyright (C) 2007-2011 www.rsjoomla.com
* @license GPL, http://www.gnu.org/copyleft/gpl.html
*/

/*defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

JHTML::_('behavior.tooltip');

class JFormFieldLang extends JFormField
{
	
	protected $type = 'Loai';

	protected function getInput()
	{
		
		$attribs = ' ';
		$attribs .= $this->element['size'] ? ' size="'.(int) $this->element['size'].'"' : '';
		$attribs .= $this->element['class'] ? ' class="'.(string) $this->element['class'].'"' : 'class="inputbox"';
		
		$lang 	   =& JFactory::getLanguage();
		$lang->load('com_rsform');
		$languages = $lang->getKnownLanguages(JPATH_SITE);
		$options   = array();
		$options[] = JHTML::_('select.option', '', JText::_('RSFP_SUBMISSIONS_ALL_LANGUAGES'));
		foreach ($languages as $language => $properties)
			$options[] = JHTML::_('select.option', $language, $properties['name']);

		
		$return = JHTML::_('select.genericlist', $options, $this->name, $attribs, 'value', 'text', $this->value, $this->id);
		
		return $return;
	}
}
*/

defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

JHTML::_('behavior.tooltip');

class JFORMFieldLoai extends JFormField
{
	protected $type='Loai';
	protected function getInput()
	{
		if($this->element['size']){
			$attr .=' size="'.(int) $this->element['size'].'"' ;
			/*$attr=' size="'.(int)$this->element['size'].'"';*/
		}
		else {$attr ='';}
		
		$db = JFactory::getDbo();
		$sql="SELECT id AS value, ten AS text FROM jos_loai";
		$db->setQuery($sql);
		
		$return=JHtml::_('select.genericlist', $db->loadObjectList(), $this->name , trim($attr));
		return $return;
	}	
}
?>