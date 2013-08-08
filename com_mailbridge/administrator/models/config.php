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

jimport('joomla.application.component.modeladmin');

/**
 * Mailbridge model.
 */
class MailbridgeModelconfig extends JModel {
    /**
     * returns instance of table
     * @return type
     */
protected $text_prefix = 'COM_MAILBRIDGE';
    /**
     * Returns a reference to the a Table object, always creating it.
     *
     * @param	type	The table type to instantiate
     * @param	string	A prefix for the table class name. Optional.
     * @param	array	Configuration array for model. Optional.
     * @return	JTable	A database object
     * @since	1.6
     */
    public function getTable($type = 'config', $prefix = 'MailbridgeTable', $config = array()) {
     
        $object = JTable::getInstance($type, $prefix, $config);
        return $object;
    }

    /**
     * function to get the config_id to update
     * @return type
     */
    function getData() {
        $db = $this->getDbo();
        $db->setQuery('select * from #__mailbridge_config order by id asc');
        $configObject = $db->loadObject();
        return $configObject;
    }

    function saveData($post, $id = 1) {
        $db = $this->getDbo();
        var_dump($post);
        exit();
    }

}
