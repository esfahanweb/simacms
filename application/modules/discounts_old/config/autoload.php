<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*  SIMA Content Management System
*  Discounts Module
*  Auto Loader 
*/

# Load Module Libraries	 
$autoload['libraries'] = array('form_validation');

# Load Module Models
$autoload['model'] = array('admin_init', 'discounts_m' => 'discounts');

# Load Module Configs
$autoload['config'] = array('config');

/* End of file autoload.php */
