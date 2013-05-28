<?php
defined('_JEXEC') or die; 
// Include dependancy of the main controllerform class
jimport('joomla.application.component.controllerform');
class Jobboard3iControllerPostJobs extends JControllerForm
{
   function save(){
       $this->setRedirect('index.php?option=com_jobboard3i & view=postjobs'); 
       return true  ;
   } 
}