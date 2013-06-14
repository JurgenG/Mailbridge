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

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_mailbridge/assets/css/mailbridge.css');
?>
<script type="text/javascript">
    function getScript(url,success) {
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
    getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',function() {
        js = jQuery.noConflict();
        js(document).ready(function(){
            

            Joomla.submitbutton = function(task)
            {
                if (task == 'parameter.cancel') {
                    Joomla.submitform(task, document.getElementById('parameter-form'));
                }
                else{
                    
                    if (task != 'parameter.cancel' && document.formvalidator.isValid(document.id('parameter-form'))) {
                        Joomla.submitform(task, document.getElementById('parameter-form'));
                    }
                    else {
                        alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
                    }
                }
            }
        });
    });
</script>

<form action="<?php echo JRoute::_('index.php?option=com_mailbridge&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="parameter-form" class="form-validate">
    <div class="width-60 fltlft">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_MAILBRIDGE_LEGEND_PARAMETER'); ?></legend>
            <ul class="adminformlist">

                				<li><?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?></li>
				<li><?php echo $this->form->getLabel('state'); ?>
				<?php echo $this->form->getInput('state'); ?></li>
				<li><?php echo $this->form->getLabel('created_by'); ?>
				<?php echo $this->form->getInput('created_by'); ?></li>
				<li><?php echo $this->form->getLabel('realname'); ?>
				<?php echo $this->form->getInput('realname'); ?></li>
				<li><?php echo $this->form->getLabel('unsub'); ?>
				<?php echo $this->form->getInput('unsub'); ?></li>
				<li><?php echo $this->form->getLabel('mod'); ?>
				<?php echo $this->form->getInput('mod'); ?></li>
				<li><?php echo $this->form->getLabel('hide'); ?>
				<?php echo $this->form->getInput('hide'); ?></li>
				<li><?php echo $this->form->getLabel('nomail'); ?>
				<?php echo $this->form->getInput('nomail'); ?></li>
				<li><?php echo $this->form->getLabel('ack'); ?>
				<?php echo $this->form->getInput('ack'); ?></li>
				<li><?php echo $this->form->getLabel('notmetoo'); ?>
				<?php echo $this->form->getInput('notmetoo'); ?></li>
				<li><?php echo $this->form->getLabel('nodupes'); ?>
				<?php echo $this->form->getInput('nodupes'); ?></li>
				<li><?php echo $this->form->getLabel('digest'); ?>
				<?php echo $this->form->getInput('digest'); ?></li>
				<li><?php echo $this->form->getLabel('plain'); ?>
				<?php echo $this->form->getInput('plain'); ?></li>
				<li><?php echo $this->form->getLabel('language'); ?>
				<?php echo $this->form->getInput('language'); ?></li>


            </ul>
        </fieldset>
    </div>

    

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
    
   
</form>
