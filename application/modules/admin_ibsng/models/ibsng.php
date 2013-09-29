<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class ibsng extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		$this->load->model('admin_init');
		error_reporting(0);

		$this->load->library('ibsngadapter');
		$query = $this->db->get_where('tblibsng', array('user_id' => $this->session->userdata('user_id')));
		$row = $query->row();
		
		define('IBSNG_SERVER_PORT',$row->ibsng_server_port);
		define('IBSNG_TIMEOUT',$row->ibsng_timeout);
		
		$this->params = array(
					'serverusername' => $row->ibsng_server_username,
					'serverpassword' => $row->ibsng_server_password,
					'serverip' => $row->ibsng_ip_address,
					'count' => 1,
					'credit' => 1,
					'owner' => $row->ibsng_server_username,
					//'group' => 'S1-1-month-VPN-And-HTTPS',
					'prefix' => $row->ibsng_admin_prefix,
					'passwd_strength' => 'Numeric',
					'passwd_length' => 8,
					'normal_charge' => '',
					'multi_login' => '',
					'session_timeout' => '',
					'rel_exp' => '',
					'abs_exp' => '',
					'date_unit' => 'Months',
					'assign_ip' => ''
					);
				
    }
 
 	function seconds($seconds) {
 
  // CONVERT TO HH:MM:SS
  $hours = floor($seconds/3600);
  $remainder_1 = ($seconds % 3600);
  $minutes = floor($remainder_1 / 60);
  $seconds = ($remainder_1 % 60);
   
  // PREP THE VALUES
  if(strlen($hours) == 1) {
   $hours = "0".$hours;
  }
   
  if(strlen($minutes) == 1) {
   $minutes = "0".$minutes;
  }
   
  if(strlen($seconds) == 1) {
   $seconds = "0".$seconds;
  }
   
  return $hours.":".$minutes.":".$seconds;
 
  }
 //
 
 
   function ibsng_CreateAdmin($params)
  {

    $auth_name = $params['serverusername'];
    $auth_pass = $params['serverpassword'];
    $server_ip = $params['serverip'];
    $server_port = IBSNG_SERVER_PORT;
    $timeout = IBSNG_TIMEOUT;
	
	$passwd_strength = $params['passwd_strength'];
	$passwd_length = $params['passwd_length'] == "" ? "8" : $params['passwd_length'];

	$password = $this->passwdgen($passwd_strength,$passwd_length);
    $username = 'testing'.$password;
   
	$name = 'testings'.$password;
	$comment = '123';
    
    
    
  
  

	
$this->ibsngadapter->load($server_ip, $server_port, $timeout, $auth_name, $auth_pass);


	
  echo   $this->ibsngadapter->createAdmin($username,$password,$name,comment);
   
   

   

    return $result;
  }
 
 
 
 
 function listGroups($params)
  {

    $auth_name = $params['serverusername'];
    $auth_pass = $params['serverpassword'];
    $server_ip = $params['serverip'];
    $server_port = IBSNG_SERVER_PORT;
    $timeout = IBSNG_TIMEOUT;
	
	
	$this->ibsngadapter->load($server_ip, $server_port, $timeout, $auth_name, $auth_pass);


  	return $this->ibsngadapter->listGroups();
   
  }
  
  
  
   function ibsng_getOnlineUsers($params)
  {

    $auth_name = $params['serverusername'];
    $auth_pass = $params['serverpassword'];
    $server_ip = $params['serverip'];
    $server_port = IBSNG_SERVER_PORT;
    $timeout = IBSNG_TIMEOUT;
	
	$normal_sort_by='';
	$normal_desc='';
	$voip_sort_by='';
	$voip_desc='';
	$conds= array();
	
	
	$this->ibsngadapter->load($server_ip, $server_port, $timeout, $auth_name, $auth_pass);


  	return $this->ibsngadapter->getOnlineUsers($normal_sort_by, $normal_desc, $voip_sort_by, $voip_desc, $conds);
   
  }
 //	
 
 
 
 
 
   function ibsng_editUserAttr($params, $username , $attrs)
  {

    $auth_name = $params['serverusername'];
    $auth_pass = $params['serverpassword'];
    $server_ip = $params['serverip'];
    $server_port = IBSNG_SERVER_PORT;
    $timeout = IBSNG_TIMEOUT;
	
	$normal_username = $username;
	
	
	$to_del_attrs=array();
	
	
	$this->ibsngadapter->load($server_ip, $server_port, $timeout, $auth_name, $auth_pass);


  	return $this->ibsngadapter->editUserAttrByUserName($normal_username, $attrs, $to_del_attrs);
   
  }
 
 
 







  function CreateAccount($params)
  {
    $auth_name = $params['serverusername'];
    $auth_pass = $params['serverpassword'];
    $server_ip = $params['serverip'];
    $server_port = IBSNG_SERVER_PORT;
    $timeout = IBSNG_TIMEOUT;
	$count = $params['count'];
    $credit = $params['credit'];
    $owner = $params['owner'];
    $group = $params['group'];
    $prefix = $params['prefix'];
	$passwd_strength = $params['passwd_strength'];
	$passwd_length = $params['passwd_length'] == "" ? "8" : $params['passwd_length'];
	$normal_charge = $params['normal_charge'];
    $multi_login = $params['multi_login'];
	$session_timeout = $params['session_timeout'];
	$rel_exp = intval($params['rel_exp']);
    $abs_exp = intval($params['abs_exp']);
    $date_unit = trim($params['date_unit']);
    $username = $prefix;
    $password = $this->passwdgen($passwd_strength,$passwd_length);
    
    
    if(strpos($normal_charge, '::') !== false)
    {
      $elemnts = split('::', $normal_charge);
      $normal_charge = $params[$elemnts[0]][$elemnts[1]];
    }

	$assign_ip = '';
	
  
  

	
$this->ibsngadapter->load($server_ip, $server_port, $timeout, $auth_name, $auth_pass);


	
   return $this->ibsngadapter->createUser($count, $credit, $owner, $group, $username, $password, $normal_charge, $multi_login, $session_timeout, $rel_exp, $abs_exp, $date_unit, $assign_ip);
   
   

   

    
  }
  
  

  function ibsng_TerminateAccount($params)
  {
    $auth_name = $params['serverusername'];
    $auth_pass = $params['serverpassword'];
    $server_ip = $params['serverip'];
    $server_port = IBSNG_SERVER_PORT;
    $timeout = IBSNG_TIMEOUT;
    $username = $params['username'];
    $ibsng = new IBSngAdapter($server_ip, $server_port, $timeout, $auth_name, $auth_pass);
    $rs = $ibsng->delUserByUsername($username);
    if($rs === true)
    {
      $result = 'success';
    }
    else
    {
      $result = $rs;
    }

    return $result;
  }

  function ibsng_SuspendAccount($params)
  {
    $auth_name = $params['serverusername'];
    $auth_pass = $params['serverpassword'];
    $server_ip = $params['serverip'];
    $server_port = IBSNG_SERVER_PORT;
    $timeout = IBSNG_TIMEOUT;
    $username = $params['username'];
    $ibsng = new IBSngAdapter($server_ip, $server_port, $timeout, $auth_name, $auth_pass);
    $rs = $ibsng->lockUserByUserName($username, 'Locked by WHMCS');
    if($rs === true)
    {
      $result = 'success';
    }
    else
    {
      $result = $rs;
    }

    return $result;
  }

  function ibsng_UnsuspendAccount($params)
  {
    $auth_name = $params['serverusername'];
    $auth_pass = $params['serverpassword'];
    $server_ip = $params['serverip'];
    $server_port = IBSNG_SERVER_PORT;
    $timeout = IBSNG_TIMEOUT;
    $username = $params['username'];
    $ibsng = new IBSngAdapter($server_ip, $server_port, $timeout, $auth_name, $auth_pass);
    $rs = $ibsng->unlockUserByUserName($username);
    if($rs === true)
    {
      $result = 'success';
    }
    else
    {
      $result = $rs;
    }

    return $result;
  }
