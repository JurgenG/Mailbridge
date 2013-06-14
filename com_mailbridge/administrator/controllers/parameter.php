<?php
/**
 * @version     1.0.0
 * @package     com_mailbridge
 * @copyright   
 * @license     
 * @author      nidhi <nidhi.gupta@daffodilsw.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Parameter controller class.
 */
class MailbridgeControllerParameter extends JControllerForm
{

    function __construct() {
        $this->view_list = 'parameters';
        parent::__construct();
    }

}