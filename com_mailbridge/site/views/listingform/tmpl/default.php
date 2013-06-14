<?php
/**
 * @version     1.0.0
 * @package     com_mailbridge
 * @copyright   
 * @license     
 * @author      nidhi <nidhi.gupta@daffodilsw.com> - http://
 */
// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components/com_mailbridge/assets/mailbridge.css', 'text/css');
//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_mailbridge', JPATH_ADMINISTRATOR);
?>


<script type="text/javascript">
    function getScript(url, success) {
        var script = document.createElement('script');
        script.src = url;
        var head = document.getElementsByTagName('head')[0],
                done = false;
        // Attach handlers for all browsers
        script.onload = script.onreadystatechange = function() {
            if (!done && (!this.readyState
                    || this.readyState == 'loaded'
                    || this.readyState == 'complete')) {
                done = true;
                success();
                script.onload = script.onreadystatechange = null;
                head.removeChild(script);
            }
        };
        head.appendChild(script);
    }
    getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', function() {
        js = jQuery.noConflict();
        js(document).ready(function() {
            js('#form-listing').submit(function(event) {

            });


        });
    });

</script>


<div class="listing-edit front-end-edit">
    <div class="componentheading"><?php echo JText::_('COM_MAILBRIDGE_LIST_TITLE'); ?></div>
    <form action="<?php echo 'index.php?option=com_mailbridge&task=updateUserProfile' ?>" method="post" name="jform" id="jform">
        <fieldset>
            <legend> <?php echo JText::_('COM_MAILBRIDGE_LIST_TITLE'); ?>[<?php echo $this->email; ?>]</legend>
            <table class="adminForm" width="90%">
                <tbody>

                    <?php if ($this->rowdata->nomail) { ?>
                        <tr class="sectiontableentry1">
                            <td class="key" width="25%">
                                <label for="nomail"><?php echo JText::_('COM_MAILBRIDGE_NOMAIL_TITLE'); ?></label>
                            </td>
                            <td width="25%">
                                <input name="nomail" id="nomail_off" value="off" type="radio" <?php if ($this->values['nomail'] <> 'on') echo 'checked="checked"'; ?> />
                                <label for="nomail_off"><?php echo JText::_('COM_MAILBRIDGE_NOMAIL_OFF'); ?></label><br />
                                <input name="nomail" id="nomail_on" value="on" type="radio" <?php if ($this->values['nomail'] == 'on') echo 'checked="checked"'; ?> />
                                <label for="nomail_on"><?php echo JText::_('COM_MAILBRIDGE_NOMAIL_ON'); ?></label>
                            </td>
                            <td>
                                <?php echo JHTML::tooltip(JText::_('COM_MAILBRIDGE_NOMAIL_DESC'), 'Even geen mail', 'tooltip.png', '', ''); ?>


                            </td>
                        </tr>
                        <?php
                    }
                    if ($this->rowdata->digest) {
                        ?>
                        <tr class="sectiontableentry2">
                            <td class="key">
                                <label for="digest"><?php echo JText::_('COM_MAILBRIDGE_DIGEST_TITLE'); ?><br />(<?php echo $this->values['digest']; ?>)</label>
                            </td>
                            <td>
                                <input name="digest" id="digest_off" value="off" type="radio" <?php if ($this->values['digest'] <> 'on') echo 'checked="checked"'; ?> />
                                <label for="digest_off"><?php echo JText::_('COM_MAILBRIDGE_DIGEST_OFF'); ?></label><br />
                                <input name="digest" id="digest_on" value="on" type="radio" <?php if ($this->values['digest'] == 'on') echo 'checked="checked"'; ?> />
                                <label for="digest_on"><?php echo JText::_('COM_MAILBRIDGE_DIGEST_ON'); ?></label>
                            </td>
                            <td>

                                <?php echo JHTML::tooltip(JText::_('COM_MAILBRIDGE_NOMAIL_DIGEST'), 'mails in samenvatting:', 'tooltip.png', '', '');
                                ?>

                            </td>
                        </tr>
                        <?php
                    }
                    if ($this->rowdata->plain) {
                        ?>
                        <tr class="sectiontableentry1">
                            <td class="key">
                                <label for="plain"><?php echo JText::_('COM_MAILBRIDGE_PLAIN_TITLE'); ?><br />(<?php echo $this->values['plain']; ?>)</label>
                            </td>
                            <td>
                                <input name="plain" id="plain_off" value="off" type="radio" <?php if ($this->values['plain'] <> 'on') echo 'checked="checked"'; ?> />
                                <label for="plain_off"><?php echo JText::_('COM_MAILBRIDGE_PLAIN_OFF'); ?></label><br />
                                <input name="plain" id="plain_on" value="on" type="radio" <?php if ($this->values['plain'] == 'on') echo 'checked="checked"'; ?> />
                                <label for="plain_on"><?php echo JText::_('COM_MAILBRIDGE_PLAIN_ON'); ?></label>
                            </td>
                            <td>

                                <?php echo JHTML::tooltip(JText::_('COM_MAILBRIDGE_NOMAIL_PLAIN'), 'Platte tekst in mails:', 'tooltip.png', '', '');
                                ?>

                            </td>
                        </tr>
                        <?php
                    }
                    if ($this->rowdata->ack) {
                        ?>
                        <tr class="sectiontableentry2">
                            <td class="key">
                                <label for="ack"><?php echo JText::_('COM_MAILBRIDGE_ACK_TITLE'); ?><br />(<?php echo $this->values['ack']; ?>)</label>
                            </td>
                            <td>
                                <input name="ack" id="ack_off" value="off" type="radio" <?php if ($this->values['ack'] <> 'on') echo 'checked="checked"'; ?>>
                                <label for="ack_off"><?php echo JText::_('COM_MAILBRIDGE_ACK_OFF'); ?></label><br />
                                <input name="ack" id="ack_on" value="on" type="radio" <?php if ($this->values['ack'] == 'on') echo 'checked="checked"'; ?>>
                                <label for="ack_on"><?php echo JText::_('COM_MAILBRIDGE_ACK_ON'); ?></label>
                            </td>
                            <td>
                                <?php echo JHTML::tooltip(JText::_('COM_MAILBRIDGE_NOMAIL_ACK'), 'Inzending bevestigen::', 'tooltip.png', '', '');
                                ?>

                            </td>
                        </tr>
                        <?php
                    }
                    if ($this->rowdata->notmetoo) {
                        ?>
                        <tr class="sectiontableentry1">
                            <td class="key">
                                <label for="notmetoo"><?php echo JText::_('COM_MAILBRIDGE_NOTMETOO_TITLE'); ?><br />(<?php echo $this->values['notmetoo']; ?>)</label>
                            </td>
                            <td>
                                <input name="notmetoo" id="notmetoo_off" value="off" type="radio" <?php if ($this->values['notmetoo'] <> 'on') echo 'checked="checked"'; ?> />
                                <label for="notmetoo_off"><?php echo JText::_('COM_MAILBRIDGE_NOTMETOO_OFF'); ?></label><br />
                                <input name="notmetoo" id="notmetoo_on" value="on" type="radio" <?php if ($this->values['notmetoo'] == 'on') echo 'checked="checked"'; ?> />
                                <label for="notmetoo_on"><?php echo JText::_('COM_MAILBRIDGE_NOTMETOO_ON'); ?></label>
                            </td>
                            <td>
                                <?php echo JHTML::tooltip(JText::_('COM_MAILBRIDGE_NOMAIL_NOTMETOO'), 'Eigen inzending overslaan:', 'tooltip.png', '', '');
                                ?>

                            </td>
                        </tr>
                        <?php
                    }
                    if ($this->rowdata->mod) {
                        ?>
                        <tr class="sectiontableentry2">
                            <td class="key">
                                <label for="mod"><?php echo JText::_('COM_MAILBRIDGE_MOD_TITLE'); ?><br />(<?php echo $this->values['mod']; ?>)</label>
                            </td>
                            <td>
                                <?php echo $this->values['mod'] == "on" ? JText::_('COM_MAILBRIDGE_MOD_ON') : JText::_('COM_MAILBRIDGE_MOD_OFF'); ?>
                                <input name="mod" type="hidden" value="<?php echo $this->values['mod']; ?>" />
                            </td>
                            <td>
                                <?php echo JHTML::tooltip(JText::_('COM_MAILBRIDGE_MOD_DESC') . '<br />' . JText::_('COM_MAILBRIDGE_MOD_DESC1') . '<br />' . JText::_('COM_MAILBRIDGE_MOD_DESC2') . '<br />' . JText::_('COM_MAILBRIDGE_MOD_DESC3'), 'Gemodereerd:', 'tooltip.png', '', '');
                                ?>

                            </td>
                        </tr>
                    <?php }
                    ?>

                </tbody>		
            </table>
        </fieldset>
    </form>






</div>

