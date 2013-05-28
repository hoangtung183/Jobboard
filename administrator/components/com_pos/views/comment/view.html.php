<?php
	jimport('joomla.application.component.view');
	
	class PosViewcomment extends JView {
		

	function display($tpl=null){
   
		$task=JRequest::getVar("task");
		switch($task){
		   case 'save':
		     $this->defaultView();
		     $this->editToolbar();
		     break;
		   default:
		     $this->defaultView();
		     $this->defaultToolbar();
		    
		   }
		   
		   parent::display($tpl);
		   
		  }
		   
		   
		  function editToolbar(){
		   JToolBarHelper::addNew();
		  } 

		  
		  
		  
		  
		  
		  /*
		  function editView(){
		   ?> 
		    <form name="adminForm" method="post" action="?option=com_sach&view=SachA">
		     <input type="hidden" name="task">
		     
		     Báº¡n Ä‘Ã£ nháº­p: <?php echo JRequest::getVar('name');?></br>
		        <?php echo "ten description la:".JRequest::getVar("description")?></br>
		        <?php   $files = JRequest::get('files'); 
		          echo "ten anh la:"?>
		          
		          
		        <?php 
		        		$files=JRequest::get('files');
				       // if(count($_FILES["item_file"]['name'])>0) { //check if any file uploaded
						$GLOBALS['msg'] = ""; //initiate the global message
						for($j=0; $j < count($files["item_file"]['name']); $j++) { //loop the uploaded file array
							$filen = $files["item_file"]['name']["$j"]."</br>";
							
							echo $filen;
							//$path = 'uploads/'.$filen; //generate the destination path
							//if(move_uploaded_file($_FILES["item_file"]['tmp_name']["$j"],$path)) { //upload the file
							//$GLOBALS['msg'] .= "File# ".($j+1)." ($filen) uploaded successfully<br>"; //Success message
						}
		
	
				?>
		   
		   <?php 
		  }
		   
		   */
		  function defaultToolbar(){
		   JToolBarHelper::title($title, 'k2.png');
		   JToolBarHelper::save();
		   JToolBarHelper::apply();
		   JToolBarHelper::cancel();
		   
		  }
  
  		function defaultView(){
			$mainframe = JFactory::getApplication();
			JRequest::setVar('hidemainmenu', 1);
		
			$this->assignRef("form",$this->get('Form'));
			$this->setLayout('edit');
			$model = $this->getModel();
			$category = $model->getData();
			JFilterOutput::objectHTMLSafe($category);
			if (!$category->id)
				$category->published = 1;	
			$this->assignRef('row', $category);
			$lists = array();
			$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $category->published);
			$this->assignRef('lists', $lists);
			
			(JRequest::getInt('cid')) ? $title = JText::_('EDIT') : $title = JText::_('ADD');
			JToolBarHelper::title($title, 'k2.png');
			JToolBarHelper::save();
			JToolBarHelper::apply();
			JToolBarHelper::cancel();
			
			$js = "
				function elSelectImage(image, imagename) {
				document.getElementById('a_image').value = image;
				document.getElementById('a_imagename').value = imagename;
				document.getElementById('imagelib').src = '../images/hotels/hotel_pics/' + image;
				document.getElementById('sbox-window').close();
			}";
			
			//parent::display($tpl);			
		}
		}
?>

