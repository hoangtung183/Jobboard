<?php
jimport('joomla.application.component.view');

class Jobboard3iViewExtra_field extends JView {

	function display($tpl=null){
		$mainframe = JFactory::getApplication();
		JRequest::setVar('hidemainmenu', 1);
		$model = $this->getModel();
		$currency= $model->getData();
		
		//JFilterOutput::objectHTMLSafe($category);
		if (!$currency->id)
			$currency->published = 1;
		$this->assignRef('row', $currency);
		
		//$rows=$model->getImages();
			//$this->assignRef('rows', $rows);
			
		$lists = array();
		$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $currency->published);
		$this->assignRef('lists', $lists);
			
		(JRequest::getInt('cid')) ? $title = JText::_('EDIT') : $title = JText::_('ADD');
		JToolBarHelper::title(JText::_('....'));
		JToolBarHelper::save();
		JToolBarHelper::apply();
		JToolBarHelper::cancel();
		JToolBarHelper::deleteList('', 'remove', 'DELETE');
		
		
		parent::display($tpl);
	}
}
?>

