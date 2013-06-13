<script type="text/javascript">

  

//To include a page, invoke ajaxinclude("afile.htm") in the BODY of page
//Included file MUST be from the same domain as the page displaying it.

    var rootdomain = "http://" + window.location.hostname

    function ajaxinclude(url) {
        var page_request = false
        if (window.XMLHttpRequest) // if Mozilla, Safari etc
            page_request = new XMLHttpRequest()
        else if (window.ActiveXObject) { // if IE
            try {
                page_request = new ActiveXObject("Msxml2.XMLHTTP")
            }
            catch (e) {
                try {
                    page_request = new ActiveXObject("Microsoft.XMLHTTP")
                }
                catch (e) {
                }
            }
        }
        else
            return false
        page_request.open('GET', url, false) //get page synchronously 
        page_request.send(null)
        writecontent(page_request)
    }

    function writecontent(page_request) {
        if (window.location.href.indexOf("http") == -1 || page_request.status == 200)
            document.write(page_request.responseText)
    }

</script>


<?php

/**
 * Joomla Community Builder User Plugin: plug_joomlamailman
 * @version $Id: joomlamailman.php,v 1.16 2013/05/31 10:28:20 $
 * @package plug_joomlamailman
 * @subpackage cb.joomlamailman.php
 * @author      Nidhi Gupta <nidhi.gupta@daffodilsw.com> - http://www.daffodilsw.com
 */

if (!( defined('_VALID_CB') || defined('_JEXEC') || defined('_VALID_MOS') )) {
    die();
}

global $_PLUGINS;
$_PLUGINS->registerFunction('onUserActive', 'userActivated', 'getJoomlaMenuTabs1');
$_PLUGINS->registerFunction('onAfterDeleteUser', 'userDeleteTab', 'getJoomlaMenuTabs1');
?>
<style>
    #gjJoomlaTab .cbjoomlamenudetail .container #ja-container .main{width:100%;}
</style>
<?php

class JoomlaMailman extends cbTabHandler {

    /**
     * Constructor
     */
    function JoomlaMailman() {

        $this->cbTabHandler();
    }

    /**
     * Generates the HTML to display the user profile tab
     * @param  moscomprofilerTab   $tab       the tab database entry
     * @param  moscomprofilerUser  $user      the user being displayed
     * @param  int                 $ui        1 for front-end, 2 for back-end
     * @return mixed                          either string HTML for tab content, or false if ErrorMSG generated
     */
    function getDisplayTab($tab, $user, $ui) {

        global $_CB_framework, $_CB_database, $ueConfig, $ueConfig;

        $nest = $ueConfig['nesttabs'];
        $params = $this->params;
        $menuitem_id = $params->get('menutype');

        $app = JFactory::getApplication();
        $menu = $app->getMenu();
        $fullurl = 'index.php?option=com_mailbridge&task=subscribe&tmpl=component&print=1';


        $content = "<div id=\"gjJoomlaTab\" class=\"tab-pane\">";

        $content.="<div class=\"cbjoomlamenudetail\">";
        $content .= "<script type='text/javascript'>
							<!--
							ajaxinclude(\"" . $fullurl . "\")
							-->
							</script>";
        $content.="</div>";



        $content.="</div>";


        return $content;
    }

    function getEditTab($tab, $user, $ui) {

        global $_CB_framework, $_CB_database, $ueConfig, $ueConfig;

        $nest = $ueConfig['nesttabs'];
        $params = $this->params;
        $menuitem_id = $params->get('menutype');
        $app = JFactory::getApplication();
        $menu = $app->getMenu();
        $fullurl = 'index.php?option=com_mailbridge&task=getUserProfile&edit=true&tmpl=component&print=1';


        $content = "<div id=\"gjJoomlaTab\" class=\"tab-pane\">";

       
        $content.="<div >";
        $content .= "<script type='text/javascript'>
							<!--
							ajaxinclude(\"" . $fullurl . "\")
							-->
							</script>";
        $content.="</div>";
 


        $content.="</div>";


        return $content;
    }

    function saveEditTab($tab, &$user, $ui, $postdata) {


        global $my, $_CB_framework, $_POST, $mainframe;  // $mainframe needed by the require
        if (intval($_CB_framework->myId()) < 1) {
            cbNotAuth();
            return;
        }

        require_once( $_CB_framework->getCfg('absolute_path') . '/components/com_mailbridge/controller.php' );
        require_once( $_CB_framework->getCfg('absolute_path') . '/components/com_mailbridge/models/listings.php' );
        $mailbridge = new MailbridgeController();
        $postData = array();
        $postData['nomail'] = cbGetParam($_POST, 'nomail', '');
        $postData['digest'] = cbGetParam($_POST, 'digest', '');
        $postData['plain'] = cbGetParam($_POST, 'plain', '');
        $postData['ack'] = cbGetParam($_POST, 'ack', '');
        $postData['notmetoo'] = cbGetParam($_POST, 'notmetoo', '');
        $postData['mod'] = cbGetParam($_POST, 'mod', '');
        $postData['task'] = cbGetParam($_POST, 'task', '');
        $postData['realname'] = cbGetParam($_POST, 'username', '');

        $results = $mailbridge->updateUserProfile($postData);

        if ($result) {
            $this->_setErrorMSG($result);
        }
    }

}

// end class .

class getJoomlaMenuTabs1 extends JoomlaMailman {

    function getJoomlaMenuList() {
        global $my, $_CB_framework, $mainframe;  // $mainframe needed by the require

        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('id,title,menutype');
        $query->from('#__menu_types');
        $db->setQuery((string) $query);
        $messages = $db->loadObjectList();

        return $messages;
    }

  

}
?>
