<?php
/**
 * @version     1.0.0
 * @package     com_mailbridge
 * @copyright   
 * @license     
 * @author      nidhi <nidhi.gupta@daffodilsw.com> - http://
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');


// Execute the task.
$controller	= JController::getInstance('Mailbridge');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
