<?php

/**
 * @version	2.5
 * @package	Mailbridge
 * @author 	Daffodil software ltd.
 * @link 	http://www.daffodilsw.com

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
