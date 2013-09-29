<!-- Full width tabs --> 
<div class="widget">      
<ul class="tabs">
<?=$tabs?>
</ul>           
<div class="tab_container">  
<!------------------------------------------------------->     
<!-- Form with validation -->
<form action="<? echo base_url().'admin/orders/edit/'.$id; ?>" id="valid" class="mainForm" method="post">
<fieldset>
<div class="widget"> 
<div class="head"><h5 class="iPencil"><?=$this->lang->line('editing_order_with_id')?> : <?=$id?></h5></div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('email')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="validate[required]" name="email" id="email" value="<?=$email?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('group')?> :</label>
<div class="formRight">
<select name="group_id">
<? echo $group_id; ?>
</select>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('discount')?> :</label>
<div class="formRight">
<select name="discount_id">
<? echo $discount_id; ?>
</select>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('site_language')?> :</label>
<div class="formRight">
<? echo $site_language; ?>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('site_template')?> :</label>
<div class="formRight">
<? echo $site_template; ?>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<? if(isset($admin_language)){ ?>
<div class="rowElem">
<label><?=$this->lang->line('admin_language')?> :</label>
<div class="formRight">
<? echo $admin_language; ?>
</div>
<div class="fix"></div>
</div>
<? } ?>
<!------------------------------------------------------->
<? if(isset($admin_template)){ ?>
<div class="rowElem">
<label><?=$this->lang->line('admin_template')?> :</label>
<div class="formRight">
<? echo $admin_template; ?>
</div>
<div class="fix"></div>
</div>
<? } ?>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('password')?> :</label>
<div class="formRight">
<input type="password" class="validate[equals[password2]" name="password" id="password1" /><?=$this->lang->line('password_desc')?>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('repeat_password')?> :</label>
<div class="formRight">
<input type="password" class="validate[equals[password1]" name="password" id="password2" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('status')?> :</label>
<div class="formRight">
<?=$status?>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="widget"> 
<div class="head"><h5 class="iPencil"><?=$this->lang->line('edit_order_details')?></h5></div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('firstname')?> :</label>
<div class="formRight">
<input type="text" class="validate[required]" name="lastname" id="lastname" value="<?=$firstname?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('lastname')?> :</label>
<div class="formRight">
<input type="text" class="validate[required]" name="lastname" id="lastname" value="<?=$lastname?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('companyname')?> :</label>
<div class="formRight">
<input type="text" class="" name="companyname" id="companyname" value="<?=$companyname?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('state')?> :</label>
<div class="formRight">
<input type="text" class="" name="state" id="state" value="<?=$state?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('city')?> :</label>
<div class="formRight">
<input type="text" class="" name="city" id="city" value="<?=$city?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('address')?> :</label>
<div class="formRight">
<textarea name="address" id="address" /><?=$address?></textarea>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('postcode')?> :</label>
<div class="formRight">
<input type="text" class="" name="postcode" id="postcode" value="<?=$postcode?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('phonenumber')?> :</label>
<div class="formRight">
<input type="text" class="" name="phonenumber" id="phonenumber" value="<?=$phonenumber?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<input type="submit" id="submit" value="<? echo $this->lang->line('save_form'); ?>" class="greenBtn submitForm" />
<input type="reset" id="reset" value="<? echo $this->lang->line('reset_form'); ?>" class="basicBtn submitForm" />
<br />
<!------------------------------------------------------->
<div class="fix"></div>
</div>
<!------------------------------------------------------->
</fieldset>
</form>   
<!-- Form -->
<!------------------------------------------------------->
<div class="fix"></div>	 
</div>
</div>