
<?php
	jimport('joomla.application.component.modeladmin');
	
	class PosModelitables extends JModelAdmin {
	
		public function getForm($data=array(),$loadData = true){
			$form=$this->loadForm ("com_pos.itables","itables");
			if(empty($form)) return false;
			return $form;
		}
		
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
	
	        $query = "SELECT * FROM itable WHERE 1=1";
	
	        if ($filter_state > -1)
	        {
	            $query .= " AND published={$filter_state}";
	        }
	
	        if ($search)
	        {
	            $escaped =$db->getEscaped($search, true);
				//$db->escape($search, true);
	            $query .= " AND LOWER( code_table ) LIKE ".$db->Quote('%'.$escaped.'%', false);
	        }
	
	        if (!$filter_order)
	        {
	            $filter_order = "name";
	        }
	
	       // $query .= " ORDER BY {$filter_order} {$filter_order_Dir}";
	
	        $db->setQuery($query);
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
	    
	    	$query = "SELECT COUNT(*) FROM itables WHERE id>0";
	    
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
	    
	    function countTagItems($id)
	    {
	    	$db = JFactory::getDBO();
	    	$query = "SELECT COUNT(*) FROM #__k2_tags_xref WHERE tagID = ".(int)$id;
	    	$db->setQuery($query);
	    	$result = $db->loadResult();
	    	return $result;
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
	    	$row = JTable::getInstance('K2Tag', 'Table');
	    	foreach ($cid as $id)
	    	{
	    		$row->load($id);
	    		$row->publish($id, 0);
	    	}
	    	$cache = JFactory::getCache('com_sach');
	    	$cache->clean();
	    	$mainframe->redirect('index.php?option=com_sach');
	    }
	    
	    function remove()
	    {
	    
		
	    	$mainframe = JFactory::getApplication();
	    	$db = JFactory::getDBO();
	    	$cid = JRequest::getVar('cid');
	    	$row = JTable::getInstance('itable', 'Table');
	    	foreach ($cid as $id)
	    	{
	    		$row->load($id);
	    		$row->delete($id);
	    	}
	    	$cache = JFactory::getCache('com_pos');
	    	$cache->clean();
	    	$mainframe->redirect('index.php?option=com_pos&view=itables', JText::_('K2_DELETE_COMPLETED'));
			
			/*
			$mainframe = JFactory::getApplication();
			$db1 = JFactory::getDBO();
			$cid = JRequest::getVar('cid');
			var_dump($cid);
			foreach ($cid as $id)
	    	{
	    		
	    		
	    	
			
			//if (!$user->authorise('core.edit.state', 'com_contact.category.'.(int) $itable->catid)) {
				// Prune itables that you can't change.
			//	unset($ids[$i]);
				
				//JError::raiseNotice(403, JText::_('JLIB_APPLICATION_ERROR_EDITSTATE_NOT_PERMITTED'));
				$query1= "DELETE itabless where id=". $id;
				
				$db1->setQuery($query1);
				$result1 = $db1->loadResult();
				
			//}
		
			//$query1="insert into itabless (name, email) values ('thuanxxxx','thuanyyyyyyyyyyyy')";
			
			}
		*/
       
		
			
	    }
	    
	   
	  
	     
	}

?>
