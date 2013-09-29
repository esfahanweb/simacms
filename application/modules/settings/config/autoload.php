<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*  SIMA Content Management System
*  Settings Module
*  Auto Loader 
*/

# Load Module Libraries	 
$autoload['libraries'] = array('form_validation');

# Load Module Models
$autoload['model'] = array('admin_init', 'settings_m' => 'settings');

# Load Module Configs
$autoload['config'] = array('config');

/* End of file autoload.php */
