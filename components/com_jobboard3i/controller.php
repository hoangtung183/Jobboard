<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 
/**
 * General Controller of HelloWorld component
 */
class JobBoard3iController extends JController
{
        /**
         * display task
         *
         * @return void
         */
        function display($cachable = false) 
        {   
                // set default view if not set
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'postjobs'));
 
                // call parent behavior
                parent::display($cachable);
        }
}