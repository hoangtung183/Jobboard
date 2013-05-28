<?php
	jimport('joomla.application.component.controller');
	
	class Jobboard3iControllerCurrencies extends Jobboard3iController {
		
		public function display($cachable = false, $urlparams = array())
		{
			JRequest::setVar('view', 'currencies');
			parent::display();
		}
		
		function publish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('currencies');
			$model->publish();
		}
		
		function unpublish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('currencies');
			$model->unpublish();
		}
		
		function remove()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('currencies');
			$model->remove();
		
			parent::display();
		}
		
		function add()
		{
			$mainframe = JFactory::getApplication();
			$mainframe->redirect('index.php?option=com_jobboard3i&view=currency');
		}
		
		function edit()
		{
			$mainframe = JFactory::getApplication();
			$cid = JRequest::getVar('cid');
			$mainframe->redirect('index.php?option=com_pos&view=currency&cid='.$cid[0]);
		}
		
		function element()
		{
			JRequest::setVar('view', 'currencies');
			JRequest::setVar('layout', 'element');
			parent::display();
		}
	}
?>
