<form action="<?=base_url().$redirect?>" id="valid" class="mainForm" method="post">
<fieldset>
<div class="widget"> 
<div class="head"><h5 class="iPencil"><?='payment success'?></h5></div>
<br />
<input type="hidden" name="Amount" id="Amount" value="<?=$amount?>"  />
<input type="submit" value="<?='Takmile farayande kharid'?>" class="greenBtn submitForm" />
<br />
<div class="fix"></div>
</div>
</fieldset>
</form>