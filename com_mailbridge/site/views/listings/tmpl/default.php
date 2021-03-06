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

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components/com_mailbridge/assets/mailbridge.css', 'text/css');
?>


<form action="<?php echo 'index.php?option=com_mailbridge&task=getUserProfile&edit=true' ?>" method="post" name="adminForm" id="adminForm">
    <fieldset>
        <legend><?php echo JText::_('COM_MAILBRIDGE_LIST_LEGEND'); ?></legend>
        <table class="adminForm" width="90%">
            <tbody>

                <?php if ($this->rowdata->nomail) { ?>
                    <tr class="sectiontableentry1">
                        <td class="key" width="25%">
                            <label for="nomail"><?php echo JText::_('COM_MAILBRIDGE_NOMAIL_TITLE'); ?></label>
                        </td>
                        <td width="25%">
                            <?php echo $this->values['nomail'] == 'on' ? JText::_('COM_MAILBRIDGE_NOMAIL_ON') : JText::_('COM_MAILBRIDGE_NOMAIL_OFF'); ?>  
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
                            <label for="digest"><?php echo JText::_('COM_MAILBRIDGE_DIGEST_TITLE'); ?></label>
                        </td>
                        <td>
                            <?php echo $this->values['digest'] == 'on' ? JText::_('COM_MAILBRIDGE_DIGEST_ON') : JText::_('COM_MAILBRIDGE_DIGEST_OFF'); ?>  
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
                            <label for="plain"><?php echo JText::_('COM_MAILBRIDGE_PLAIN_TITLE'); ?></label>
                        </td>
                        <td>
                            <?php echo $this->values['plain'] == 'on' ? JText::_('COM_MAILBRIDGE_PLAIN_ON') : JText::_('COM_MAILBRIDGE_PLAIN_OFF'); ?>  
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
                            <label for="ack"><?php echo JText::_('COM_MAILBRIDGE_ACK_TITLE'); ?></label>
                        </td>
                        <td>
                            <?php echo $this->values['ack'] == 'on' ? JText::_('COM_MAILBRIDGE_ACK_ON') : JText::_('COM_MAILBRIDGE_ACK_OFF'); ?>  
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
                            <label for="notmetoo"><?php echo JText::_('COM_MAILBRIDGE_NOTMETOO_TITLE'); ?></label>
                        </td>
                        <td>
                            <?php echo $this->values['notmetoo'] == 'on' ? JText::_('COM_MAILBRIDGE_NOTMETOO_ON') : JText::_('COM_MAILBRIDGE_NOTMETOO_OFF'); ?>  
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
                            <label for="mod">Gemodereerd:</label>
                        </td>
                        <td>
                            <?php echo $this->values['mod'] == "on" ? JText::_('COM_MAILBRIDGE_MOD_ON') : JText::_('COM_MAILBRIDGE_MOD_OFF'); ?>
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

