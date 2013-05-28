<?php
	jimport('joomla.application.component.controller');
	
	class PosControllerinvoices extends PosController {
		
		public function display($cachable = false, $urlparams = array())
		{
			JRequest::setVar('view', 'invoices');
			parent::display();
		}
		
		function publish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('invoices');
			$model->publish();
		}
		
		function unpublish()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('invoices');
			$model->unpublish();
		}
		
		function remove()
		{
			JRequest::checkToken() or jexit('Invalid Token');
			$model = $this->getModel('invoices');
			$model->remove();
		
			parent::display();
		}
		
		function add()
		{
			$mainframe = JFactory::getApplication();
			$mainframe->redirect('index.php?option=com_pos&view=invoice');
		}
		
		function edit()
		{
			$mainframe = JFactory::getApplication();
			$cid = JRequest::getVar('cid');
			$mainframe->redirect('index.php?option=com_pos&view=invoice&cid='.$cid[0]);
		}
		
		function element()
		{
			JRequest::setVar('view', 'invoices');
			JRequest::setVar('layout', 'element');
			parent::display();
		}
	}
?>
