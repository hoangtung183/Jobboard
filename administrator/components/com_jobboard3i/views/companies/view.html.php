
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
ini_set('display_errors', 0);
defined('_JEXEC') or die ;
	jimport('joomla.application.component.view');
	class Jobboard3iViewCompanies extends JView {
		
		function display($tpl=null){
			
			$mainframe = JFactory::getApplication();
			$user = JFactory::getUser();
			$option = JRequest::getCmd('option');
			$view = JRequest::getCmd('view');
			$limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
			$limitstart = $mainframe->getUserStateFromRequest($option.$view.'.limitstart', 'limitstart', 0, 'int');
			$filter_order = $mainframe->getUserStateFromRequest($option.$view.'filter_order', 'filter_order', 'category_id', 'cmd');
			$filter_order_Dir = $mainframe->getUserStateFromRequest($option.$view.'filter_order_Dir', 'filter_order_Dir', 'DESC', 'word');
			$filter_state = $mainframe->getUserStateFromRequest($option.$view.'filter_state', 'filter_state', -1, 'int');
			$search = $mainframe->getUserStateFromRequest($option.$view.'search', 'search', '', 'string');
			$search = JString::strtolower($search);
			$model = $this->getModel();
			$total = $model->getTotal();
			$task = JRequest::getCmd('task');
			if ($limitstart > $total - $limit)
			{
				$limitstart = max(0, (int)(ceil($total / $limit) - 1) * $limit);
				JRequest::setVar('limitstart', $limitstart);
			}
			$tags = $model->getData();
			//foreach ($tags as $key => $tag)
			//{
			//	$tag->numOfItems = $model->countTagItems($tag->id);
			//	$tag->status = K2_JVERSION == '15' ? JHTML::_('grid.published', $tag, $key) : JHtml::_('jgrid.published', $tag->published, $key, '', $task != 'element');
			//}
			$this->assignRef('rows', $tags);
			
			jimport('joomla.html.pagination');
			$pageNav = new JPagination($total, $limitstart, $limit);
			$this->assignRef('page', $pageNav);
			
			$lists = array();
			$lists['search'] = $search;
			$lists['order_Dir'] = $filter_order_Dir;
			$lists['order'] = $filter_order;
			$filter_state_options[] = JHTML::_('select.option', -1, JText::_('K2_SELECT_STATE'));
			$filter_state_options[] = JHTML::_('select.option', 1, JText::_('K2_PUBLISHED'));
			$filter_state_options[] = JHTML::_('select.option', 0, JText::_('K2_UNPUBLISHED'));
			$lists['state'] = JHTML::_('select.genericlist', $filter_state_options, 'filter_state', '', 'value', 'text', $filter_state);
			$this->assignRef('lists', $lists);
			JToolBarHelper::title(JText::_('CONGTY'));
        	JToolBarHelper::publishList();
        	JToolBarHelper::unpublishList();
        	JToolBarHelper::deleteList('', 'remove', 'DELETE');
        	JToolBarHelper::editList();
        	JToolBarHelper::addNew();
        	$this->loadHelper('html');
			parent::display($tpl);	
		}
	}
?>

