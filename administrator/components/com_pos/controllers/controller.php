<?php
	jimport('joomla.application.component.controller');
	require_once (JPATH_COMPONENT.DS.'helpers'.DS.'pos.php');
 
	class PosController extends JController {
 
		protected $default_view = 'items';
		public function display($cachable = false, $urlparams = false)
		  {
				  PosHelper::addSubmenu(JRequest::getCmd('view', 'items'));
				  
				  $view  = JRequest::getCmd('view', 'items');
				  $layout  = JRequest::getCmd('layout', 'items');
				  $id   = JRequest::getInt('id');
				  
				  // Check for edit form.
					if ($view == 'items' && $layout == 'edit' && !$this->checkEditId('com_pos.edit.items', $id)) {
					   // Somehow the person just went to the form - we don't allow that.
					   $this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
					   $this->setMessage($this->getError(), 'error');
					
						$this->setRedirect(JRoute::_('index.php?option=com_pos&view=items', false));
		  
				   	return false;
				   }
				    parent::display();
		  
					return $this;				
		  }
	}
?>