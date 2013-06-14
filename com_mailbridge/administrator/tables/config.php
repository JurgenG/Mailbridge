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

/**
 * parameter Table class
 */
class MailbridgeTableConfig extends JTable {

    public function __construct(&$db) {
        parent::__construct('#__mailbridge_config', 'id', $db);
    }

    

}