<?php
	jimport('joomla.application.component.controller');
	
	class PosControlleritables extends PosController {
		
		public function display($cachable = false, $urlparams = array())
		{
			JRequest::setVar('view', 'itables');
			parent::display();
		}
		
		function publish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('itables');
			$model->publish();
		}
		
		function unpublish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('itables');
			$model->unpublish();
		}
		
		function remove()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('itables');
			$model->remove();
		
			parent::display();
		}
		
		function add()
		{
			$mainframe = JFactory::getApplication();
			$mainframe->redirect('index.php?option=com_pos&view=itable');
		}
		
		function edit()
		{
			$mainframe = JFactory::getApplication();
			$cid = JRequest::getVar('cid');
			$mainframe->redirect('index.php?option=com_pos&view=itable&cid='.$cid[0]);
		}
		
		function element()
		{
			JRequest::setVar('view', 'itables');
			JRequest::setVar('layout', 'element');
			parent::display();
		}
	}
?>