/*
  function ibsng_ChangePassword($params) {
	
	return $result;
  }
*/
  function passwdgen($strength,$length) {
	switch($strength) {
		case 'Numeric':
			$characters = '0123456789';
			break;
		case 'Lowercase Alphabetic':
			$characters = 'abcdefghijklmnopqrstuvwxyz';
			break;
		case 'Uppercase Alphabetic':
			$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			break;
		case 'Num LC':
			$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
			break;
		case 'Num UC':
			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			break;
		case 'LC UC':
			$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			break;
		case 'Num LC UC':
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			break;
	}
	$string = '';    
	for($i = 0 ; $i < $length ; $i++) {
		$string .= $characters[mt_rand(0,strlen($characters))];
	}
	return $string;
  }

  function assignIP($server,$service_id) {
	$result = mysql_query("SELECT * FROM ip WHERE server = '$server' AND status = 'free' LIMIT 1");
	//if(empty($result))
		//"Error: There is no free IP address for this server in IP Pool.";
	//else
	$row = mysql_fetch_array($result);
	$ip = $row['ip'];
	mysql_query("UPDATE ip SET status = 'busy',service_id = '$service_id' WHERE ip = '$ip'");
	mysql_query("UPDATE tblhosting SET dedicatedip = '$ip' WHERE id = '$service_id'");
	return $ip;
  }
	
	
	
	



}