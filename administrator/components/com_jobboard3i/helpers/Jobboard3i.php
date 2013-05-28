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
class Jobboard3iHelper
{
	public static $extension = 'com_jobboard3i';

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
			JText::_('CONGVIEC'),
			'index.php?option=com_jobboard3i&view=jobs_items',
			$vName == 'jobs_items'
		);
		JSubMenuHelper::addEntry(
			JText::_('LOAICONGVIEC'),
			'index.php?option=com_pos&view=jobs_categories',
			$vName == 'jobs_categories');
		JSubMenuHelper::addEntry(
			JText::_('CONGTY'),
			'index.php?option=com_pos&view=companies',
			$vName == 'companies'
		);
		JSubMenuHelper::addEntry(
			JText::_('PHONGVAN'),
			'index.php?option=com_pos&view=interviews',
			$vName == 'interviews');
		JSubMenuHelper::addEntry(
			JText::_('DANHGIA'),
			'index.php?option=com_pos&view=reviews',
			$vName == 'reviews');
			
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
