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

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_mailbridge', JPATH_ADMINISTRATOR);

?>


    <div class="item_fields">

        <ul class="fields_list">

            <?php echo JText::_('SUBSCRIPTION_REQUEST_SENT');?>

        </ul>

    </div>
    
