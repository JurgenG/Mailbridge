<?php

/**
 * @version     1.0.0
 * @package     com_mailbridge
 * @copyright   Copyright (C) 2013 Jurgen Gaeremyn. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Nidhi Gupta <nidhi.gupta@daffodilsw.com> - http://www.daffodilsw.com
 */
defined('_JEXEC') or die('Restricted access');

class MailbridgeControllerConfig extends JController {

    /**
     * constructor
     */
    function __construct() {

        parent::__construct();
    }

    /**
     * method to save the config
     */
    function save() {

        $post = JRequest::get("post");

        $model = $this->getModel('config');
        $configObject = $model->getData();
        $row = $model->getTable();
        
        $row->load(1);
        $row->bind($post);
        
        if (!$row->store()) {
            die('nidhi');
        }
        $this->setRedirect("index.php?option=com_mailbridge&view=config");
    }

}

?>