
<?php
	jimport('joomla.application.component.model');
	JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');
	class Jobboard3iModelJobs_categories extends JModel {
		function getData(){
	
	        $mainframe = JFactory::getApplication();
	        $option = JRequest::getCmd('option');
	        $view = JRequest::getCmd('view');
	        $db = JFactory::getDBO();
	        $limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
	        $limitstart = $mainframe->getUserStateFromRequest($option.$view.'.limitstart', 'limitstart', 0, 'int');
	        $filter_order = $mainframe->getUserStateFromRequest($option.$view.'filter_order', 'filter_order', 'id', 'cmd');
	        $filter_order_Dir = $mainframe->getUserStateFromRequest($option.$view.'filter_order_Dir', 'filter_order_Dir', 'DESC', 'word');
	        $filter_state = $mainframe->getUserStateFromRequest($option.$view.'filter_state', 'filter_state', -1, 'int');
	        $search = $mainframe->getUserStateFromRequest($option.$view.'search', 'search', '', 'string');
	       
	        $search = JString::strtolower($search);
	
	        $query = "SELECT * FROM #__jb_jobs_categories";
	        $conditions = array();

			if ($filter_state > -1)
			{
				$conditions[] = "published={$filter_state}";
			}
			if ($search)
			{
				$escaped = K2_JVERSION == '15' ? $db->getEscaped($search, true) : $db->escape($search, true);
				$conditions[] = "LOWER( name ) LIKE ".$db->Quote('%'.$escaped.'%', false);
			}
	
			if (count($conditions))
			{
				$query .= " WHERE ".implode(' AND ', $conditions);
			}
	
			if (!$filter_order)
			{
				$filter_order = "name";
			}
	
			$query .= " ORDER BY id {$filter_order_Dir}";
			//echo file_put_contents("D:/test.txt","limit la:".$query);
		
	        $db->setQuery($query, $limitstart, $limit);
	        $rows = $db->loadObjectList();
	        return $rows;
	    }
	    function getTotal()
	    {
	    
	    	$mainframe = JFactory::getApplication();
	    	$option = JRequest::getCmd('option');
	    	$view = JRequest::getCmd('view');
	    	$db = JFactory::getDBO();
	    	$limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
	    	$limitstart = $mainframe->getUserStateFromRequest($option.'.limitstart', 'limitstart', 0, 'int');
	    	$filter_state = $mainframe->getUserStateFromRequest($option.$view.'filter_state', 'filter_state', 1, 'int');
	    	$search = $mainframe->getUserStateFromRequest($option.$view.'search', 'search', '', 'string');
	    	$search = JString::strtolower($search);
	    
	    	$query = "SELECT COUNT(*) FROM #__jb_jobs_categories WHERE id>0";
	    
	    	if ($filter_state > -1)
	    	{
	    		$query .= " AND published={$filter_state}";
	    	}
	    
	    	if ($search)
	    	{
	    		$escaped = K2_JVERSION == '15' ? $db->getEscaped($search, true) : $db->escape($search, true);
	    		$query .= " AND LOWER( name ) LIKE ".$db->Quote('%'.$escaped.'%', false);
	    	}
	    
	    	$db->setQuery($query);
	    	$total = $db->loadresult();
	    	return $total;
	    }
	
	    /*function publish()
	    {
	    
	    	$mainframe = JFactory::getApplication();
	    	$cid = JRequest::getVar('cid');
	    	$row = JTable::getInstance('K2Tag', 'Table');
	    	foreach ($cid as $id)
	    	{
	    		$row->load($id);
	    		$row->publish($id, 1);
	    	}
	    	$cache = JFactory::getCache('com_sach');
	    	$cache->clean();
	    	$mainframe->redirect('index.php?option=com_sach');
	    }*/
	    
	    function unpublish()
	    {
	    
	    	$mainframe = JFactory::getApplication();
	    	$cid = JRequest::getVar('cid');
	    	$row = JTable::getInstance('jb_jobs_categories', 'Table');
	    	foreach ($cid as $id)
	    	{
	    		$row->load($id);
	    		$row->publish($id, 0);
	    	}
	    	$cache = JFactory::getCache('com_pos');
	    	$cache->clean();
	    	$mainframe->redirect('index.php?option=com_jobboard3i&view=jobs_categories');
	    }
	    
	    function remove()
	    {
	    
	    	$mainframe = JFactory::getApplication();
	    	$db = JFactory::getDBO();
	    	$cid = JRequest::getVar('cid');
	    	$row = JTable::getInstance('jobs_category', 'Table');
	    	foreach ($cid as $id)
	    	{
	    		$row->load($id);
	    		$row->delete($id);
	    	}
	    	$cache = JFactory::getCache('com_jobboard3i');
	    	$cache->clean();
	    	$mainframe->redirect('index.php?option=com_jobboard3i&view=jobs_categories', JText::_('K2_DELETE_COMPLETED'));
					
	    }
     
	}

?>
