<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo $companyname.' - '.$PageTitle; ?></title>

<link href="<? echo $TMPL ?>/css/main.css" rel="stylesheet" type="text/css" />




</head>

<body>



<!-- Login form area -->
<div class="loginWrapper">
	
    <div class="loginPanel">
        <div class="head"><h5 class="iUser"><? echo $this->lang->line('admin_login'); ?></h5></div>
         <form action="<? echo base_url().'admin/login' ?>" id="valid" class="mainForm" method="post">
            <fieldset>
                <div class="loginRow noborder">
                    <label for="username"><? echo $this->lang->line('username'); ?> :</label>
                    <div class="loginInput"><input type="text" name="username" class="validate[required]" id="username" /></div>
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                    <label for="password"><? echo $this->lang->line('password'); ?> :</label>
                    <div class="loginInput"><input type="password" name="password" class="validate[required]" id="password" /></div>
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                  
                    <input type="submit" value="<? echo $this->lang->line('login'); ?>" class="greyishBtn submitForm" />
                    <div class="fix"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>