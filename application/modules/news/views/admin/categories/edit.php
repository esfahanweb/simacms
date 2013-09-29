<!-- Full width tabs --> 
<div class="widget">                
<div class="tab_container">  
<!------------------------------------------------------->     
<!-- Form with validation -->
<form action="<? echo base_url().'admin/news/categories/edit/'.$id; ?>" id="valid" class="mainForm" method="post">
<fieldset>
<div class="widget"> 
<div class="head"><h5 class="iPencil"><?=$this->lang->line('editing_user_with_id')?> : <?=$id?></h5></div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('category_name')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="validate[required]" name="name" id="name" value="<?=$name?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('seo_url')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="validate[required]" name="seo_url" id="seo_url" value="<?=$seo_url?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('description')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" name="description" id="description" value="<?=$description?>" />
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