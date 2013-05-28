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

class PosControllercategory extends PosController
{
function uploadAttachments($id){
    $files = JRequest::getVar('attachment_file', array(), 'files', 'array');

    $params = JComponentHelper::getParams('com_mycomp');
	//echo file_put_contents("D:/test.txt","helloworld" );
    $sizes = $files['size'];
    $attachSize= $params->get('AttachmentMaxSize');
    $attachSize = $attachSize * 1000;
    for ($i = 0; $i < sizeof($sizes); $i++) {

        if( $sizes[$i] > $attachSize){
            $error=JText::_('Maximum upload size limit exceeded. Maximum upload size').' '.($attachSize!=0?$attachSize/1000:$attachSize).'kb';
        }
    }

    if(!empty($error)){
        $this->setError($error);
        return false;
    }

    $user = &JFactory::getUser();
    $app = &JFactory::getApplication();

    if(!$id){
        $this->setError(JText::_('You should save a valid order'));
        return false;
    }

    $folder_base_path = $params->get('attachmentfolderpath');
    $mode = (int)0755;
    $index_file_src_path = JPATH_SITE.DS.'media'.DS.'index.html';
    $index_file_dest_path = $folder_path.DS.'index.html';

    //lets check if this base path exisists
    if( !JFolder::exists($folder_base_path)){
        $this->setError(JText::_('Please set the correct path to upload files in params'));
        return false;
    }

    //if exists lets create products folder here
    $products_folder_path  = $folder_base_path.DS.'Files';
    if( !JFolder::exists($products_folder_path)){
        if(! (  JFolder::create($products_folder_path,$mode)
        && JFile::copy($index_file_src_path,$products_folder_path.DS.'index.html') ) ) {
            $this->setError(JText::_('Error in creating directory'));
            return false;
        }
    }

    //Lets move on now to create specific folders and store the files

    $folder_path = $products_folder_path.DS.$order_id;

    //check if folder for the current product exists and
    //if not a folder in name of 'prod_id' is created and index.html copied
    if( ! JFolder::exists($folder_path)){
        if(! (   JFolder::create($folder_path,$mode)
        && JFile::copy($index_file_src_path,$folder_path.DS.'index.html') ) ) {
            $this->setError(JText::_('Error in creating directory'));
            return false;
        }
    }

    foreach ($files as $k=>$l) {
            foreach ($l as $i=>$v) {
                if (!array_key_exists($i, $attachmentFiles))
                    $attachmentFiles[$i] = array();
                $attachmentFiles[$i][$k] = $v;
            }       
        }
    $maxNoOfFiles = $params->get('noOfAttachments',5);
    $i=1;
    foreach($attachmentFiles as $file){
    // upload the file as it is without rename , resize as it is.
    $file_src = $file['tmp_name'];
    $filename = JFile::makeSafe($file['name']);
    $save_path = $folder_path.DS.$filename;

            // check weather the file type is allowed (or) File type filter 
            $allowed_file_types = array('jpg','jpeg','png','gif','pdf','tiff','psd','zip','bmp');
    $fext = strtolower(JFile::getExt($filename));

    if((in_array($fext, $allowed_file_types) == true) && $file["tmp_name"] ){
        if(!JFile::upload($file_src, $save_path)) {
            $this->setError(JText::_('Error in uploading product files'));
            return false;
        } 
    }
    $i++;
    if($maxNoOfFiles<$i){
        break;
        }
    }
    return true;
}
    public function display($cachable = false, $urlparams = array())
    {
        JRequest::setVar('view', 'category');
        parent::display();
    }

   function save()
    {
        JRequest::checkToken() or jexit('Invalid Token');
        $model = $this->getModel('category');
		
		JRequest::get('post');
		//var_dump(JRequest::get('post') );
		//echo file_put_contents("D:/test.txt","helloworld" );
        $model->save();
      //  parent::display($tpl);
    }

    function apply()
    {
        $this->save();
    }

    function cancel()
    {
        $mainframe = JFactory::getApplication();
        $mainframe->redirect('index.php?option=com_pos&view=categories');
    }
}
