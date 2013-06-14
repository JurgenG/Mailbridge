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

jimport('joomla.application.component.view');

/**
 * View to edit
 */
class MailbridgeViewConfig extends JView
{

    protected $state;
    protected $item;
    protected $form;

    /**
     * Display the view
     */
    public function display($tpl = null)
    {
        $this->state = $this->get('State');
        $this->item = $this->get('Item');
        $this->form = $this->get('Form');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

          $model = $this->getModel('config');
        $rowid = $model->getData();
        $this->list_name = $rowid->list_name;
        $this->list_url = $rowid->list_url;
        $this->list_password = $rowid->list_password;
        $this->send_welcome_message = $rowid->send_welcome_message;   
        $this->send_notification = $rowid->send_notification;
        $this->invitation = $rowid->invitation;
        $this->row_id = $rowid->id;
      
      
        JToolBarHelper::save('save');
        JToolBarHelper::cancel('cancel', JText::_('Close'));
        JToolBarHelper::title(JText::_('Configuration'), 'parameter.png');
        $input = JFactory::getApplication()->input;
        $view = $input->getCmd('view', '');
        MailbridgeHelper::addSubmenu($view);
        parent::display($tpl);
    }

    

}
