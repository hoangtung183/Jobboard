<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * HTML View class for the UpdHelloWorld Component
 */
class JobBoard3iViewPostJobs extends JView
{
        // Overwriting JView display method
        function display($tpl = null) 
        {
           /* $wysiwyg = JFactory::getEditor();
                $onSave = '';
  
   if (JString::strlen($company->fulltext) > 1)
   {
    $textValue = $company->introtext."<hr id=\"system-readmore\" />".$company->fulltext;
   }
   else
   {
    $textValue = $company->introtext;
   }
   $text = $wysiwyg->display('text', $textValue, '300px', '200px', '', '');
   $this->assignRef('text', $text);*/
                parent::display($tpl);
        }
}