



<div class="post">
<div class="post_top"><h2><?=$this->lang->line('show_details')?></h2></div>
<div class="post_body">
<div class="text">




<?php echo validation_errors('<br /><div class="errorbox">', '</div><br />'); ?>  


<form action="<? echo base_url().'Userarea/details' ?>" id="valid" class="mainForm" method="post">

  <table width="100%" cellspacing="0" cellpadding="0" class="frame">
    <tr>
      <td><table width="100%" border="0" cellpadding="10" cellspacing="0">
          <tr>
            <td width="150" class="fieldarea"><?=$this->lang->line('firstname')?> :</td>
            <td><input type="text" name="firstname" value="<?=$firstname?>" size="25" /></td>
          </tr>
          <tr>
            <td width="150" class="fieldarea"><?=$this->lang->line('lastname')?> :</td>
            <td><input type="text" name="lastname" value="<?=$lastname?>" size="25" /></td>
          </tr>
          <tr>
            <td width="150" class="fieldarea"><?=$this->lang->line('companyname')?> :</td>
            <td><input type="text" name="companyname" value="<?=$companyname?>" size="25" /></td>
          </tr>
           <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('email')?> :</td>
            <td><?=$email?></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('address')?> :</td>
            <td><input type="text" name="address" value="<?=$address?>" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('state')?> :</td>
            <td><input type="text" name="state" value="<?=$state?>" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('city')?> :</td>
            <td><input type="text" name="city" value="<?=$city?>" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('postcode')?> :</td>
            <td><input type="text" name="postcode" value="<?=$postcode?>" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('phonenumber')?> :</td>
            <td><input type="text" name="phonenumber" value="<?=$phonenumber?>" size="25" /></td>
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





