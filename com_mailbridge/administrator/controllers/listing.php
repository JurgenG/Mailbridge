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
 * Listing controller class.
 */
class MailbridgeControllerListing extends JControllerForm
{

    function __construct() {
        $this->view_list = 'listings';
        parent::__construct();
    }

}