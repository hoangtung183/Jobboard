<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

class AdminLGUIHelper {

    public static $vmAdminAreaStarted = false;
    public static $backEnd = true;

    /**
     * Start the administrator area table
     *
     * The entire administrator area with contained in a table which include the admin ribbon menu
     * in the left column and the content in the right column.  This function sets up the table and
     * displayes the admin menu in the left column.
     */
    static function startAdminArea($backEnd = true) {
        //if (JRequest::getWord ( 'format') =='pdf') return;
        //if (JRequest::getWord ( 'tmpl') =='component') self::$backEnd=false;
        //if(self::$vmAdminAreaStarted) return;
        //self::$vmAdminAreaStarted = true;
        //$front = JURI::root(true).'/components/com_virtuemart/assets/';
        $admin = JURI::root(true) . '/components/com_jobboard3i/assets/';

        $document = JFactory::getDocument();
        //loading defaut admin CSS
        $document->addStyleSheet($admin . 'css/admin_ui.css');
        $document->addStyleSheet($admin . 'css/admin_menu.css');
        $document->addStyleSheet($admin . 'css/admin.styles.css');
        $document->addStyleSheet($admin . 'css/toolbar_images.css');
        $document->addStyleSheet($admin . 'css/menu_images.css');
        $document->addStyleSheet($admin . 'css/template.css');
        $document->addScript($admin . 'js/jquery.coookie.js');
        $document->addScript($admin . 'js/vm2admin.js');
        $document->addScript($admin . 'js/jquery.js');
        $document->addScript($admin.'js/jquery.coookie.js');
         $document->addScript($admin.'js/jquery-1.9.1.js');
                  $document->addScript($admin.'js/jquery-ui.js');
        //if (JText::_('COM_VIRTUEMART_JS_STRINGS') == 'COM_VIRTUEMART_JS_STRINGS')
            $vm2string = "editImage: 'edit image',select_all_text: 'select all options',select_some_options_text: 'select some options'";
        //else
         //   $vm2string = JText::_('COM_VIRTUEMART_JS_STRINGS');
        $document->addScriptDeclaration("
//<![CDATA[
		var tip_image='" . JURI::root(true) . "/components/com_jobboard3i/assets/js/images/vtip_arrow.png';
		var vm2string ={" . $vm2string . "} ;
		 jQuery( function($) {

			$( '.admin-ui-menu' ).accordion();

		});
//]]>
		");
        ?>

        <?php if (!self::$backEnd) echo '<div class="toolbar" style="height: 84px;position: relative;">' . AdminLGUIHelper::getToolbar() . '</div>'; ?>
        <div class="virtuemart-admin-area">
            <?php
            // Include ALU System
            if (self::$backEnd) {
                //require_once JPATH_VM_ADMINISTRATOR.DS.'liveupdate'.DS.'liveupdate.php';
                ?>

                <div class="menu-wrapper"  style="float: left;width: 15%">
                    <!--<div><a href="#" ><div style="float: left; margin-right: 10px;">Open All  |</div></a><a href="#" ><div>Close All</div></a></div> -->
                    <a href="index.php?option=com_logistic" ><div class="menu-vmlogo" >Control Panel</div></a>
                    <?php AdminLGUIHelper::showAdminMenu();
                    ?>				
                </div>
            <?php } ?>
            <div id="admin-content-wrapper" style="float: left;width: 84%">
                <div class="toggler vmicon-show"></div>
                <div id="admin-content" class="admin-content">
                    <div id="admin-ui-tabs">
                        <div class="tabs" style="display:block">
                            <div id="cpanel">
                                <div class="icon"><?php AdminLGUIHelper::displayImageButton(JROUTE::_('index.php?option=com_logistic&view=product'), 'vm_config_48', JText::_('Setting')); ?></div>
                                <div class="icon"><?php AdminLGUIHelper::displayImageButton(JROUTE::_('index.php?option=com_logistic&view=product'), 'vm_shop_categories_48', JText::_('View Customers')); ?></div>
                                <div class="icon"><?php AdminLGUIHelper::displayImageButton(JROUTE::_('index.php?option=com_logistic&view=product'), 'vm_shop_configuration_48', JText::_('Add New Customer')); ?></div>
                                <div class="icon"><?php AdminLGUIHelper::displayImageButton(JROUTE::_('index.php?option=com_logistic&view=product'), 'vm_shop_help_48', JText::_('View Orders')); ?></div>
                                <div class="icon"><?php AdminLGUIHelper::displayImageButton(JROUTE::_('index.php?option=com_logistic&view=product'), 'vm_shop_mart_48', JText::_('Add New Order')); ?></div>
                                <div class="icon"><?php AdminLGUIHelper::displayImageButton(JROUTE::_('index.php?option=com_logistic&view=product'), 'vm_shop_orders_48', JText::_('In Store')); ?></div>
                                <div class="icon"><?php AdminLGUIHelper::displayImageButton(JROUTE::_('index.php?option=com_logistic&view=product'), 'vm_shop_payment_48', JText::_('Out Store')); ?></div>
                                <div class="icon"><?php AdminLGUIHelper::displayImageButton(JROUTE::_('index.php?option=com_logistic&view=product'), 'vm_shop_products_48', JText::_('Receive/Check')); ?></div>
                                <div class="icon"><?php AdminLGUIHelper::displayImageButton(JROUTE::_('index.php?option=com_logistic&view=product'), 'vm_shoppergroup_48', JText::_('Generate Reports')); ?></div>
                                <div class="icon"><?php AdminLGUIHelper::displayImageButton(JROUTE::_('index.php?option=com_logistic&view=product'), 'vm_vendor_48', JText::_('Track Orders')); ?></div>
                                <div class="icon"><?php AdminLGUIHelper::displayImageButton(JROUTE::_('index.php?option=com_logistic&view=product'), 'vm_usergroup_48', JText::_('Inquiry')); ?></div>
                                <div class="icon"><?php AdminLGUIHelper::displayImageButton(JROUTE::_('index.php?option=com_logistic&view=product'), 'vm_store_48', JText::_('Help')); ?></div>
                                <div class="clear"></div> 
                            </div>
                        </div></div></div>

                <?php
            }

            /**
             * Close out the adminstrator area table.
             * @author RickG, Max Milbers
             */
            static function endAdminArea() {
                if (!self::$backEnd)
                    return;
                self::$vmAdminAreaStarted = false;
                if (VmConfig::get('debug') == '1') {
                    //TODO maybe add debuggin again here
//		include(JPATH_VM_ADMINISTRATOR.'debug.php');
                }
                ?>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
        </div>

        <?php
    }

    /**
     * Admin UI Tabs
     * Gives A Tab Based Navigation Back And Loads The Templates With A Nice Design
     * @param $load_template = a key => value array. key = template name, value = Language File contraction
     * @params $cookieName = choose a cookiename or leave empty if you don't want cookie tabs in this place
     * @example 'shop' => 'COM_VIRTUEMART_ADMIN_CFG_SHOPTAB'
     */
    static function showAdminMenu() {
        ?>

        <div id="admin-ui-menu" class="admin-ui-menu">

            <h3 class="menu-title">
                <a href="#" ><span class="<?php echo 'vmicon vmicon-16-group' ?>"></span><?php echo JText::_('Settings') ?></a>
            </h3>

            <div class="menu-list">
                <ul>			
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-globe' ?>"></span><?php echo JText::_('General') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-gift_add' ?>"></span><?php echo JText::_('E-mail') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-gear_in' ?>"></span><?php echo JText::_('Language') ?></a>
                    </li>	
                </ul>
            </div>
            <h3 class="menu-title">
                <a href="#" ><span class="<?php echo 'vmicon vmicon-16-folder_wrench' ?>"></span><?php echo JText::_('Customers') ?></a>
            </h3>

            <div class="menu-list">
                <ul>			
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-folder_user' ?>"></span><?php echo JText::_('Add Customer') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-folder_image' ?>"></span><?php echo JText::_('View Customers') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-folder_camera' ?>"></span><?php echo JText::_('Search Customers') ?></a>
                    </li>	
                </ul>
            </div>
            <h3 class="menu-title">
                <a href="#" ><span class="<?php echo 'vmicon vmicon-16-folder' ?>"></span><?php echo JText::_('Manage Oders') ?></a>
            </h3>

            <div class="menu-list">
                <ul>			
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-film' ?>"></span><?php echo JText::_('Add New Order') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_zip' ?>"></span><?php echo JText::_('In Store') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_xls' ?>"></span><?php echo JText::_('Out Store') ?></a>
                    </li>
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_swf' ?>"></span><?php echo JText::_('Receive/Check') ?></a>
                    </li>
                </ul>
            </div>
            <h3 class="menu-title">
                <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_rar' ?>"></span><?php echo JText::_('Generate Reports') ?></a>
            </h3>
            <h3 class="menu-title">
                <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_png' ?>"></span><?php echo JText::_('Track Oders') ?></a>
            </h3>
            <h3 class="menu-title">
                <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_pdf' ?>"></span><?php echo JText::_('Inquiry') ?></a>
            </h3>
            <div class="menu-list">
                <ul>			
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_mpeg' ?>"></span><?php echo JText::_('Agying Stock') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_mp4' ?>"></span><?php echo JText::_('Warehouse') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_jpg' ?>"></span><?php echo JText::_('GRM') ?></a>
                    </li>
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_jpeg' ?>"></span><?php echo JText::_('GTM') ?></a>
                    </li>
                </ul>
            </div>
            <h3 class="menu-title">
                <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_html' ?>"></span><?php echo JText::_('Help') ?></a>
            </h3>

        </div>
        <?php
    }

    static public function buildTabs($view, $load_template = array(), $cookieName = '') {
        $cookieName = JRequest::getWord('view', 'logistic') . $cookieName;
        $document = JFactory::getDocument();
        $document->addScriptDeclaration('
		var logisticcookie="' . $cookieName . '";
		');

        $html = '<div id="admin-ui-tabs">';

        foreach ($load_template as $tab_content => $tab_title) {
            $html .= '<div class="tabs" title="' . JText::_($tab_title) . '">';
            $html .= $view->loadTemplate($tab_content);
            $html .= '<div class="clear"></div></div>';
        }
        $html .= '</div>';
        echo $html;
    }
    

    static function getToolbar() {

        // add required stylesheets from admin template
        $document = JFactory::getDocument();
        $document->addStyleSheet('administrator/templates/system/css/system.css');
        //now we add the necessary stylesheets from the administrator template
        //in this case i make reference to the bluestork default administrator template in joomla 1.6
        $document->addCustomTag(
                '<link href="administrator/templates/bluestork/css/template.css" rel="stylesheet" type="text/css" />' . "\n\n" .
                '<!--[if IE 7]>' . "\n" .
                '<link href="administrator/templates/bluestork/css/ie7.css" rel="stylesheet" type="text/css" />' . "\n" .
                '<![endif]-->' . "\n" .
                '<!--[if gte IE 8]>' . "\n\n" .
                '<link href="administrator/templates/bluestork/css/ie8.css" rel="stylesheet" type="text/css" />' . "\n" .
                '<![endif]-->' . "\n" .
                '<link rel="stylesheet" href="administrator/templates/bluestork/css/rounded.css" type="text/css" />' . "\n"
        );
        //load the JToolBar library and create a toolbar
        jimport('joomla.html.toolbar');
        JToolBarHelper::divider();
        JToolBarHelper::save();
        JToolBarHelper::apply();
        JToolBarHelper::cancel();
        $bar = new JToolBar('toolbar');
        //and make whatever calls you require
        $bar->appendButton('Standard', 'save', 'Save', 'save', false);
        $bar->appendButton('Separator');
        $bar->appendButton('Standard', 'cancel', 'Cancel', 'cancel', false);
        echo 'Logistic';
        //generate the html and return
        return $bar->render();
    }

    static public function displayImageButton($link, $imageclass, $text, $mainclass = 'vmicon48') {
        $button = '<a title="' . $text . '" href="' . $link . '">';
        $button .= '<span class="' . $mainclass . ' ' . $imageclass . '"></span>';
        $button .= '<br />' . $text . '</a>';
        echo $button;
    }

}
?>