<!-- Form with validation -->
<form action="<? echo base_url().'admin/prices/products/'.$relid; ?>" id="valid" class="mainForm" method="post">
<fieldset>
<?php foreach ($prices as $item):?>
<div class="widget"> 
<div class="head"><h5 class="iPencil"><?=$this->lang->line('editing_price_with_id')?> : <?='<b>'.$this->admin_init->get_prop_from_id('currencies', $item['currency'], 'title').'</b>'?></h5></div>
<!------------------------------------------------------->

<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
<tbody>
<!------------------------------------------------------->
<tr>
<td>
cycle
</td>
<td>
setup
</td>
<td>
price
</td>           
</tr>
<!------------------------------------------------------->
<tr>
<td>
monthly
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][msetupfee]" value="<?=$item['msetupfee']?>" />
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][monthly]" value="<?=$item['monthly']?>" />
</td>          
</tr>
<!------------------------------------------------------->
<tr>
<td>
quarterly
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][qsetupfee]" value="<?=$item['qsetupfee']?>" />
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][quarterly]" value="<?=$item['quarterly']?>" />
</td>          
</tr>
<!------------------------------------------------------->
<tr>
<td>
semiannually
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][ssetupfee]" value="<?=$item['ssetupfee']?>" />
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][semiannually]" value="<?=$item['semiannually']?>" />
</td>          
</tr>
<!------------------------------------------------------->
<tr>
<td>
annually
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][asetupfee]" value="<?=$item['asetupfee']?>" />
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][annually]" value="<?=$item['annually']?>" />
</td>          
</tr>
<!------------------------------------------------------->
<tr>
<td>
biennially
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][bsetupfee]" value="<?=$item['bsetupfee']?>" />
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][biennially]" value="<?=$item['biennially']?>" />
</td>          
</tr>
<!------------------------------------------------------->
<tr>
<td>
triennially
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][tsetupfee]" value="<?=$item['tsetupfee']?>" />
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][triennially]" value="<?=$item['triennially']?>" />
</td>          
</tr>
</tbody>
</table>   

<!------------------------------------------------------->



<div class="fix"></div>
</div>
<?php endforeach;?>

<!------------------------------------------------------->
<input type="submit" name="submit" id="submit" value="<? echo $this->lang->line('save_form'); ?>" class="greenBtn submitForm" />
<input type="reset" id="reset" value="<? echo $this->lang->line('reset_form'); ?>" class="basicBtn submitForm" />
<br />

</fieldset>
</form>   
<!-- Form -->