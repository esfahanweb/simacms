<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

/**
 * SSH class using ssh2 extention
 * for connecting and executing commands for linux server
 *
 * @author Shuky Dvir <shuky@quick-tips.net>
 * 
 *
 */
	
	
  class Cpanel
  {
  	
   
			
	
	
    function configoptions ()
  	{
   		 $configarray = array (
		 	'WHM Package Name' => array ('Type' => 'text', 'Size' => '25'), 
			'Max FTP Accounts' => array ('Type' => 'text', 'Size' => '5'), 
			'Web Space Quota' => array ('Type' => 'text', 'Size' => '5', 'Description' => 'MB'), 'Max Email Accounts' => array ('Type' => 'text', 'Size' => '5'), 'Bandwidth Limit' => array ('Type' => 'text', 'Size' => '5', 'Description' => 'MB'), 'Dedicated IP' => array ('Type' => 'yesno'), 'Shell Access' => array ('Type' => 'yesno', 'Description' => 'Tick to grant access'), 'Max SQL Databases' => array ('Type' => 'text', 'Size' => '5'), 'CGI Access' => array ('Type' => 'yesno', 'Description' => 'Tick to grant access'), 'Max Subdomains' => array ('Type' => 'text', 'Size' => '5'), 'Frontpage Extensions' => array ('Type' => 'yesno', 'Description' => 'Tick to grant access'), 'Max Parked Domains' => array ('Type' => 'text', 'Size' => '5'), 'cPanel Theme' => array ('Type' => 'text', 'Size' => '15'), 'Max Addon Domains' => array ('Type' => 'text', 'Size' => '5'), 'Limit Reseller by Number' => array ('Type' => 'text', 'Size' => '5', 'Description' => 'Enter max number of allowed accounts'), 'Limit Reseller by Usage' => array ('Type' => 'yesno', 'Description' => 'Tick to limit by resource usage'), 'Disk Space' => array ('Type' => 'text', 'Size' => '7', 'Description' => 'MB'), 'Bandwidth' => array ('Type' => 'text', 'Size' => '7', 'Description' => 'MB'), 'Allow DS Overselling' => array ('Type' => 'yesno', 'Description' => 'MB'), 'Allow BW Overselling' => array ('Type' => 'yesno', 'Description' => 'MB'), 'Reseller ACL List' => array ('Type' => 'text', 'Size' => '20'));
   		 return $configarray;
  }

  function cpanel_clientarea ($params)
  {
    global $_LANG;
    if ($params['serversecure'])
    {
      $http = 'https';
      $cpanelport = '2083';
      $whmport = '2087';
    }
    else
    {
      $http = 'http';
      $cpanelport = '2082';
      $whmport = '2086';
    }

    if ($params['type'] == 'hostingaccount')
    {
      $code = '<form method="post" action="' . $http . '://' . $params['serverip'] . ':' . $cpanelport . '/login/" method="post" target="_blank">
		<input type="hidden" name="user" value="' . $params['username'] . '">
		<input type="hidden" name="pass" value="' . $params['password'] . '">
		<input type="submit" value="' . $_LANG['clientareacpanellink'] . '" class="button">
		<input type="button" value="' . $_LANG['clientareawebmaillink'] . '" onClick="window.open(\'http://' . $params['serverip'] . '/webmail\')" class="button">
		</form>';
    }

    if ($params['type'] == 'reselleraccount')
    {
      $code .= '<form method="post" action="' . $http . '://' . $params['serverip'] . ':' . $whmport . '/login/" method="post" target="_blank">
		<input type="hidden" name="user" value="' . $params['username'] . '">
		<input type="hidden" name="pass" value="' . $params['password'] . '">
		<input type="submit" value="' . $_LANG['clientareawhmlink'] . '" class="button">
		</form>';
    }

    return $code;
  }

  function adminlink ($params)
  {
    if ($params['secure'])
    {
      $http = 'https';
      $whmport = '2087';
    }
    else
    {
      $http = 'http';
      $whmport = '2086';
    }

    $code = '<form id="whm" action="' . $http . '://' . $params['ipaddress'] . ':' . $whmport . '/login/" method="post" target="_blank"><input type="hidden" name="user" value="' . $params['username'] . '"><input type="hidden" name="pass" value="' . $params['password'] . '"><input id="whm" type="submit" value="WHM"></form>';
    return $code;
  }

  function cpanel_createaccount ($params)
  {
    global $license;
    if ($params['configoption1'] == md5 ('Custom' . $license))
    {
      $query3 = 'SELECT * FROM tblhostingconfigoptions WHERE relid=\'' . $params['accountid'] . '\'';
      $result3 = mysql_query ($query3);
      while ($data3 = mysql_fetch_array ($result3))
      {
        $optionid = $data3['optionid'];
        $configid = $data3['configid'];
        $query2 = '' . 'SELECT * FROM tblproductconfigoptions WHERE id=\'' . $configid . '\'';
        $result2 = mysql_query ($query2);
        $data2 = mysql_fetch_array ($result2);
        $optionname = $data2['optionname'];
        $query2 = '' . 'SELECT * FROM tblproductconfigoptionssub WHERE id=\'' . $optionid . '\'';
        $result2 = mysql_query ($query2);
        $data2 = mysql_fetch_array ($result2);
        $optionvalue = $data2['optionname'];
        $optionvalue = str_replace ('MB', '', $optionvalue);
        $optionvalue = str_replace ('Accounts', '', $optionvalue);
        $optionvalue = trim ($optionvalue);
        if ($optionvalue == 'Yes')
        {
          $optionvalue = 'on';
        }
        else
        {
          if ($optionvalue == 'No')
          {
            $optionvalue = '';
          }
          else
          {
            if ($optionvalue == 'Unlimited')
            {
              $optionvalue = 'unlimited';
            }
          }
        }

        if ($optionname == 'Disk Space')
        {
          $params['configoption3'] = $optionvalue;
        }
        else
        {
          if ($optionname == 'Bandwidth')
          {
            $params['configoption5'] = $optionvalue;
          }
          else
          {
            if ($optionname == 'FrontPage Extensions')
            {
              $params['configoption11'] = $optionvalue;
            }
            else
            {
              if ($optionname == 'FTP Accounts')
              {
                $params['configoption2'] = $optionvalue;
              }
              else
              {
                if ($optionname == 'Email Accounts')
                {
                  $params['configoption4'] = $optionvalue;
                }
                else
                {
                  if ($optionname == 'MySQL Databases')
                  {
                    $params['configoption8'] = $optionvalue;
                  }
                  else
                  {
                    if ($optionname == 'Subdomains')
                    {
                      $params['configoption10'] = $optionvalue;
                    }
                    else
                    {
                      if ($optionname == 'Parked Domains')
                      {
                        $params['configoption12'] = $optionvalue;
                      }
                      else
                      {
                        if ($optionname == 'Addon Domains')
                        {
                          $params['configoption14'] = $optionvalue;
                        }
                        else
                        {
                          if ($optionname == 'IP Address')
                          {
                            $params['configoption16'] = $optionvalue;
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }

        $params['configoption1'] = 'Custom';
      }
    }

    if ($params['configoption6'] == 'on')
    {
      $dedicatedip = '1';
    }

    if ($params['configoption9'] == 'on')
    {
      $cgiaccess = '1';
    }

    if ($params['configoption7'] == 'on')
    {
      $shellaccess = '1';
    }

    if ($params['configoption11'] == 'on')
    {
      $fpextensions = '1';
    }

    $cpanelrequest = '/scripts/wwwacct?domain=' . urlencode ($params['domain']) . '&username=' . urlencode ($params['username']) . '&password=' . urlencode ($params['password']) . '&plan=' . urlencode ($params['configoption1']) . '&quota=' . $params['configoption3'] . '&bwlimit=' . $params['configoption5'] . '&hasshell=' . $shellaccess . '&cgi=' . $cgiaccess . '&frontpage=' . $fpextensions . '&maxftp=' . $params['configoption2'] . '&maxpop=' . $params['configoption4'] . '&maxlst=' . $params['configoption6'] . '&maxsql=' . $params['configoption8'] . '&maxsub=' . $params['configoption10'] . '&maxpark=' . $params['configoption12'] . '&maxaddon=' . $params['configoption14'] . '&cpmod=' . $params['configoption13'] . '&contactemail=' . urlencode ($params['clientsdetails']['email']) . '&ip=' . $dedicatedip . '&customip=' . urlencode ('--Auto Assign--') . '';
    $output = cpanel_req ($params['serversecure'], $params['serverip'], $params['serverusername'], $params['serverpassword'], $params['serveraccesshash'], $cpanelrequest);
    if (strpos ($output, 'Curl Error') == true)
    {
      $result = $output;
    }
    else
    {
      if (strpos ($output, '<form action="/login/" method="POST">') == true)
      {
        $result = 'Login Failed';
      }
      else
      {
        if (strpos ($output, 'reserved username') == true)
        {
          $result = 'This Username is Reserved';
        }
        else
        {
          if (strpos ($output, 'is taken') == true)
          {
            $result = 'This Username is already in Use';
          }
          else
          {
            if (strpos ($output, 'usernames cannot begin with a number') == true)
            {
              $result = 'Usernames Cannot Begin with a Number';
            }
            else
            {
              if (strpos ($output, 'passwords must be at least 5 characters for security reasons') == true)
              {
                $result = 'Passwords must be at least 5 Characters';
              }
              else
              {
                if (strpos ($output, 'the password may not contain the username for security reasons') == true)
                {
                  $result = 'Passwords may not contain the Username';
                }
                else
                {
                  if (strpos ($output, 'You do not have access to create that package') == true)
                  {
                    $result = 'You do not have permission to use Selected Package';
                  }
                  else
                  {
                    if (strpos ($output, 'Sorry, a DNS entry for') == true)
                    {
                      $result = 'A DNS entry already exists for this domain and must be deleted first';
                    }
                    else
                    {
                      if (strpos ($output, 'Sorry that username is too long. MAX is 8 letters') == true)
                      {
                        $result = 'Username too long - should be a maximum of 8 characters';
                      }
                      else
                      {
                        if (strpos ($output, 'You are not allowed to create an account with the package') == true)
                        {
                          $result = 'Package Not Allowed or Exceeded Resource/Account Allocation';
                        }
                        else
                        {
                          if (strpos ($output, 'New Account Info') == true)
                          {
                            $result = 'success';
                          }
                          else
                          {
                            if (strpos ($output, 'error.gif') == true)
                            {
                              $result = 'Account Creation Failed';
                            }
                            else
                            {
                              $result = 'An Unknown Error Occurred';
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }

    if ($params['type'] == 'reselleraccount')
    {
      $cpanelrequest = '/scripts/addres?res=' . urlencode ($params['username']) . '&cowner=1';
      $output = cpanel_req ($params['serversecure'], $params['serverip'], $params['serverusername'], $params['serverpassword'], $params['serveraccesshash'], $cpanelrequest);
      $cpanelrequest = '/scripts2/editressv?res=' . urlencode ($params['username']);
      if ($params['configoption16'])
      {
        $cpanelrequest .= '&limits_resources=1&rslimit-disk=' . urlencode ($params['configoption17']) . '&rslimit-bw=' . urlencode ($params['configoption18']);
        if ($params['configoption19'])
        {
          $cpanelrequest .= '&rsolimit-disk=1';
        }

        if ($params['configoption20'])
        {
          $cpanelrequest .= '&rsolimit-bw=1';
        }
      }
      else
      {
        $cpanelrequest .= '&limits_number_of_accounts=1&1resnumlimitamt=' . urlencode ($params['configoption15']);
      }

      $output = cpanel_req ($params['serversecure'], $params['serverip'], $params['serverusername'], $params['serverpassword'], $params['serveraccesshash'], $cpanelrequest);
      $cpanelrequest = '/xml-api/setacls?reseller=' . urlencode ($params['username']) . '&acllist=' . urlencode ($params['configoption21']);
      $output = cpanel_req ($params['serversecure'], $params['serverip'], $params['serverusername'], $params['serverpassword'], $params['serveraccesshash'], $cpanelrequest);
    }

    return $result;
  }

  function cpanel_terminateaccount ($params)
  {
    if (!$params['username'])
    {
      return 'Cannot perform action without accounts username';
    }

    $cpanelrequest = '/scripts/killacct?domain=' . $params['username'] . '&user=' . $params['username'] . '';
    $output = cpanel_req ($params['serversecure'], $params['serverip'], $params['serverusername'], $params['serverpassword'], $params['serveraccesshash'], $cpanelrequest);
    if (strpos ($output, 'Curl Error') == true)
    {
      $result = $output;
    }
    else
    {
      if (strpos ($output, '<form action="/login/" method="POST">') == true)
      {
        $result = 'Login Failed';
      }
      else
      {
        if (strpos ($output, 'does not exist') == true)
        {
          $result = 'Account Does Not Exist';
        }
        else
        {
          if (strpos ($output, 'Done') == true)
          {
            $result = 'success';
          }
          else
          {
            $result = 'An Unknown Error Occurred';
          }
        }
      }
    }

    return $result;
  }

  function cpanel_suspendaccount ($params)
  {
    if (!$params['username'])
    {
      return 'Cannot perform action without accounts username';
    }

    if ($params['type'] == 'reselleraccount')
    {
      $cpanelrequest = '/scripts/suspendreseller?reseller=' . $params['username'] . '&resalso=1';
    }
    else
    {
      $cpanelrequest = '/scripts2/suspendacct?domain=' . $params['username'] . '&user=' . $params['username'] . '&suspend-domain=Suspend';
    }

    $output = cpanel_req ($params['serversecure'], $params['serverip'], $params['serverusername'], $params['serverpassword'], $params['serveraccesshash'], $cpanelrequest);
    if (strpos ($output, 'Curl Error') == true)
    {
      $result = $output;
    }
    else
    {
      if (strpos ($output, '<form action="/login/" method="POST">') == true)
      {
        $result = 'Login Failed';
      }
      else
      {
        if (strpos ($output, 'account has been suspended') == true)
        {
          $result = 'success';
        }
        else
        {
          if (strpos ($output, 'Account Already Suspended') == true)
          {
            $result = 'Account Already Suspended';
          }
          else
          {
            if (strpos ($output, 'You do not have permission to suspend that account') == true)
            {
              $result = 'You do not have permission to suspend that account';
            }
            else
            {
              $result = 'An Unknown Error Occurred';
            }
          }
        }
      }
    }

    return $result;
  }

  function cpanel_unsuspendaccount ($params)
  {
    if (!$params['username'])
    {
      return 'Cannot perform action without accounts username';
    }

    if ($params['type'] == 'reselleraccount')
    {
      $cpanelrequest = '/scripts/suspendreseller?reseller=' . $params['username'] . '&resalso=1&un=1';
    }
    else
    {
      $cpanelrequest = '/scripts2/suspendacct?domain=' . $params['username'] . '&user=' . $params['username'] . '&unsuspend-domain=UnSuspend';
    }

    $output = cpanel_req ($params['serversecure'], $params['serverip'], $params['serverusername'], $params['serverpassword'], $params['serveraccesshash'], $cpanelrequest);
    if (strpos ($output, 'Curl Error') == true)
    {
      $result = $output;
    }
    else
    {
      if (strpos ($output, '<form action="/login/" method="POST">') == true)
      {
        $result = 'Login Failed';
      }
      else
      {
        if (strpos ($output, 'is now active') == true)
        {
          $result = 'success';
        }
        else
        {
          $result = 'An Unknown Error Occurred';
        }
      }
    }

    return $result;
  }

  function cpanel_changepassword ($params)
  {
    if (!$params['username'])
    {
      return 'Cannot perform action without accounts username';
    }

    $cpanelrequest = '/scripts/passwd?password=' . $params['password'] . '&user=' . $params['username'] . '';
    $output = cpanel_req ($params['serversecure'], $params['serverip'], $params['serverusername'], $params['serverpassword'], $params['serveraccesshash'], $cpanelrequest);
    if (strpos ($output, 'Curl Error') == true)
    {
      $result = $output;
    }
    else
    {
      if (strpos ($output, '<form action="/login/" method="POST">') == true)
      {
        $result = 'Login Failed';
      }
      else
      {
        if (strpos ($output, 'does not exist') == true)
        {
          $result = 'Account Does Not Exist';
        }
        else
        {
          if (strpos ($output, 'passwords must be at least 5 characters for security reasons') == true)
          {
            $result = 'Passwords must be at least 5 Characters';
          }
          else
          {
            if (strpos ($output, 'the password may not contain the username for security reasons') == true)
            {
              $result = 'Passwords may not contain the Username';
            }
            else
            {
              if (strpos ($output, 'has been changed') == true)
              {
                $result = 'success';
              }
              else
              {
                $result = 'An Unknown Error Occurred';
              }
            }
          }
        }
      }
    }

    return $result;
  }

  function cpanel_changepackage ($params)
  {
    if (!$params['username'])
    {
      return 'Cannot perform action without accounts username';
    }

    $cpanelrequest = '/scripts2/upacct?user=' . $params['username'] . '&pkg=' . urlencode ($params['configoption1']) . '';
    $output = cpanel_req ($params['serversecure'], $params['serverip'], $params['serverusername'], $params['serverpassword'], $params['serveraccesshash'], $cpanelrequest);
    if (strpos ($output, 'Curl Error') == true)
    {
      $result = $output;
    }
    else
    {
      if (strpos ($output, '<form action="/login/" method="POST">') == true)
      {
        $result = 'Login Failed';
      }
      else
      {
        if (strpos ($output, 'you must select a new plan') == true)
        {
          $result = 'You must specify the WHM Package Name in the package setup';
        }
        else
        {
          if (strpos ($output, 'Sorry you may not create any more accounts with the package') == true)
          {
            $result = 'You cannot create any more accounts with this package';
          }
          else
          {
            if (strpos ($output, 'Account Upgrade/Downgrade Complete') == true)
            {
              $result = 'success';
            }
            else
            {
              $result = 'An Unknown Error Occurred';
            }
          }
        }
      }
    }

    return $result;
  }

  function cpanel_loginlink ($params)
  {
    if ($params['serversecure'])
    {
      $whmport = '2087';
      $http = 'https';
    }
    else
    {
      $whmport = '2086';
      $http = 'http';
    }

    echo '<a href="' . $http . '://' . $params['serverip'] . ':' . $whmport . '/xfercpanel/' . $params['username'] . '" target="_blank" style="color:#cc0000">login to control panel</a>';
  }

  function cpanel_usageupdate ($params)
  {
    $cpanelrequest = '/xml-api/listaccts';
    $output = cpanel_req ($params['serversecure'], $params['serverip'], $params['serverusername'], $params['serverpassword'], $params['serveraccesshash'], $cpanelrequest);
    $output = explode ('<acct>', $output);
    foreach ($output as $data)
    {
      $data = xmltoarray ('<acct>' . $data);
      $data = $data['ACCT'];
      if ($data)
      {
        $domain = $data['DOMAIN'];
        $diskused = $data['DISKUSED'];
        $disklimit = $data['DISKLIMIT'];
        $diskused = str_replace ('M', '', $diskused);
        $disklimit = str_replace ('M', '', $disklimit);
        $query = '' . 'UPDATE tblhosting SET diskusage=\'' . $diskused . '\',disklimit=\'' . $disklimit . '\',lastupdate=now() WHERE domain=\'' . $domain . '\' AND server=\'' . $params['serverid'] . '\'';
        $result = mysql_query ($query);
        continue;
      }
    }

    $cpanelrequest = '/xml-api/showbw';
    $output = cpanel_req ($params['serversecure'], $params['serverip'], $params['serverusername'], $params['serverpassword'], $params['serveraccesshash'], $cpanelrequest);
    $output = explode ('<acct>', $output);
    foreach ($output as $data)
    {
      $data = xmltoarray ('<acct>' . $data);
      $data = $data['ACCT'];
      if ($data)
      {
        $domain = $data['MAINDOMAIN'];
        $bwused = $data['BWUSAGE']['USAGE'];
        $bwlimit = $data['LIMIT'];
        $bwused = $bwused / (1024 * 1024);
        $bwlimit = $bwlimit / (1024 * 1024);
        $query = '' . 'UPDATE tblhosting SET bwusage=\'' . $bwused . '\',bwlimit=\'' . $bwlimit . '\',lastupdate=now() WHERE domain=\'' . $domain . '\' AND server=\'' . $params['serverid'] . '\'';
        $result = mysql_query ($query);
        continue;
      }
    }

  }

  function cpanel_req ($usessl, $host, $user, $pass, $accesshash, $request)
  {
    global $debug_output;
    $cleanaccesshash = preg_replace ('\'(|
)\'', '', $accesshash);
    if ($cleanaccesshash)
    {
      $authstr = 'WHM ' . $user . ':' . $cleanaccesshash;
    }
    else
    {
      $authstr = 'Basic ' . base64_encode ($user . ':' . $pass);
    }

    $ch = curl_init ();
    if ($usessl)
    {
      curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt ($ch, CURLOPT_URL, '' . 'https://' . $host . ':2087' . $request);
    }
    else
    {
      curl_setopt ($ch, CURLOPT_URL, '' . 'http://' . $host . ':2086' . $request);
    }

    curl_setopt ($ch, CURLOPT_HEADER, 0);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    $curlheaders[0] = '' . 'Authorization: ' . $authstr;
    curl_setopt ($ch, CURLOPT_HTTPHEADER, $curlheaders);
    curl_setopt ($ch, CURLOPT_TIMEOUT, 150);
    $data = curl_exec ($ch);
    if (curl_errno ($ch))
    {
      $data = ' Curl Error - ' . curl_error ($ch) . ' (' . curl_errno ($ch) . ')';
    }

    curl_close ($ch);
    if ($debug_output == 'on')
    {
      echo '' . '<textarea rows=10 cols=120>' . $data . '</textarea>';
    }

    return $data;
  }
	
	
	
	

   
  }

// END FTP Class

/* End of file SSH.php */
/* Location: ./system/aplication/libraries/SSH.php */