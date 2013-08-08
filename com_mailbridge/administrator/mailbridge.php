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

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_mailbridge')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');
require_once JPATH_COMPONENT . '/helpers/mailbridge.php';
$controller = JRequest::getWord('controller', JRequest::getVar('view'));
if ($controller == 'config') {
    require_once( JPATH_COMPONENT . DS . 'controllers' . DS . $controller . '.php');
    $classname = 'MailbridgeController' . $controller;
    $controller = new $classname( );
} else {
    $controller = JController::getInstance('Mailbridge');
}
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();


