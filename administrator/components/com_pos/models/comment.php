
<?php

?>

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

jimport('joomla.application.component.modeladmin');

JTable::addIncludePath(JPATH_COMPONENT.DS.'pos');

class PosModelcomment extends JModelAdmin {

	public function getForm($data=array(),$loadData = true)
	{
		$form = $this->loadForm("com_pos.comment","comment");
		if(empty($form)) return false;
		return $form;
	}

    function getData()
    {	
        $cid = JRequest::getVar('cid');
        
        $row = JTable::getInstance('comment', 'Table');
        $row->load($cid);
        return $row;
    }
   function save()
    {	
		//file_put_contents("D:/test.txt","hello world11111" );
    	$mainframe = JFactory::getApplication();
        jimport('joomla.filesystem.file');
        require_once (JPATH_COMPONENT.DS.'lib'.DS.'class.upload.php');
        //$row = JTable::getInstance('comment', 'Table');
        //$row1 = JTable::getInstance('Media', 'Table');
        $params = JComponentHelper::getParams('com_pos');
        
 
	    //---------------custom to insert manual------//
		$cid = JRequest::getVar('cid');
        $row= JTable:: getInstance("comment","Table");
		
		//------------------------------------------------
		
        if (!$row->bind(JRequest::get('post')))
        {
            $mainframe->redirect('index.php?option=com_pos&view=comment', $row->getError(), 'error');
        }

        if (!$row->check())
        {
            $mainframe->redirect('index.php?option=com_pos&view=comment&cid='.$row->comment_id, $row->getError(), 'error');
        }

        if (!$row->store())
        {
            $mainframe->redirect('index.php?option=com_pos&view=commentxx', $row->getError(), 'error');
        }
		
	   	 	$files = JRequest::get('files');
			$path = JPATH_ROOT.DS.'media'.DS.'pos'.DS.'categories'.DS;
	       	$files=JRequest::get('files');
	    	if(count($_FILES["item_file"]['name'])>0) { //check if any file uploaded
			$GLOBALS['msg'] = ""; //initiate the global message
			for($j=0; $j < count($_FILES["item_file"]['name']); $j++) { //loop the uploaded file array
			$filen = $_FILES["item_file"]['name']["$j"]; //file name
			$path = $path.$filen; //generate the destination path
			if(move_uploaded_file($_FILES["item_file"]['tmp_name']["$j"],$path)) { //upload the file
			$GLOBALS['msg'] .= "File# ".($j+1)." ($filen) uploaded successfully<br>"; //Success message	
		}
		}
		}
		
		$row1 = JTable::getInstance('media', 'Table');
		
		$name=$_FILES["item_file"]['name'][0];
       if (!$row1->bind(JRequest::get('post')))
        {
            $mainframe->redirect('index.php?option=com_pos&view=comment', $row1->getError(), 'error');
        }

        if (!$row1->check())
        {
            $mainframe->redirect('index.php?option=com_pos&view=comment&cid='.$row1->id, $row1->getError(), 'error');
        }
        if (!$row1->store())
        {
            $mainframe->redirect('index.php?option=com_pos&view=categoriexxxxx', $row1->getError(), 'error');
        }
        
         $db = JFactory::getDBO();
         file_put_contents("C:/test.txt","hello world" );
         $query1 = "SELECT *   FROM comment WHERE comment_id=(SELECT MAX(comment_id) FROM comment)";
         $query2= "SELECT * FROM media WHERE media_id=(SELECT MAX(media_id) FROM media) ";
       //  $db1->setQuery($query1);
      //   $db2->setQuery($query2);
       //  $rows_comment = $db1->loadObject();
      //   $rows_media=$db2->loadObject();
        	
       
    	$row2 = JTable::getInstance('media_comment', 'Table'); 
    	
    	$comment_id=$rows_comment->comment_id;
    	$media_id=$rows_media->media_id;
    	
    	
		/*$from = array( 'comment_id'        => 6,
               'comment'  => 'abc',
               'media_id'  => 2,
               'description' => 'hhh'
             );*/
    	
    	
    	//$id = $this->getLastId();
    	 $db = JFactory::getDBO();
    	$mssql_query = "INSERT INTO comment(name,description,create_time,update_time) VALUES('ca','ca','2013-04-04','2013-04-04')" ;	
		$result1 = mssql_query($mssql_query) or die(" checking sql statement");
    	$result = mssql_fetch_assoc(mssql_query("select @@IDENTITY as id"));
    	
   		$id=$result['id'];
   		file_put_contents("D:/test.txt","hello world == ".$id );
	//	echo $id;
	/*
		function getLastId() {
    	$result = mssql_fetch_assoc(mssql_query("select @@IDENTITY as id"));
   		return $result['id'];
		}
    	*/
    	//file_put_contents("D:/test.txt","hello world == ".$id );
		$array=array('comment_id'=>$id,
						'media_id'=>$media_id
				);
       if (!$row2->bind($array))
        {
            $mainframe->redirect('index.php?option=com_pos&view=comment', $row2->getError(), 'error');
        }

        if (!$row2->check())
        {
            $mainframe->redirect('index.php?option=com_pos&view=comment&cid='.$row2->id, $row2->getError(), 'error');
        }
        if (!$row2->store())
        {
            $mainframe->redirect('index.php?option=com_pos&view=categorieyyyy', $row2->getError(), 'error');
        }
        
        
        $cache = JFactory::getCache('com_pos');
        $cache->clean();

        switch(JRequest::getCmd('task'))
        {
            case 'apply' :
                $msg = JText::_('K2_CHANGES_TO_TAG_SAVED');
                $link = 'index.php?option=com_pos&view=comment&cid='.$row->id;
                break;
            case 'save' :
            default :
                $msg = JText::_('K2_TAG_SAVED');
                $link = 'index.php?option=com_pos&view=categories';
                break;
        }
        $mainframe->redirect($link, $msg);
      
    }
	function getLastId() 
	{
    	$result = mssql_fetch_assoc(mssql_query("select @@IDENTITY as id"));
   		return $result['id'];
	}
    
}

