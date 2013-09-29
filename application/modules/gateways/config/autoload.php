<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*  SIMA Content Management System
*  Gateways Module
*  Auto Loader 
*/

# Load Module Libraries	 
$autoload['libraries'] = array('form_validation');

# Load Module Models
$autoload['model'] = array('admin_init', 'gateways_m' => 'gateways');

# Load Module Configs
//$autoload['config'] = array('config');

/* End of file autoload.php */
