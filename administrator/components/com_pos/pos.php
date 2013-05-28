<?php
//ini_set('display_errors', 0);

$document = JFactory::getDocument();



JLoader::register('PosController', JPATH_COMPONENT.'/controllers/controller.php');
JLoader::register('PosView', JPATH_COMPONENT.'/views/view.php');
JLoader::register('PosModel', JPATH_COMPONENT.'/models/model.php');

$controller = JRequest::getWord('view','items');
$controller = JString::strtolower($controller);

JLoader::register('PosHelper', dirname(__FILE__) . '/helpers/pos.php');

require_once (JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php');
$classname = 'PosController'.$controller;
$controller = new $classname();
$controller->registerTask('saveAndNew', 'save');
$controller->execute(JRequest::getWord('task'));
$controller->redirect();

/*require(JPATH_COMPONENT_ADMINISTRATOR.'/controllers'.'/controller.php');
$cl= new SachController();
$cl->execute(JRequest::getvar('task','display'));
	*/
	
?>

