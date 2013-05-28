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
        $admin = JURI::root(true) . '/administrator/components/com_jobboard3i/assets/';

        $document = JFactory::getDocument();
        //loading defaut admin CSS
        $document->addStyleSheet($admin . 'css/admin_ui.css');
        $document->addStyleSheet($admin . 'css/admin_menu.css');
        $document->addStyleSheet($admin . 'css/admin.styles.css');
        $document->addStyleSheet($admin . 'css/toolbar_images.css');
        $document->addStyleSheet($admin . 'css/menu_images.css');
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

                <div class="menu-wrapper"  style="float: left;width: 182px">
                    <!--<div><a href="#" ><div style="float: left; margin-right: 10px;">Open All  |</div></a><a href="#" ><div>Close All</div></a></div> -->
                    <!--<a href="index.php?option=com_logistic" ></a>-->
                    <?php AdminLGUIHelper::showAdminMenu();
                    ?>				
                </div>
            
           <?php } ?>
			<div id="admin-content-wrapper">
				<div id="admin-content" class="admin-content">
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
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-globe' ?>"></span><?php echo JText::_('Region') ?></a>
                    </li>	
                    <li>
                        <a href="index.php?option=com_jobboard3i&view=countries" ><span class="<?php echo 'vmicon vmicon-16-gift_add' ?>"></span><?php echo JText::_('National') ?></a>
                    </li>	
                    <li>
                        <a href="index.php?option=com_jobboard3i&view=cities" ><span class="<?php echo 'vmicon vmicon-16-gear_in' ?>"></span><?php echo JText::_('City') ?></a>
                    </li>
                    <li>
                        <a href="index.php?option=com_jobboard3i&view=currencies" ><span class="<?php echo 'vmicon vmicon-16-gear_in' ?>"></span><?php echo JText::_('Currency') ?></a>
                    </li>
                    <li>
                        <a href="index.php?option=com_jobboard3i&view=timezones" ><span class="<?php echo 'vmicon vmicon-16-gear_in' ?>"></span><?php echo JText::_('Time Zone') ?></a>
                    </li>
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-gear_in' ?>"></span><?php echo JText::_('Language') ?></a>
                    </li>	
                </ul>
            </div>
            <h3 class="menu-title">
                <a href="#" ><span class="<?php echo 'vmicon vmicon-16-folder_wrench' ?>"></span><?php echo JText::_('Job') ?></a>
            </h3>

            <div class="menu-list">
                <ul>			
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-folder_user' ?>"></span><?php echo JText::_('Job List') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-folder_image' ?>"></span><?php echo JText::_('Job Hot') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-folder_camera' ?>"></span><?php echo JText::_('Job New') ?></a>
                    </li>
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-folder_camera' ?>"></span><?php echo JText::_('Report/Client') ?></a>
                    </li>
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-folder_camera' ?>"></span><?php echo JText::_('Search') ?></a>
                    </li>
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-folder_camera' ?>"></span><?php echo JText::_('New Letter') ?></a>
                    </li>	
                </ul>
            </div>
            <h3 class="menu-title">
                <a href="#" ><span class="<?php echo 'vmicon vmicon-16-folder' ?>"></span><?php echo JText::_('Salary') ?></a>
            </h3>

            <div class="menu-list">
                <ul>			
                    <li>
                        <a href="index.php?option=com_jobboard3i&view=salaries" ><span class="<?php echo 'vmicon vmicon-16-film' ?>"></span><?php echo JText::_('Salary List') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_zip' ?>"></span><?php echo JText::_('Report/Client') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_xls' ?>"></span><?php echo JText::_('Search') ?></a>
                    </li>
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_swf' ?>"></span><?php echo JText::_('News Letter') ?></a>
                    </li>
                </ul>
            </div>
            <h3 class="menu-title">
                <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_rar' ?>"></span><?php echo JText::_('Review') ?></a>
            </h3>
            <div class="menu-list">
                <ul>			
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-film' ?>"></span><?php echo JText::_('Review List') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_zip' ?>"></span><?php echo JText::_('Search') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_xls' ?>"></span><?php echo JText::_('Report/Client') ?></a>
                    </li>
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_swf' ?>"></span><?php echo JText::_('News Letter') ?></a>
                    </li>
                </ul>
            </div>
            <h3 class="menu-title">
                <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_png' ?>"></span><?php echo JText::_('Interview') ?></a>
            </h3>
            <div class="menu-list">
                <ul>			
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-film' ?>"></span><?php echo JText::_('Interview List') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_zip' ?>"></span><?php echo JText::_('Search') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_xls' ?>"></span><?php echo JText::_('Report/Client') ?></a>
                    </li>
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_swf' ?>"></span><?php echo JText::_('News Letter') ?></a>
                    </li>
                </ul>
            </div>
            <h3 class="menu-title">
                <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_pdf' ?>"></span><?php echo JText::_('User') ?></a>
            </h3>
            <div class="menu-list">
                <ul>			
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_mpeg' ?>"></span><?php echo JText::_('User List') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_mp4' ?>"></span><?php echo JText::_('Search') ?></a>
                    </li>	
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_xls' ?>"></span><?php echo JText::_('Report/Client') ?></a>
                    </li>
                    <li>
                        <a href="#" ><span class="<?php echo 'vmicon vmicon-16-ext_swf' ?>"></span><?php echo JText::_('News Letter') ?></a>
                    </li>
                </ul>
            </div>
            

        </div>
        <?php
    }

   

}
?>