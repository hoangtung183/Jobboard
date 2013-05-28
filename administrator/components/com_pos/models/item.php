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

JTable::addIncludePath(JPATH_COMPONENT.DS.'pos');

class PosModelitem extends JModel {

	/*public function getForm($data=array(),$loadData = true){
		$form=$this->loadForm ("com_pos.item","items");
		if(empty($form)) return false;
		return $form;
	}*/
	
	
	
    function getData()
    {
        $cid = JRequest::getVar('cid');
        $row = JTable::getInstance('item', 'Table');
        $row->load($cid);
        return $row;
    }

   function save()
    {

        $mainframe = JFactory::getApplication();
      
	    //---------------custom to insert manual------//
		$cid = JRequest::getVar('cid');
		
        $row= JTable:: getInstance("item","Table");
		$name= JRequest::getVar('name');
		$email= JRequest::getVar('email');
		
		$db1 = JFactory::getDBO();
        $db1->setQuery($query1);
		$result1 = $db1->loadResult();
		//------------------------------------------------
		
        if (!$row->bind(JRequest::get('post')))
        {
            $mainframe->redirect('index.php?option=com_pos&view=item', $row->getError(), 'error');
        }

        if (!$row->check())
        {
            $mainframe->redirect('index.php?option=com_pos&view=item&cid='.$row->id, $row->getError(), 'error');
        }

        if (!$row->store())
        {
            $mainframe->redirect('index.php?option=com_pos&view=item', $row->getError(), 'error');
        }
		

        $cache = JFactory::getCache('com_pos');
        $cache->clean();

        switch(JRequest::getCmd('task'))
        {
            case 'apply' :
                $msg = JText::_('K2_CHANGES_TO_TAG_SAVED');
                $link = 'index.php?option=com_pos&view=item&cid='.$row->id;
                break;
            case 'save' :
            default :
                $msg = JText::_('K2_TAG_SAVED');
                $link = 'index.php?option=com_pos&view=items';
                break;
        }
        $mainframe->redirect($link, $msg);
    }

    function addTag()
    {

        $mainframe = JFactory::getApplication();

        $user = JFactory::getUser();
        $params = JComponentHelper::getParams('com_pos');
        if ($user->gid < 24 && $params->get('lockTags'))
            JError::raiseError(403, JText::_('K2_ALERTNOTAUTH'));

        $tag = JRequest::getString('item');
        $tag = str_replace('-', '', $tag);
        $tag = str_replace('.', '', $tag);

        $response = new JObject;
        $response->set('name', $tag);

        require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'lib'.DS.'JSON.php');
        $json = new Services_JSON;

        if (empty($tag))
        {
            $response->set('msg', JText::_('K2_YOU_NEED_TO_ENTER_A_TAG', true));
            echo $json->encode($response);
            $mainframe->close();
        }

        $db = JFactory::getDBO();
        $query = "SELECT COUNT(*) FROM #__k2_tags WHERE name=".$db->Quote($tag);
        $db->setQuery($query);
        $result = $db->loadResult();

        if ($result > 0)
        {
            $response->set('msg', JText::_('K2_TAG_ALREADY_EXISTS', true));
            echo $json->encode($response);
            $mainframe->close();
        }

        $row = JTable::getInstance('K2Tag', 'Table');
        $row->name = $tag;
        $row->published = 1;
        $row->store();

        $cache = JFactory::getCache('com_k2');
        $cache->clean();

        $response->set('id', $row->id);
        $response->set('status', 'success');
        $response->set('msg', JText::_('K2_TAG_ADDED_TO_AVAILABLE_TAGS_LIST', true));
        echo $json->encode($response);

        $mainframe->close();

    }

    function tags()
    {
        $mainframe = JFactory::getApplication();
        $db = JFactory::getDBO();
        $word = JRequest::getString('q', null);
        if (K2_JVERSION == '15')
        {
            $word = $db->Quote($db->getEscaped($word, true).'%', false);
        }
        else
        {
            $word = $db->Quote($db->escape($word, true).'%', false);
        }
        $query = "SELECT name FROM #__k2_tags WHERE name LIKE ".$word;
        $db->setQuery($query);
        $result = K2_JVERSION == '30' ? $db->loadColumn() : $db->loadResultArray();
        require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'lib'.DS.'JSON.php');
        $json = new Services_JSON;
        echo $json->encode($result);
        $mainframe->close();
    }

}
