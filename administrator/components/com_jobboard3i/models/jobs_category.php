
<?php
/**
 * @version		$Id: tag.php 1812 2013-01-14 18:45:06Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2013 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die ;

jimport('joomla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class Jobboard3iModelJobs_category extends JModel {
	
	function getSelectBox()
	{
		$db = JFactory::getDbo();
		$sql="SELECT itable_id AS value, code_table AS text FROM itable";
		$db->setQuery($sql);
		
		$return=JHtml::_('select.genericlist', $db->loadObjectList(), $this->code_table , trim($attr));
		return $return;
	}

    function getData()
    {	
        $cid = JRequest::getVar('cid');
        
        $row = JTable::getInstance('jb_jobs_categories', 'Table');
        $row->load($cid);
        return $row;
    }
  
    
   function save()
    {	

    	$mainframe = JFactory::getApplication();
        $params = JComponentHelper::getParams('com_jobboard3i');
        
	    //---------------custom to insert manual------//
		$cid = JRequest::getVar('cid');
         $row= JTable:: getInstance("jb_jobs_categories","Table");
        
		//echo file_put_contents("C:/test.txt",$row);
		//------------------------------------------------
		
        if (!$row->bind(JRequest::get('post')))
        {
            $mainframe->redirect('index.php?option=com_jobboard3i&view=jobs_category', $row->getError(), 'error');
        }

        if (!$row->check())
        {
            $mainframe->redirect('index.php?option=com_jobboard3i&view=jobs_category&cid='.$row->id, $row->getError(), 'error');
        }

        if (!$row->store())
        {
            $mainframe->redirect('index.php?option=com_jobboard3i&view=jobs_categories', $row->getError(), 'error');
        }
        
        $cache = JFactory::getCache('com_jobboard3i');
        $cache->clean();

        switch(JRequest::getCmd('task'))
        {
            case 'apply' :
                $msg = JText::_('K2_CHANGES_TO_TAG_SAVED');
                $link = 'index.php?option=com_jobboard3i&view=jobs_category&cid='.$row->id;
                break;
            case 'save' :
            default :
                $msg = JText::_('K2_TAG_SAVED');
                $link = 'index.php?option=com_jobboard3i&view=jobs_categories';
                break;
        }
        $mainframe->redirect($link, $msg);
	}

}

