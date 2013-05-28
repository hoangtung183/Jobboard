<?php
	jimport('joomla.application.component.controller');
	
	class Jobboard3iControllerJobs_categories extends Jobboard3iController {
		
		public function display($cachable = false, $urlparams = array())
		{
			JRequest::setVar('view', 'jobs_categories');
			parent::display();
		}
		
		function publish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('jobs_categories');
			$model->publish();
		}
		
		function unpublish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('jobs_categories');
			$model->unpublish();
		}
		
		function remove()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('jobs_categories');
			$model->remove();
		
			parent::display();
		}
		
		function add()
		{
			$mainframe = JFactory::getApplication();
			$mainframe->redirect('index.php?option=com_jobboard3i&view=jobs_category');
		}
		
		function edit()
		{
			$mainframe = JFactory::getApplication();
			$cid = JRequest::getVar('cid');
			$mainframe->redirect('index.php?option=com_pos&view=jobs_category&cid='.$cid[0]);
		}
		
		function element()
		{
			JRequest::setVar('view', 'jobs_categories');
			JRequest::setVar('layout', 'element');
			parent::display();
		}
	}
?>
