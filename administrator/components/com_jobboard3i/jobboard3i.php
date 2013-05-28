<?php
//ini_set('display_errors', 0);

$document = JFactory::getDocument();
JLoader::register('Jobboard3iController', JPATH_COMPONENT.'/controllers/controller.php');
JLoader::register('Jobboard3iView', JPATH_COMPONENT.'/views/view.php');
JLoader::register('Jobboard3iModel', JPATH_COMPONENT.'/models/model.php');

$controller = JRequest::getWord('view','jobs_items');
$controller = JString::strtolower($controller);

JLoader::register('Jobboard3iHelper', dirname(__FILE__) . '/helpers/jobboard3i.php');

require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'controllers'.DS.$controller.'.php');
$classname = 'Jobboard3iController'.$controller;
$controller = new $classname();
$controller->registerTask('saveAndNew', 'save');
$controller->execute(JRequest::getVar('task','display'));
$controller->redirect();

/*require(JPATH_COMPONENT_ADMINISTRATOR.'/controllers'.'/controller.php');
$cl= new SachController();
$cl->execute(JRequest::getvar('task','display'));
	*/
	
?>

