<?php
/**
 * @version     1.0.0
 * @package     com_mailbridge
 * @copyright   Copyright (C) 2013 Jurgen Gaeremyn. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Nidhi Gupta <nidhi.gupta@daffodilsw.com> - http://www.daffodilsw.com
 */

defined('_JEXEC') or die('Restricted access');
JHTML::_('behavior.mootools');
?>
<form action="index.php?option=com_mailbridge&view=config" method="post"  name="adminForm" id="adminForm" >

    <div class="col100">
        <fieldset class="adminform">
           <legend>Mailman Configuration</legend>
                    <ul class="adminformlist">
                        <li>
                            <label id="jform_url-lbl" for="jform_url" class="hasTip" title="">List Url</label>				
                            <input type="text" name="list_url" id="jform_url" value ="<?php echo $this->list_url ; ?>">
                        </li>
                        <li>
                            <label id="jform_name-lbl" for="jform_name" class="hasTip" title="">List Name</label>				
                            <input type="text" name="list_name" id="jform_name" value ="<?php echo $this->list_name; ?>">
                        </li>
                        <li>
                            <label id="jform_password-lbl" for="jform_password" class="hasTip" title="">List Password</label>				
                            <input type="password" name="list_password" id="jform_password" value ="<?php echo $this->list_password ; ?>">
                        </li>
                        <li>
                            <label id="jform_sendWelcomeMessage-lbl" for="jform_sendWelcomeMessage" class="hasTip" title="">Send Welcome Message</label>
                            <input type="checkbox" name="sendWelcomeMessage" id="jform_sendWelcomeMessage" value="1" <?php echo $this->send_welcome_message == 0 ? '' : 'checked' ; ?> >
                        </li>
                        <li>
                            <label id="jform_send_notification-lbl" for="jform_send_notification" class="hasTip" title="">Send Notification</label>
                            <input type="checkbox" name="send_notification" id="jform_send_notification" value="1" <?php echo $this->send_notification == 0 ? '' : 'checked' ; ?> >
                        </li>
                        <li>
                            <label id="jform_invitation-lbl" for="jform_invitation" class="hasTip" title="">Invitation</label>
                            <input type="checkbox" name="invitation" id="jform_invitation" value="1" <?php echo $this->invitation == 0 ? '' : 'checked' ; ?> >
                        </li>
                    </ul>               
          </fieldset>  
    </div>
    <div class="clr"></div>
   
    <input type="hidden" name="view" value="config" />
    <input type="hidden" name="controller" value="config" />
    <input type="hidden" name="option" value="com_mailbridge" />
    <input type="hidden" name="id" value="<?php echo $this->row_id; ?>" />
    <input type="hidden" name="task" value="" />
<?php echo JHTML::_('form.token'); ?>
</form>

