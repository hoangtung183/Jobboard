<?php
jimport('joomla.application.component.controller');
require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'jobboard3i.php');

class Jobboard3iController extends JController {

	protected $default_view = 'jobs_items';
	public function display($cachable = false, $urlparams = false)
	{
		Jobboard3iHelper::addSubmenu(JRequest::getCmd('view', 'jobs_items'));

		parent::display();

		return $this;
	}
	
}
?>