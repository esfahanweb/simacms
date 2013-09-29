<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*  SIMA Content Management System
*  Users Module
*  Module Config File
*/

$config['install_query'] = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL,
  `title` varchar(80) NOT NULL,
  `type` enum('Percent','Fixed') NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$config['uninstall_query'] = "drop table if exists users";



/* End of file config.php */