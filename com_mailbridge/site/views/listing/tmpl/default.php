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

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_mailbridge', JPATH_ADMINISTRATOR);

?>


    <div class="item_fields">

        <ul class="fields_list">

            <?php echo JText::_('SUBSCRIPTION_REQUEST_SENT');?>

        </ul>

    </div>
    
