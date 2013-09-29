<!-- Form with validation -->
<form action="<? echo base_url().'admin/discounts/edit/'.$id; ?>" id="valid" class="mainForm" method="post">
<fieldset>
<div class="widget"> 
<div class="head"><h5 class="iPencil"><?=$this->lang->line('editing_discount_with_id')?> : <?='<b>'.$id.'</b>'?></h5></div>
<!------------------------------------------------------->
<div class="rowElem noborder">
<label><?=$this->lang->line('discount_title')?> :</label>
<div class="formRight">
<input type="text" class="validate[required]" name="title" id="title" value="<?=$title?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('discount_type')?> :</label>
<div class="formRight">
<? echo $type; ?>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('discount_value')?> :</label>
<div class="formRight onlyNums">
<input style="direction:ltr" type="text" class="validate[required]" name="value" id="value" value="<? echo $value; ?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<input type="submit" name="submit" id="submit" value="<? echo $this->lang->line('save_form'); ?>" class="greenBtn submitForm" />
<input type="reset" name="reset" id="reset" value="<? echo $this->lang->line('reset_form'); ?>" class="basicBtn submitForm" />
<br />
<div class="fix"></div>
</div>
</fieldset>
</form>   
<!-- Form -->