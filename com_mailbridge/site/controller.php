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

jimport('joomla.application.component.controller');
require_once(JPATH_BASE.DS.'components'.DS.'com_mailbridge' . DS . 'classes' . DS . 'Snoopy.class.php');

class MailbridgeController extends JController {

    const MAILMAN_COMMAND_MEMBERS_ADD = '/members/add/';
    const MAILMAN_COMMAND_MEMBERS_FIND = '/members/';

    protected $mailmanConfig = array();

    public function __construct($config = array()) {
        parent::__construct($config);
        if (JFactory::getUser()->guest != 1) {
//user is logged in
            if (JFactory::getApplication()->input->getCmd('task') == 'subscribe') {
                $this->mailmanConfig = $this->getModel('listings')->getConfig(TRUE);
            } else {
                $this->mailmanConfig = $this->getModel('listings')->getConfig();
            }
        } else {
//user is logegd out
            $this->setRedirect(JRoute::_('index.php?option=com_users&view=login', false));
            return;
        }
    }

    /**
     * Subscribe user in Mailman list
     */
    public function subscribe() {
        $userEmailId = JFactory::getUser()->email;
        $serviceResponse = $this->_isEmailSubscribedToMailingList($userEmailId);
        if ($serviceResponse) {
            $this->getUserProfile();
        } else {
            $snoopy = new Snoopy();
            $this->mailmanConfig = $this->getModel('listings')->getConfig(TRUE);
            if (!empty($this->mailmanConfig)) {
                $snoopy->submit($this->mailmanConfig['url'] . self::MAILMAN_COMMAND_MEMBERS_ADD, $this->mailmanConfig['params']);
            }
            $results = $snoopy->results;
            if (strstr($results, "Successfully invited:")) {
                
                $view = $this->getView('listing', 'html');
                $view->setLayout('default');
                $view->display();
               
            }
           
        }
    }

    /**
     * Fetch User Profile info from mailman list
     * @param type $edit
     */
    public function getUserProfile($edit = false) {
        $userEmailId = JFactory::getUser()->email;
        $values = $this->_getParameters($userEmailId);
        $serviceResponse = $this->_isEmailSubscribedToMailingList($userEmailId);
        if ($serviceResponse) {
            foreach ($values as $key => $value) {
                switch ($key) {
                    case "realname" : // Lookup real name
                        $pattern = '/realname"\stype="TEXT"\svalue="([^"]+)"/';
                        preg_match($pattern, $serviceResponse, $matches);
                        $values[$key] = $matches[1];
                        break;
                    case "language" : // Lookup language
                        $pattern = '/option\svalue="([a-z]+?)"\sSelected/';
                        preg_match($pattern, $serviceResponse, $matches);
                        $values[$key] = $matches[1];
                        break;
                    default : // Lookup all other parameters
                        $pattern = '/' . $key . '"\stype="CHECKBOX"\svalue="([a-z]+)?"/i';
                        preg_match($pattern, $serviceResponse, $matches);
                        $values[$key] = $matches[1];
                }
            }
            $values['ismember'] = true;
        } else {
// Address is not in list.
            unset($values);
            $values['ismember'] = false;
            // $this->subscribe();
            $this->_errormsg = "Error: Addres is not subscribed to this list";
        }
        $model = $this->getModel('listings');
        $rowData = $model->getData();
        $edit = JRequest::getVar('edit');

        if ($edit == 'true') {

            $view = $this->getView('listingform', 'html');
            $view->assign('rowdata', $rowData);
            $view->assign('values', $values);
            $view->assign('email', $userEmailId);
            $view->setModel($model, true);
            $view->setLayout('default');
        } else {
            $view = $this->getView('listings', 'html');
            $view->assign('rowdata', $rowData);
            $view->assign('values', $values);
            $view->assign('email', $userEmailId);
            $view->setModel($model, true);
            $view->setLayout('default');
        }

        $view->display();
//parent::display();
    }

    /**
     * Updates modified changes by user on mailman list
     */
    public function updateUserProfile($postData) {
        
        if ($postData['task'] != 'saveUserEdit') {
            $postData = JRequest::get('post');
        }
        //var_export($postData); die;
        $emailId = JFactory::getUser()->email;
        $username = JFactory::getUser()->username;
        
        $url = $this->mailmanConfig['url'] . self::MAILMAN_COMMAND_MEMBERS_FIND;
        $submitVars = array();
        $submitVars['user'] = $emailId;
        if($postData['realname'] == '')
        {
         
             $submitVars["{$emailId}_realname"] = $username;
        }
        $submitVars['setmemberopts_btn'] = 'Submit Your Changes';
       
        $submitVars['adminpw'] = $this->mailmanConfig['params']['adminpw'];
        foreach ($postData as $key => $value) {
            if ($value == 'on' || $key == 'realname') {
                $submitVars["{$emailId}_$key"] = $value;
            }
        }
         
        $snoopy = new Snoopy();
        $snoopy->submit($url, $submitVars);
        $serviceResponse = $snoopy->results;
        return $serviceResponse;
     //   $this->setRedirect('index.php?option=com_mailbridge&task=getUserProfile');
    }

    protected function _isEmailSubscribedToMailingList($emailId = '') {
        $result = false;
        if ($this->mailmanConfig) {
            $params = array();
            $params['findmember'] = strtolower($emailId);
            $params['findmember_btn'] = 'Search...';
            $params['adminpw'] = $this->mailmanConfig['params']['adminpw'];
            $snoopy = new Snoopy();
            $snoopy->submit($this->mailmanConfig['url'] . '/members', $params);
            $serviceResponse = $snoopy->results;
            if (strstr($serviceResponse, $emailId . "_realname")) {
                $result = $serviceResponse;
            }
        }
        return $result;
    }

    protected function _getParameters() {
        return array(
            'unsub' => '',
            'realname' => '',
            'mod' => 'on',
            'hide' => 'on',
            'nomail' => 'on',
            'ack' => 'on',
            'notmetoo' => 'on',
            'nodupes' => 'on',
            'digest' => 'on',
            'plain' => 'on',
            'language' => 'en'
        );
    }

}