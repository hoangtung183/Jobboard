<?php
jimport('joomla.application.component.view');

class JobBoard3iViewAfterLogin extends JView {
    /* override phương thức display() của JView */

    function display() 
    {        
        $this->defaultView();
        parent::display();
    }
    private function defaultView(){
      // $this->assignRef("rows", $this->get('Input'));
        $this->setLayout('default');
    }
}
?>
