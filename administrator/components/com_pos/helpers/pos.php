<?php
/**
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Content component helper.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_content
 * @since		1.6
 */
class PosHelper
{
	public static $extension = 'com_pos';

	/**
	 * Configure the Linkbar.
	 *
	 * @param	string	$vName	The name of the active view.
	 *
	 * @return	void
	 * @since	1.6
	 */
	public static function addSubmenu($vName)
	{
		JSubMenuHelper::addEntry(
			JText::_('Bàn ăn'),
			'index.php?option=com_pos&view=itable',
			$vName == 'itables'
		);
		JSubMenuHelper::addEntry(
			JText::_('Loại món ăn'),
			'index.php?option=com_pos&view=categories',
			$vName == 'categories');
		JSubMenuHelper::addEntry(
			JText::_('Món ăn'),
			'index.php?option=com_pos&view=items',
			$vName == 'items'
		);
		JSubMenuHelper::addEntry(
			JText::_('Hóa đơn'),
			'index.php?option=com_pos&view=invoices',
			$vName == 'invoices');
		JSubMenuHelper::addEntry(
			JText::_('Khách hàng'),
			'index.php?option=com_pos&view=khachhang',
			$vName == 'khachhang');
		JSubMenuHelper::addEntry(
			JText::_('Bình luận'),
			'index.php?option=com_pos&view=comments',
			$vName == 'comments');
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @param	int		The category ID.
	 * @param	int		The article ID.
	 *
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions($categoryId = 0, $articleId = 0)
	{
		// Reverted a change for version 2.5.6
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($articleId) && empty($categoryId)) {
			$assetName = 'com_content';
		}
		elseif (empty($articleId)) {
			$assetName = 'com_content.category.'.(int) $categoryId;
		}
		else {
			$assetName = 'com_content.article.'.(int) $articleId;
		}

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}


	
}
