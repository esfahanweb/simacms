<!-- Form with validation -->
<form action="<? echo base_url().'admin/modules/summary/'.$name; ?>" id="valid" class="mainForm" method="post">
<fieldset>
<div class="widget"> 
<div class="head"><h5 class="iPencil"><?=$this->lang->line('editing_module_with_id')?> : <?='<b>'.$name.'</b>'?></h5></div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('module_type')?> :</label>
<div class="formRight">
<? echo $name; ?>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<? 
$style = array(
              'class'        => 'basicBtn submitForm',
            );
$this->modules->show_buttons($name, $style) ?>

<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="fix"></div>
</div>
</fieldset>
</form>   
<!-- Form -->