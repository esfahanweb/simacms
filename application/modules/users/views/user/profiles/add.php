<div class="moduletable">
<h3><?=$this->lang->line('profile_register')?></h3>





<?php echo validation_errors('<br /><p class="error">', '</p><br />'); ?>  


<form action="<? echo base_url().'user/profiles/register' ?>" id="valid" class="mainForm" method="post">

  <table width="100%" cellspacing="0" cellpadding="0" class="frame">
    <tr>
      <td><table width="100%" border="0" cellpadding="10" cellspacing="0">
          <tr>
            <td width="150" class="fieldarea"><?=$this->lang->line('firstname')?> :</td>
            <td><input type="text" name="firstname" size="25" /></td>
          </tr>
          <tr>
            <td width="150" class="fieldarea"><?=$this->lang->line('lastname')?> :</td>
            <td><input type="text" name="lastname" size="25" /></td>
          </tr>
          <tr>
            <td width="150" class="fieldarea"><?=$this->lang->line('companyname')?> :</td>
            <td><input type="text" name="companyname" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('address')?> :</td>
            <td><input type="text" name="address" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('state')?> :</td>
            <td><input type="text" name="state" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('city')?> :</td>
            <td><input type="text" name="city" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('postcode')?> :</td>
            <td><input type="text" name="postcode" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('phonenumber')?> :</td>
            <td><input type="text" name="phonenumber" size="25" /></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('site_template')?> :</td>
            <td><?=$site_template?></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('site_language')?> :</td>
            <td><?=$site_language?></td>
          </tr>
          
          
          <tr>
          <td width="150" class="fieldarea"><?=$this->lang->line('password')?> :</td>
            <td><input type="password" name="password" value="" size="25" /></td>
          </tr>

         
          
         
      </table></td>
    </tr>
  </table>

<p align="center">
    <input type="submit" value="submit" class="button" />
    <input type="reset" value="<?=$this->lang->line('cancel')?>" class="button" />
  </p>



</div>





