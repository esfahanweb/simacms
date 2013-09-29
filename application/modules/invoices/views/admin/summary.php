<!-- Full width tabs --> 
<div class="widget">      
<ul class="tabs">
<?=$tabs?>
</ul>
<div class="tab_container">       

<!-- Widgets -->
<div class="widgets">

<!-- Left column -->
<div class="left">
            
<!-- Website statistics -->
<div class="widget">
<div class="head"><h5 class="iChart8"><? echo 'Invoice Information' ?></h5></div>
<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
<tbody>
<tr>
<td align="right"><?='user_id'?> :</td>
<td align="right" class="webStatsLink"><?='<a href="'.base_url().'admin/users/summary/'.$invoices['user_id'].'" class="mr10">'.$this->admin_init->get_prop_from_id('users', $invoices['user_id'], 'username').'</a>'?></td>
</tr>
<tr>
<td align="right"><?='date'?> :</td>
<td align="right" class="webStatsLink"><?=$invoices['date']?></td>
</tr>
<tr>
<td align="right"><?='duedate'?> :</td>
<td align="right" class="webStatsLink"><?=$invoices['duedate']?></td>
</tr>
<tr>
<td align="right"><?='datepaid'?> :</td>
<td align="right" class="webStatsLink"><?=$invoices['datepaid']?></td>
</tr>
<tr>
<td align="right"><?='subtotal'?> :</td>
<td align="right" class="webStatsLink"><?=$invoices['subtotal']?></td>
</tr>
<tr>
<td align="right"><?='total'?> :</td>
<td align="right" class="webStatsLink"><?=$invoices['total']?></td>
</tr>
</tbody>
</table>  
                
</div>
            
</div>
                
                         
<!-- Right column -->
<div class="right">
            
<!-- Website statistics -->
<div class="widget">
<div class="head"><h5 class="iChart8"><? echo $this->lang->line('admin_stats'); ?></h5></div>
<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
<tbody>
<tr>
<td align="right"><?='status'?> :</td>
<td align="right" class="webStatsLink"><? echo $this->invoices->status($invoices['status']); ?></td>
</tr>
<tr>
<td align="right">
<?
$this->invoices->button('accept');
?>
</td>
<td align="right" class="webStatsLink">
<?
$this->invoices->button('cancel');
?>
</td>
</tr>
<tr>
<td align="right">
<?
$this->invoices->button('pending');
?>
</td>
<td align="right" class="webStatsLink">
</td>
</tr>
</tbody>
</table>                 
</div>
                
</div> 


<!-- Form with validation -->
<form action="<? echo base_url().'admin/invoices/summary/'.$id; ?>" id="valid" class="mainForm" method="post">              
<!-- Website statistics -->
<div class="widget">
<div class="head"><h5 class="iChart8"><? echo 'Invoice Details'; ?></h5></div>
<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
<tbody>

<?=$show_services?>

<tr>
               	 <td>
             <input type="text" name="add[desc]" maxlength="100" size="100" style="width:100%"  />
            	</td>
                <td>
             <input type="text" name="add[Amount]" maxlength="100" size="100" style="width:100%"  />
             </td>
             <td>
  
            </td>
                </tr>
                      
                  <tr>
               	 <td>
             <?='total'?>
            	</td>
                <td>
                <input type="hidden" name="total" value="<?=$total?>" />
            <?=$total?>
            	</td>
                </tr> 
                
                
                  <tr>
               	 <td>
                 
             <input type="submit" name="submit" value="<? echo $this->lang->line('save_form'); ?>" class="greenBtn submitForm" />
              <input type="reset" value="<? echo $this->lang->line('reset_form'); ?>" class="basicBtn submitForm" />
            	</td>
                <td>
             
            	</td>
                </tr>   
</tbody>
</table>
</div> 
</form>
               
</div>
</div>
<div class="fix"></div>	 
</div>