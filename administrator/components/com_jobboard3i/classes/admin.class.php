<?php
/**
 * @version 1.0 $Id: admin.class.php 662 2008-05-09 22:28:53Z schlu $
 * @package DHF
 * @subpackage HotelManager
 * @copyright (C) 2008
 */

defined('_JEXEC') or die('Restricted access');

/**
 * Holds helpfull administration related stuff
 *
 * @package DHF
 * @subpackage HotelManager
 */
class ELAdmin {

	/**
	* Writes footer. Do not remove!
	*
	* @since 0.9
	*/
	function footer( )
	{

		echo 'Hotel Manager by <a href="http://www.dhfuture.com" target="_blank">Phạm Văn Dũng</a>';

	}

	function config()
	{
		$db =& JFactory::getDBO();
		$sql = 'SELECT * FROM #__hotels_settings WHERE id = 1';
		$db->setQuery($sql);
		$config = $db->loadObject();

		return $config;
	}
}

?>