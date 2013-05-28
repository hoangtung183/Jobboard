`	1<?php
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

class PosControlleritable extends PosController
{

    public function display($cachable = false, $urlparams = array())
    {
        JRequest::setVar('view', 'itable');
        parent::display();
    }

   /*public function save() {
    	$path= JPATH_COMPONENT_ADMINISTRATOR.DS.'tables';
    	JTable:: addIncludePath($path);
    	$tblSach= JTable:: getInstance("sachA","Table");
    		
    	$tblSach->bind(JRequest:: get('post'));
    	var_dump($tblSach);
    	$tblSach->store();
    	
		
    	$this->display();
    }*/
    
   function save()
    {
        //JRequest::checkToken() or jexit('Invalid Token');
        $model = $this->getModel('itable');
		var_dump($model);
        $model->save();
    }

    function apply()
    {
        $this->save();
    }

    function cancel()
    {
        $mainframe = JFactory::getApplication();
        $mainframe->redirect('index.php?option=com_pos&view=itables');
    }
    
  
    
    
/*   public function save() {
    	$path= JPATH_COMPONENT_ADMINISTRATOR.DS.'tables';
    	JTable:: addIncludePath($path);
    	$tblSach= JTable:: getInstance("sachA","Table");
    		
    	$tblSach->bind(JRequest:: get('post'));
    		
    	$tblSach->store();
    		
    	$this->display();
    }
    */
    
   
    


}
