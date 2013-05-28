<?php
jimport('joomla.application.component.modeladmin');
class PosModelcomments extends JModelAdmin 
{
		public function getForm($data=array(),$loadData = true)
		{
			$form=$this->loadForm ("com_pos.comments","comments");
			if(empty($form)) return false;
			return $form;
		}
		
 		function countTagItems($id)
	    {
	    	$db = JFactory::getDBO();
	    	$query = "SELECT COUNT(*) FROM #__k2_tags_xref WHERE tagID = ".(int)$id;
	    	$db->setQuery($query);
	    	$result = $db->loadResult();
	    	return $result;
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
	    
	    	$query = "SELECT COUNT(*) FROM comment WHERE id>0";
	    
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
		function getData()
		{
	
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
	
	        $query = "SELECT * FROM comment WHERE 1=1";
	
	        if ($filter_state > -1)
	        {
	            $query .= " AND published={$filter_state}";
	        }
	
	        if ($search)
	        {
	            $escaped =$db->getEscaped($search, true);
				//$db->escape($search, true);
	            $query .= " AND LOWER( name ) LIKE ".$db->Quote('%'.$escaped.'%', false);
	            
	            //$db->Quote( '%'.$db->getEscaped( $search_teacher, true ).'%', false ).' OR '.
			//'tea.last_name LIKE'.$db->Quote( '%'.$db->getEscaped( $search_teacher, true ).'%', false );	;
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
}

?>