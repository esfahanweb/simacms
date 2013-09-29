<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ibsng extends CI_Model {

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
   		 $configarray = array(
					'Count' => array('Type' => 'text', 'Size' => '20', 'Description' => 'Default: 1<br>'),
					'Credit' => array('Type' => 'text', 'Size' => '20', 'Description' => 'Default: Service Price'),
					'Owner' => array('Type' => 'text', 'Size' => '20', 'Description' => 'Default: system'),
					'Group' => array('Type' => 'dropdown', 'Options' => '[Billing Cycle],A1-1-month-VPN,A2-3-month-VPN,H1-1-Month-HTTPS,H2-3-Month-HTTPS,S1-1-month-VPN-And-HTTPS,S2-3-month-VPN-And-HTTPS'),
					'Username Prefix' => array('Type' => 'text', 'Size' => '20'),
					'Password Strength' => array('Type' => 'dropdown', 'Options' => 'Numeric,Lowercase Alphabetic,Uppercase Alphabetic,Num LC,Num UC,LC UC,Num LC UC'),
					'Password Length' => array('Type' => 'text', 'Size' => '20', 'Description' => 'Default: 8'),
					'Charge' => array('Type' => 'text', 'Size' => '20', 'Description' => 'can be use like customfields::FIELD_NAME'),
					'Multi Login' => array('Type' => "text", "Size" => "20", "Description" => "Users"),
					'Session Timeout' => array('Type' => 'text', "Size" => "20", "Description" => "Seconds"),
					'Relative Expiration Date' => array('Type' => 'text', 'Size' => '16'),
					'Absolute Expiration Date' => array('Type' => 'text', 'Size' => '16'),
					'Date Unit' => array('Type' => 'dropdown', 'Options' => 'Gregorian,Minutes,Days,Months,Years,Jalali'),
					'Assign IP Address' => array('Type' => 'yesno')
					);
   		 return $configarray;
  }
  
  
  
  function adminlink ()
  	{
   		echo 'admin link';
  }
	
	
}