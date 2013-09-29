



<div class="post">
<div class="post_top"><h2> header </h2></div>
<div class="post_body">
<div class="text">
		
        
  <?php echo validation_errors('<br /><div class="errorbox">', '</div><br />'); ?>      
        
  <form action="<? echo base_url().'login' ?>" id="valid" class="mainForm" method="post">


  <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" border="0" align="center" class="frame">
    <tr>
      <td><table border="0" align="center" cellpadding="10" cellspacing="0">
          <tr>
            <td width="150" align="right" class="fieldarea"><?=$this->lang->line('email')?> :</td>
            <td><input type="text" name="email" class="validate[required]" id="email" /></td>
          </tr>
          <tr>
            <td width="150" align="right" class="fieldarea"><?=$this->lang->line('password')?> :</td>
            <td><input type="password" name="password" class="validate[required]" id="password" /></td>
          </tr>
         
          <tr>
            <td width="150" align="right" class="fieldarea">&nbsp;</td>
            <td><input type="submit" value="<?=$this->lang->line('login')?>" /></td>
          </tr>
        </table></td>
    </tr>
  </table><br />
</form>


<br />







</div></div>


<div class="post_bottom"></div>
</div>





