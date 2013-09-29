<!-- Form with validation -->
<form action="<?=base_url().'admin/users/profiles/add/'?>" id="valid" class="mainForm" method="post">
<fieldset>
<div class="widget"> 
<div class="head"><h5 class="iAdd"><?=$this->lang->line('adding_new_user')?></h5></div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('email')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="validate[required,custom[email]]" name="email" id="email" />
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
<div class="head"><h5 class="iPencil"><?=$this->lang->line('edit_user_details')?></h5></div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('firstname')?> :</label>
<div class="formRight">
<input type="text" class="validate[required]" name="lastname" id="lastname" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('lastname')?> :</label>
<div class="formRight">
<input type="text" class="validate[required]" name="lastname" id="lastname" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('companyname')?> :</label>
<div class="formRight">
<input type="text" class="" name="companyname" id="companyname" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('state')?> :</label>
<div class="formRight">
<input type="text" class="" name="state" id="state" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('city')?> :</label>
<div class="formRight">
<input type="text" class="" name="city" id="city" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('address')?> :</label>
<div class="formRight">
<textarea name="address" id="address" /></textarea>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('postcode')?> :</label>
<div class="formRight">
<input type="text" class="" name="postcode" id="postcode" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('phonenumber')?> :</label>
<div class="formRight">
<input type="text" class="" name="phonenumber" id="phonenumber" />
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