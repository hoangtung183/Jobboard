<?php
	jimport('joomla.application.component.controller');
	
	class PosControllercategories extends PosController {
		
		public function display($cachable = false, $urlparams = array())
		{
			JRequest::setVar('view', 'categories');
			parent::display();
		}
		
		function publish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('categories');
			$model->publish();
		}
		
		function unpublish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('categories');
			$model->unpublish();
		}
		
		function remove()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('categories');
			$model->remove();
		
			parent::display();
		}
		
		function add()
		{
			$mainframe = JFactory::getApplication();
			$mainframe->redirect('index.php?option=com_pos&view=category');
		}
		
		function edit()
		{
			$mainframe = JFactory::getApplication();
			$cid = JRequest::getVar('cid');
			$mainframe->redirect('index.php?option=com_pos&view=category&cid='.$cid[0]);
		}
		
		function element()
		{
			JRequest::setVar('view', 'categories');
			JRequest::setVar('layout', 'element');
			parent::display();
		}
	}
?>
