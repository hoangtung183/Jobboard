<?php
/**
 * @version		$Id: tag.php 1812 2013-01-14 18:45:06Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2013 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class Jobboard3iControllerExtra_field extends Jobboard3iController
{

    public function display($cachable = false, $urlparams = array())
    {
        JRequest::setVar('view', 'extra_field');
        parent::display();
    }

   function save()
    {
        JRequest::checkToken() or jexit('Invalid Token');
        $model = $this->getModel('extra_field');
        $model->save();
    }

    function apply()
    {
        $this->save();
    }

    
	function remove()
	{
		JRequest::checkToken() or jexit('Invalid Token');
		$model = $this->getModel('extra_field');
		$model->remove();
		parent::display();
	}
	function cancel()
	{
		$mainframe = JFactory::getApplication();
		$mainframe->redirect('index.php?option=com_jobboard3i&view=extra_fields');
	}


}
