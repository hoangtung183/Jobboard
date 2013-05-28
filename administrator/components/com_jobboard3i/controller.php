<?php
/**
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Component Controller
 *
 * @package		Joomla.Administrator
 * @subpackage	com_content
 */
class Jobboard3iController extends JControllerLegacy
{
	/**
	 * @var		string	The default view.
	 * @since	1.6
	 */
	protected $default_view = 'jobs_items';

	/**
	 * Method to display a view.
	 *
	 * @param	boolean			If true, the view output will be cached
	 * @param	array			An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return	JController		This object to support chaining.
	 * @since	1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		// Load the submenu.
		Jobboard3iHelper::addSubmenu(JRequest::getCmd('view', 'jobs_items'));

		$view		= JRequest::getCmd('view', 'jobs_items');
		$layout 	= JRequest::getCmd('layout', 'jobs_items');
		$id			= JRequest::getInt('id');

		// Check for edit form.
		if ($view == 'jobs_items' && $layout == 'edit' && !$this->checkEditId('com_jobboard3i.edit.jobs_items', $id)) {
			// Somehow the person just went to the form - we don't allow that.
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_jobboard3i&view=jobs_items', false));

			return false;
		}

		parent::display();

		return $this;
	}
}
