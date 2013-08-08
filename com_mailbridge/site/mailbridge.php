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

// Include dependancies
jimport('joomla.application.component.controller');


// Execute the task.
$controller	= JController::getInstance('Mailbridge');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
