<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*  SIMA Content Management System
*  modules Module
*  Auto Loader 
*/

# Load Module Libraries	 
$autoload['libraries'] = array('form_validation');

# Load Module Models
$autoload['model'] = array('admin_init', 'modules_m' => 'modules');

# Load Module Configs
//$autoload['config'] = array('');

/* End of file autoload.php */
