<?php

/**
 * @version     1.0.1
 * @package     com_mailbridge
 * @copyright	Copyright (C) 2007 - 2013 Jurgen Gaeremyn, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author      jurgen.gaeremyn@pandora.be
 * @website		http://www.mailbridge.be
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View to edit
 */
class MailbridgeViewParameter extends JView
{
	protected $state;
	protected $item;
	protected $form;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->state	= $this->get('State');
		$this->item		= $this->get('Item');
		$this->form		= $this->get('Form');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
		}

		$this->addToolbar();
                 $input = JFactory::getApplication()->input;
                $view = $input->getCmd('view', '');
                MailbridgeHelper::addSubmenu($view);
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 */
	protected function addToolbar()
	{
		//JFactory::getApplication()->input->set('hidemainmenu', true);

		$user		= JFactory::getUser();
		$isNew		= ($this->item->id == 0);
       
		$canDo		= MailbridgeHelper::getActions();

		JToolBarHelper::title(JText::_('COM_MAILbridge_TITLE_PARAMETER'), 'parameter.png');

		JToolBarHelper::apply('parameter.apply', 'JTOOLBAR_APPLY');
			
		if (empty($this->item->id)) {
			JToolBarHelper::cancel('parameter.cancel', 'JTOOLBAR_CANCEL');
		}
		else {
			JToolBarHelper::cancel('parameter.cancel', 'JTOOLBAR_CLOSE');
		}
                
                if ($canDo->get('core.admin')) {
			JToolBarHelper::preferences('com_mailbridge');
		}

	}
}
