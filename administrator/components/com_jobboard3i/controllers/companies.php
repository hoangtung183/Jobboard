<?php
	jimport('joomla.application.component.controller');
	
	class Jobboard3iControllerCompanies extends Jobboard3iController {
		
		public function display($cachable = false, $urlparams = array())
		{
			JRequest::setVar('view', 'companies');
			parent::display();
		}
		
		function publish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('companies');
			$model->publish();
		}
		
		function unpublish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('companies');
			$model->unpublish();
		}
		
		function remove()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('companies');
			$model->remove();
		
			parent::display();
		}
		
		function add()
		{
			$mainframe = JFactory::getApplication();
			$mainframe->redirect('index.php?option=com_jobboard3i&view=company');
		}
		
		function edit()
		{
			$mainframe = JFactory::getApplication();
			$cid = JRequest::getVar('cid');
			$mainframe->redirect('index.php?option=com_pos&view=company&cid='.$cid[0]);
		}
		
		function element()
		{
			JRequest::setVar('view', 'companies');
			JRequest::setVar('layout', 'element');
			parent::display();
		}
	}
?>
