<!-- Form with validation -->
<form action="<? echo base_url().'admin/orders/delete/'.$id; ?>" id="valid" class="mainForm" method="post">
<fieldset>
<div class="widget"> 
<div class="head"><h5 class="iPencil"><? echo $this->lang->line('deleting_order_with_id'); ?> : <? echo '<b>'.$id.'</b>'; ?></h5></div>
<!------------------------------------------------------->
<div class="rowElem noborder">
<span style="color:#CC3300"> <? echo $desc ?></span>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<input <? echo $button; ?> name="submit" type="submit" style="direction:rtl" value="<? echo $this->lang->line('yes'); ?>"  />
<a href="<? echo base_url(); ?>admin/orders/show" title="" style="float:right; padding: 3px;" class="basicBtn" ><? echo $this->lang->line('no'); ?></a>
</div>           
<br />
<div class="fix"></div>
<!------------------------------------------------------->
</div>
</fieldset>
</form>   
<!-- Form -->