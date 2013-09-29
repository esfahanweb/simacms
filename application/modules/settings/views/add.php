<!-- Form with validation -->
<form action="<? echo base_url().'admin/settings' ?>" id="valid" class="mainForm" method="post">
<fieldset>
<div class="widget"> 
<div class="head"><h5 class="iPencil"><?=$this->lang->line('edit_settings')?></h5></div>
<!------------------------------------------------------->
<div class="rowElem noborder">
<label><?=$this->lang->line('companyname')?> :</label>
<div class="formRight">
<input type="text" class="" name="companyname" id="companyname" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('email')?> :</label>
<div class="formRight">
<input type="text" class="" name="email" id="email" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('domain')?> :</label>
<div class="formRight">
<input type="text" class="" name="domain" id="domain" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('copyright_text')?> :</label>
<div class="formRight">
<input type="text" class="" name="copyright_text" id="copyright_text" />
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
<div class="rowElem">
<label><?=$this->lang->line('admin_language')?> :</label>
<div class="formRight">
<? echo $admin_language; ?>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('admin_template')?> :</label>
<div class="formRight">
<? echo $admin_template; ?>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<input type="submit" id="submit" value="<? echo $this->lang->line('save_form'); ?>" class="greenBtn submitForm" />
<input type="reset" id="reset" value="<? echo $this->lang->line('reset_form'); ?>" class="basicBtn submitForm" />
<br />
<div class="fix"></div>
</div>
</fieldset>
</form>   
<!-- Form -->