<!-- Form with validation -->
<form action="<? echo base_url().'admin/product_groups/edit/'.$id; ?>" id="valid" class="mainForm" method="post">
<fieldset>
<div class="widget"> 
<div class="head"><h5 class="iPencil"><?=$this->lang->line('editing_group_with_id')?> : <?='<b>'.$id.'</b>'?></h5></div>
<!------------------------------------------------------->
<div class="rowElem noborder">
<label><?=$this->lang->line('title')?> :</label>
<div class="formRight">
<input type="text" class="validate[required]" name="title" id="title" value="<?=$title?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('group_is_hidden')?> :</label>
<div class="formRight">
<?=$hidden?>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('gateways')?> :</label>
<div class="formRight">
<?=$gateways?>
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