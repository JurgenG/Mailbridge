<?php
/**
 * @version     1.0.0
 * @package     com_mailbridge
 * @copyright   Copyright (C) 2013 Jurgen Gaeremyn. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Nidhi Gupta <nidhi.gupta@daffodilsw.com> - http://www.daffodilsw.com
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