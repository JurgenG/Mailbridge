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

class MailbridgeControllerConfig extends JController {

    /**
     * constructor
     */
    function __construct() {

        parent::__construct();
    }

    /**
     * Method to save the configuration of Mailbridge
     */
    function save() {

        $post = JRequest::get("post");

        $model = $this->getModel('config');
        $configObject = $model->getData();
        $row = $model->getTable();
        
        $row->load(1);
        $row->bind($post);
        
        if (!$row->store()) {
           
		$this->setError('Unable to save data');
        }
        $this->setRedirect("index.php?option=com_mailbridge&view=config");
    }

}

?>
