<!-- Form with validation -->
<form action="<? echo base_url().'admin/currencies/edit/'.$id; ?>" id="valid" class="mainForm" method="post">
<fieldset>
<div class="widget"> 
<div class="head"><h5 class="iPencil"><?=$this->lang->line('editing_discount_with_id')?> : <?='<b>'.$id.'</b>'?></h5></div>
<!------------------------------------------------------->
<div class="rowElem noborder">
<label><?=$this->lang->line('title')?> :</label>
<div class="formRight">
<input type="text" class="validate[required]" name="title" id="title" value="<?=$title?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem noborder">
<label><?=$this->lang->line('prefix')?> :</label>
<div class="formRight">
<input type="text" class="" name="prefix" id="prefix" value="<?=$prefix?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem noborder">
<label><?=$this->lang->line('suffix')?> :</label>
<div class="formRight">
<input type="text" class="" name="suffix" id="suffix" value="<?=$suffix?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('rate')?> :</label>
<div class="formRight onlyNums">
<?=$rate?>
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