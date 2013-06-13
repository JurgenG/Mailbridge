<?php
/**
 * @version     1.0.0
 * @package     com_mailbridge
 * @copyright   Copyright (C) 2013 Jurgen Gaeremyn. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Nidhi Gupta <nidhi.gupta@daffodilsw.com> - http://www.daffodilsw.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

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