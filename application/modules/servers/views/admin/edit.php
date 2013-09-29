<!-- Form with validation -->
<form action="<? echo base_url().'admin/servers/edit/'.$id; ?>" id="valid" class="mainForm" method="post">
<fieldset>
<div class="widget"> 
<div class="head"><h5 class="iPencil"><?=$this->lang->line('editing_server_with_id')?> : <?='<b>'.$id.'</b>'?></h5></div>
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
<label><?=$this->lang->line('hostname')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="validate[required]" name="hostname" id="hostname" value="<?=$hostname?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('ipaddress')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="validate[required]" name="ipaddress" id="ipaddress" value="<?=$ipaddress?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('monthlycost')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="" name="monthlycost" id="monthlycost" value="<?=$monthlycost?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('noc')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="" name="noc" id="noc" value="<?=$noc?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('maxaccounts')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="" name="maxaccounts" id="maxaccounts" value="<?=$maxaccounts?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('status')?> :</label>
<div class="formRight">
<?=$status?><?=$this->lang->line('tick_status_desc')?>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="widget"> 
<div class="head"><h5 class="iPencil"><?=$this->lang->line('edit_nameservers')?></h5></div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('nameserver1')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="" name="nameserver1" id="nameserver1" value="<?=$nameserver1?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('nameserver1ip')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="" name="nameserver1ip" id="nameserver1ip" value="<?=$nameserver1ip?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('nameserver2')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="" name="nameserver2" id="nameserver2" value="<?=$nameserver2?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('nameserver2ip')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="" name="nameserver2ip" id="nameserver2ip" value="<?=$nameserver2ip?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('nameserver3')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="" name="nameserver3" id="nameserver3" value="<?=$nameserver3?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('nameserver3ip')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="" name="nameserver3ip" id="nameserver3ip" value="<?=$nameserver3ip?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('nameserver4')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="" name="nameserver4" id="nameserver4" value="<?=$nameserver4?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('nameserver4ip')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="" name="nameserver4ip" id="nameserver4ip" value="<?=$nameserver4ip?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="widget"> 
<div class="head"><h5 class="iPencil"><?=$this->lang->line('edit_server_details')?></h5></div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('type')?> :</label>
<div class="formRight">
<? echo $type; ?>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('username')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="text" class="validate[required]" name="username" id="username" value="<?=$username?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('password')?> :</label>
<div class="formRight">
<input style="direction:ltr" type="password" class="" name="password" id="password" /><?=$this->lang->line('password_desc')?>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('secure')?> :</label>
<div class="formRight onlyNums">
<?=$secure?><?=$this->lang->line('tick_secure_desc')?>
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