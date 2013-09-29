



<div class="post">
<div class="post_top"><h2><?=$this->lang->line('show_details')?></h2></div>
<div class="post_body">
<div class="text">




<?php echo validation_errors('<br /><div class="errorbox">', '</div><br />'); ?>  


<form action="<? echo base_url().'register' ?>" id="valid" class="mainForm" method="post">

  <table width="100%" cellspacing="0" cellpadding="0" class="frame">
    <tr>
      <td><table width="100%" border="0" cellpadding="10" cellspacing="0">
          <tr>
            <td width="150" class="fieldarea"><?=$this->lang->line('firstname')?> :</td>
            <td><input type="text" name="firstname" value="" size="25" /></td>
          </tr>
          <tr>
            <td width="150" class="fieldarea"><?=$this->lang->line('lastname')?> :</td>
            <td><input type="text" name="lastname" value="" size="25" /></td>
          </tr>
          <tr>
            <td width="150" class="fieldarea"><?=$this->lang->line('companyname')?> :</td>
            <td><input type="text" name="companyname" value="" size="25" /></td>
          </tr>
           <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('email')?> :</td>
            <td><input type="text" name="email" value="" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('address')?> :</td>
            <td><input type="text" name="address" value="" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('state')?> :</td>
            <td><input type="text" name="state" value="" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('city')?> :</td>
            <td><input type="text" name="city" value="" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('postcode')?> :</td>
            <td><input type="text" name="postcode" value="" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('phonenumber')?> :</td>
            <td><input type="text" name="phonenumber" value="" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('site_template')?> :</td>
            <td><select name="site_template"><?=$select_user_template?></select></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('site_language')?> :</td>
            <td><select name="site_language"><?=$Form_Select_user_Languages?></select></td>
          </tr>
          <td width="150" class="fieldarea"><?=$this->lang->line('password')?> :</td>
            <td><input type="password" name="password" value="" size="25" /></td>
          </tr>

         
          
         
      </table></td>
    </tr>
  </table>

<p align="center">
    <input type="submit" value="<?=$this->lang->line('submit')?>" class="button" />
    <input type="reset" value="<?=$this->lang->line('cancel')?>" class="button" />
  </p>



</div></div>


<div class="post_bottom"></div>
</div>





