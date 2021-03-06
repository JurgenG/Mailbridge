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

class MailbridgeController extends JController {

    /**
     * Method to display a view.
     *
     * @param	boolean			$cachable	If true, the view output will be cached
     * @param	array			$urlparams	An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
     *
     * @return	JController		This object to support chaining.
     * @since	2.5
     */
    public function display($cachable = false, $urlparams = false) {
        


        $view = JFactory::getApplication()->input->getCmd('view', 'parameter');
        $task = JFactory::getApplication()->input->getCmd('view', 'edit.parameter');
        
        JFactory::getApplication()->input->set('view', $view);
        
        if ( $task == 'edit.parameter' || $view == 'parameter'|| $view == 'parameters') {
            JFactory::getApplication()->input->set('view', 'parameter');
            JFactory::getApplication()->input->set('task', 'edit.parameter');
            JFactory::getApplication()->input->set('layout', 'edit');
            JFactory::getApplication()->input->set('id', '1');
        }
        parent::display($cachable, $urlparams);

        return $this;
    }

}
