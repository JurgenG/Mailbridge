<?php

/**
 * @version     1.0.0
 * @package     com_mailbridge
 * @copyright   
 * @license     
 * @author      nidhi <nidhi.gupta@daffodilsw.com> - http://
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Mailbridge records.
 */
class MailbridgeModelListings extends JModelList {

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array()) {
        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since	1.6
     */
    protected function populateState($ordering = null, $direction = null) {

        // Initialise variables.
        $app = JFactory::getApplication();

        // List state information
        $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'));
        $this->setState('list.limit', $limit);

        $limitstart = JFactory::getApplication()->input->getInt('limitstart', 0);
        $this->setState('list.start', $limitstart);



        // List state information.
        parent::populateState($ordering, $direction);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    protected function getListQuery() {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        return $query;
    }

    public function getData() {
        $db = $this->getDbo();
        $db->setQuery('select * from #__mailbridge_parameters order by id asc');
        $configObject = $db->loadObject();
        return $configObject;
    }

    public function getConfig($subscription = false) {
        $result = FALSE;
        try {
            $db = $this->getDbo();
            $db->setQuery('select list_name, list_url, list_password, send_notification, send_welcome_message, invitation from #__mailbridge_config order by id asc');
            $configObject = $db->loadObject();
        } catch (Exception $e) {
            /**
             * @todo log execption in the JLogger
             */
            $result = FALSE;
        }
        if ($configObject) {
            $result['url'] = $configObject->list_url . $configObject->list_name;
            $result['params']['adminpw'] = $configObject->list_password;
            if ($subscription) {
                $result['params']['subscribe_or_invite'] = 1;
                $result['params']['send_welcome_msg_to_this_batch'] = $configObject->send_welcome_message;
                $result['params']['send_notifications_to_list_owner'] = $configObject->send_notification;
                $result['params']['invitation'] = $configObject->invitation;
                $result['params']['subscribees'] = JFactory::getUser()->email;
            }
        }
        return $result;
    }

}