<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fa-ir" lang="fa-ir">

<head>


  <title><? echo $PageTitle; ?></title>
 <script src="<? echo $TMPL ?>/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<? echo $TMPL ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<? echo $TMPL ?>/js/general.js"></script>

<link rel="stylesheet" type="text/css" href="<? echo $TMPL ?>/style.css" />


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>

<div class="top"></div>
<div class="base">
<div class="middle">

<div class="contact">


<div class="today"><?=$this->lang->line('today')?> : 

<? $this->init->show_date(); ?>
</div>
<div class="email"><?=$email?></div>
<div class="phone">09393939309</div>
</div><!--Contact -->


<div class="topmenu">
<div class="right"></div>
<div class="body">
<ul id="iconbar">
<li class="home"><a href="<? echo $URL ?>"><?=$this->lang->line('homepage')?><span><img src="<? echo $TMPL ?>/images/home.png" width="67" height="65" alt="صفحه نخست" /></span></a></li>

</ul>
</div>
<div class="left">
  </div>
</div><!--Top Menu -->

<div class="content">
<div class="content_top"></div>
<div class="content_bg">

<div class="news">
<div class="news_right"></div>
<div class="news_body"> &nbsp;  &nbsp;  &nbsp; 
<? //echo $BreadCrumbNav ?>
</div>
<div class="news_left"></div></div><!--News -->

<div id="right">




<div class="about">
<div class="about_top"></div>
<div class="about_body">
<div class="menu_title"><h6><?=$this->lang->line('categories')?></h6></div>
<div class="text"><ul>
     <? $this->blocks->Category_Menu(); ?>        

</ul></div>
</div>
<div class="about_bottom"></div></div><!--Menu -->




<? if($LOGGED_IN){ ?> 

<div class="about">
<div class="about_top"></div>
<div class="about_body">
<div class="menu_title"><h6><?=$this->lang->line('User_menu')?></h6></div>





<div class="text">
<ul>

		خوش آمدید <?=$this->init->logged_in_user['firstname']?>
          <li><a href="<?=$URL?>"><?=$this->lang->line('homepage')?></a></li>
          <li><a href="<?=$URL?>users/profiles/edit"><?=$this->lang->line('details')?></a></li>
          <li><a href="<?=$URL?>logout"><?=$this->lang->line('logout')?></a></li>
</ul>

</div>

</div>
<div class="about_bottom"></div></div><!--Menu -->

<? } ?>


<? if(!$LOGGED_IN){ ?> 

<div class="about">
<div class="about_top"></div>
<div class="about_body">
<div class="menu_title"><h6><?=$this->lang->line('login_menu')?></h6></div>
<div class="text">

<form action="<? echo base_url().'login' ?>" id="valid" class="mainForm" method="post">


  <table style="margin: 0 auto;" cellpadding="10" cellspacing="0" border="0" align="center" class="frame">
    <tr>
      <td><table border="0" align="center" cellpadding="2" cellspacing="0">
          <tr>
            <td width="150" align="right" class="fieldarea">email:</td>
            <td><input type="text" name="email" class="validate[required]" id="email" /></td>
          </tr>
          <tr>
            <td width="150" align="right" class="fieldarea">pass:</td>
            <td><input type="password" name="password" class="validate[required]" id="password" /></td>
          </tr>
         
          <tr>
            <td width="150" align="right" class="fieldarea">&nbsp;</td>
            <td><input type="submit" value="<?=$this->lang->line('login')?>" /></td>
          </tr>
        </table></td>
    </tr>
  </table><br />
</form>

<ul>
		<li><a href="<?=$URL?>login"><?=$this->lang->line('login')?></a></li>
        <li><a href="<?=$URL?>register"><?=$this->lang->line('register')?></a></li>
</ul>

</div>
</div>
<div class="about_bottom"></div></div><!--Menu -->

<? } ?>















</div><!--Right -->


<div id="left">

