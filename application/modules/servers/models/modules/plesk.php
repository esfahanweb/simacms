<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plesk extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Servers Module
	 *  Servers_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
 	
	#--------------------[ Show Add New Server Form ]--------------------#
	
	function configoptions ()
  	{
   		 $configarray = array (
		 	'Plesk Package Name' => array ('Type' => 'text', 'Size' => '25'), 
			'Max FTP Accounts' => array ('Type' => 'text', 'Size' => '5'), 
			'Web Space Quota' => array ('Type' => 'text', 'Size' => '5', 'Description' => 'MB'), 'Max Email Accounts' => array ('Type' => 'text', 'Size' => '5'), 'Bandwidth Limit' => array ('Type' => 'text', 'Size' => '5', 'Description' => 'MB'), 'Dedicated IP' => array ('Type' => 'yesno'), 'Shell Access' => array ('Type' => 'yesno', 'Description' => 'Tick to grant access'), 'Max SQL Databases' => array ('Type' => 'text', 'Size' => '5'), 'CGI Access' => array ('Type' => 'yesno', 'Description' => 'Tick to grant access'), 'Max Subdomains' => array ('Type' => 'text', 'Size' => '5'), 'Frontpage Extensions' => array ('Type' => 'yesno', 'Description' => 'Tick to grant access'), 'Max Parked Domains' => array ('Type' => 'text', 'Size' => '5'), 'cPanel Theme' => array ('Type' => 'text', 'Size' => '15'), 'Max Addon Domains' => array ('Type' => 'text', 'Size' => '5'), 'Limit Reseller by Number' => array ('Type' => 'text', 'Size' => '5', 'Description' => 'Enter max number of allowed accounts'), 'Limit Reseller by Usage' => array ('Type' => 'yesno', 'Description' => 'Tick to limit by resource usage'), 'Disk Space' => array ('Type' => 'text', 'Size' => '7', 'Description' => 'MB'), 'Bandwidth' => array ('Type' => 'text', 'Size' => '7', 'Description' => 'MB'), 'Allow DS Overselling' => array ('Type' => 'yesno', 'Description' => 'MB'), 'Allow BW Overselling' => array ('Type' => 'yesno', 'Description' => 'MB'), 'Reseller ACL List' => array ('Type' => 'text', 'Size' => '20'));
   		 return $configarray;
  }
	
	
}