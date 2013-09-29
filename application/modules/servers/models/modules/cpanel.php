<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cpanel extends CI_Model {

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
		 	'WHM Package Name' => array ('Type' => 'text', 'Size' => '25'), 
			'Max FTP Accounts' => array ('Type' => 'text', 'Size' => '5'), 
			'Web Space Quota' => array ('Type' => 'text', 'Size' => '5', 'Description' => 'MB'), 
			'Max Email Accounts' => array ('Type' => 'text', 'Size' => '5'), 
			'Bandwidth Limit' => array ('Type' => 'text', 'Size' => '5', 'Description' => 'MB'), 
			'Dedicated IP' => array ('Type' => 'yesno')
			);
   		 return $configarray;
  }
	
	
}