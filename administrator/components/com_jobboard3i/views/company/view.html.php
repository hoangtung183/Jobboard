<?php
jimport('joomla.application.component.view');

class Jobboard3iViewCompany extends JView {

	function display($tpl=null){
            
		$mainframe = JFactory::getApplication();
		JRequest::setVar('hidemainmenu', 1);
		$model = $this->getModel();
		$company= $model->getData();
		$document = JFactory::getDocument();
		//JFilterOutput::objectHTMLSafe($category);
		if (!$company->id)
			$company->published = 1;
		$this->assignRef('row', $company);
		
		$wysiwyg = JFactory::getEditor();
		$onSave = '';
		
			if (JString::strlen($company->fulltext) > 1)
			{
				$textValue = $company->introtext."<hr id=\"system-readmore\" />".$company->fulltext;
			}
			else
			{
				$textValue = $company->introtext;
			}
			$texts = $wysiwyg->display('description', $textValue, '100%', '200px', '', '');
			$this->assignRef('texts', $texts);
			
			$onSave = $wysiwyg->save('description');
			$document->addScriptDeclaration("function onK2EditorSave(){ ".$onSave." }");
		//$rows=$model->getImages();
			//$this->assignRef('rows', $rows);
			
		$lists = array();
		$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $currency->published);
		$this->assignRef('lists', $lists);
			
		(JRequest::getInt('cid')) ? $title = JText::_('EDIT') : $title = JText::_('ADD');
		JToolBarHelper::title(JText::_('CONGTY'));
		JToolBarHelper::save();
		JToolBarHelper::apply();
		JToolBarHelper::cancel();
		JToolBarHelper::deleteList('', 'remove', 'DELETE');
		
		
		parent::display($tpl);
	}
}
?>

