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

/**
 * parameter Table class
 */
class MailbridgeTableConfig extends JTable {

    public function __construct(&$db) {
        parent::__construct('#__mailbridge_config', 'id', $db);
    }

    

}