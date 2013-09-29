<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

/**
 * SSH class using ssh2 extention
 * for connecting and executing commands for linux server
 *
 * @author Shuky Dvir <shuky@quick-tips.net>
 * 
 *
 */
	$CI =& get_instance();
	$CI->load->library('nusoap_base');
	
  class Zarinpal
  {
  	
    protected $name = null;
    protected $merchant_id = null;
	
			
	
	
    function load($params)
    {

		$this->name = $params->name;
		$this->merchant_id = $params->merchant_id;
		
		
    }
	
	
	function request($params)
    {
					
		$User = new nusoap_user('http://www.zarinpal.com/WebserviceGateway/wsdl', 'wsdl');
		$res = $User->call('PaymentRequest', array($this->merchant_id, $params['amount'], $params['call_back_url'], urlencode($params['desc'])));
					
		//Redirect to URL You can do it also by creating a form
		Header('Location: https://www.zarinpal.com/users/pay_invoice/'.$res);
		
		
    }
	
	
	
	

   
  }

// END FTP Class

/* End of file SSH.php */
/* Location: ./system/aplication/libraries/SSH.php */