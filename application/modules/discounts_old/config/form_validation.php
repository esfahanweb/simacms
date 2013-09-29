<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*  SIMA Content Management System
*  Discounts Module
*  Form Validation Rules 
*/

$config = array(
				array(
                     'field'   => 'title',
                     'label'   => 'title',
                     'rules'   => 'required'
                  ),
               	array(
                     'field'   => 'value',
                     'label'   => 'value',
                     'rules'   => 'required'
                  ),   
            );



/* End of file form_validation.php */
