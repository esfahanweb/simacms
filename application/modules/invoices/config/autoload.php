<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*  SIMA Content Management System
*  Invoices Module
*  Auto Loader 
*/

# Load Module Libraries	 
$autoload['libraries'] = array('form_validation');

# Load Module Models
$autoload['model'] = array('admin_init', 'invoices_m' => 'invoices', 'tabs');

# Load Module Configs
//$autoload['config'] = array('config');

/* End of file autoload.php */
