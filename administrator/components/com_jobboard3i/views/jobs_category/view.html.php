<?php
jimport('joomla.application.component.view');

class Jobboard3iViewJobs_category extends JView {

	function display($tpl=null){
		$mainframe = JFactory::getApplication();
		JRequest::setVar('hidemainmenu', 1);
		$model = $this->getModel();
		$jobs_item = $model->getData();
		JFilterOutput::objectHTMLSafe($category);
		if (!$category->id)
			$category->published = 1;
		$this->assignRef('row', $category);
		
		//$rows=$model->getImages();
			//$this->assignRef('rows', $rows);
			
		$lists = array();
		$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $category->published);
		$this->assignRef('lists', $lists);
			
		(JRequest::getInt('cid')) ? $title = JText::_('EDIT') : $title = JText::_('ADD');
		JToolBarHelper::title(JText::_('LOAICONGVIEC'));
		JToolBarHelper::save();
		JToolBarHelper::apply();
		JToolBarHelper::cancel();
		JToolBarHelper::deleteList('', 'remove', 'DELETE');
		
		
		parent::display($tpl);
	}
}
?>

