<!-- Form with validation -->
<form action="<?=base_url().'admin/gateways/add/'?>" id="valid" class="mainForm" method="post">
<fieldset>
<div class="widget"> 
<div class="head"><h5 class="iAdd"><?=$this->lang->line('adding_new_gateway')?></h5></div>
<!------------------------------------------------------->
<div class="rowElem noborder">
<label><?=$this->lang->line('title')?> :</label>
<div class="formRight">
<input type="text" class="validate[required]" name="title" id="title" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('type')?> :</label>
<div class="formRight">
<?=$type?>
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