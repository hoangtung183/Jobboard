<?php
	jimport('joomla.application.component.controller');
	
	class Jobboard3iControllerCities extends Jobboard3iController {
		
		public function display($cachable = false, $urlparams = array())
		{
			JRequest::setVar('view', 'cities');
			parent::display();
		}
		
		function publish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('cities');
			$model->publish();
		}
		
		function unpublish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('cities');
			$model->unpublish();
		}
		
		function remove()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('cities');
			$model->remove();
		
			parent::display();
		}
		
		function add()
		{
			$mainframe = JFactory::getApplication();
			$mainframe->redirect('index.php?option=com_jobboard3i&view=city');
		}
		
		function edit()
		{
			$mainframe = JFactory::getApplication();
			$cid = JRequest::getVar('cid');
			$mainframe->redirect('index.php?option=com_pos&view=city&cid='.$cid[0]);
		}
		
		function element()
		{
			JRequest::setVar('view', 'cities');
			JRequest::setVar('layout', 'element');
			parent::display();
		}
	}
?>
