<?php
	jimport('joomla.application.component.controller');
	
	class PosControlleritems extends PosController {
		
		public function display($cachable = false, $urlparams = array())
		{
			JRequest::setVar('view', 'items');
			parent::display();
		}
		
		function publish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('items');
			$model->publish();
		}
		
		function unpublish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('items');
			$model->unpublish();
		}
		
		function remove()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('items');
			$model->remove();
		
			parent::display();
		}
		
		function add()
		{
			$mainframe = JFactory::getApplication();
			$mainframe->redirect('index.php?option=com_pos&view=item');
		}
		
		function edit()
		{
			$mainframe = JFactory::getApplication();
			$cid = JRequest::getVar('cid');
			$mainframe->redirect('index.php?option=com_pos&view=item&cid='.$cid[0]);
		}
		
		function element()
		{
			JRequest::setVar('view', 'items');
			JRequest::setVar('layout', 'element');
			parent::display();
		}
	}
?>
