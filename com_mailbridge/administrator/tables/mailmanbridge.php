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

/**
* Table class
*
* @package          Joomla
* @subpackage		Product Creater
*/
class MailbridgeTable extends JTable {
	/**
	 * constructor
	 */
	Protected  $_TablePrefix="jom";
	
	function __construct( $tbl_name, $tbl_key, &$db )
	{   
		parent::__construct( $tbl_name, $tbl_key, $db );
		
	}
	
	
}
?>