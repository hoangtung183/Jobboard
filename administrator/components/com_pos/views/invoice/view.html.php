

<?php
	jimport('joomla.application.component.view');
	
	class PosViewinvoice extends JView {
		
		function display($tpl=null){
			
			JRequest::setVar('hidemainmenu', 1);
			$model = $this->getModel();
			$item = $model->getData();
			JFilterOutput::objectHTMLSafe($item);
			if (!$item->id)
				$item->published = 1;
			
			
			$this->assignRef('row', $item);
			
			
			
			$lists = array();
			$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $item->published);
			$this->assignRef('lists', $lists);
			(JRequest::getInt('cid')) ? $title = JText::_('EDIT') : $title = JText::_('ADD');
			JToolBarHelper::title($title, 'k2.png');
			JToolBarHelper::save();
			JToolBarHelper::apply();
			JToolBarHelper::cancel();
			
			parent::display($tpl);
			
			
		
	
	}
	}
?>

