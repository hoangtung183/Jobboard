<?php
	jimport('joomla.application.component.controller');
	
	class Jobboard3iControllerCountries extends Jobboard3iController {
		
		public function display($cachable = false, $urlparams = array())
		{
			JRequest::setVar('view', 'countries');
			parent::display();
		}
		
		function publish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('countries');
			$model->publish();
		}
		
		function unpublish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('countries');
			$model->unpublish();
		}
		
		function remove()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('countries');
			$model->remove();
		
			parent::display();
		}
		
		function add()
		{
			$mainframe = JFactory::getApplication();
			$mainframe->redirect('index.php?option=com_jobboard3i&view=country');
		}
		
		function edit()
		{
			$mainframe = JFactory::getApplication();
			$cid = JRequest::getVar('cid');
			$mainframe->redirect('index.php?option=com_pos&view=country&cid='.$cid[0]);
		}
		
		function element()
		{
			JRequest::setVar('view', 'countries');
			JRequest::setVar('layout', 'element');
			parent::display();
		}
	}
?>
