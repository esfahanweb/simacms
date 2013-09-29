<div class="moduletable">
<h3><?=$this->lang->line('profile_details')?></h3>





<?php echo validation_errors('<br /><div class="errorbox">', '</div><br />'); ?>  


<form action="<? echo base_url().'users/profiles/edit' ?>" id="valid" class="mainForm" method="post">

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
           <td width="150" class="fieldarea"><?=$this->lang->line('status')?> :</td>
            <td><?=$status?></td>
          </tr>
           <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('email')?> :</td>
            <td><?=$email?></td>
          </tr>
           <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('group')?> :</td>
            <td><?=$group?></td>
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
            <td><?=$site_template?></td>
          </tr>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('site_language')?> :</td>
            <td><?=$site_language?></td>
          </tr>
          
          <? if($admin_template){ ?>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('admin_template')?> :</td>
            <td><?=$admin_template?></td>
          </tr>
          <? } ?>
          
          
          <? if($admin_language){ ?>
          <tr>
           <td width="150" class="fieldarea"><?=$this->lang->line('admin_language')?> :</td>
            <td><?=$admin_language?></td>
          </tr>
          <? } ?>
          
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





