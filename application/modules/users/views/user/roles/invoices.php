<!-- Full width tabs --> 
<div class="widget">      
<ul class="tabs">
<?=$tabs?>
</ul>           
<div class="tab_container">  
<!------------------------------------------------------->  
<!-- Dynamic table -->
<div class="table">
<div class="head"></div>
<table dir="rtl" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
<thead>
<tr>
<th><? echo $this->lang->line('id'); ?></th>
<th><? echo $this->lang->line('date'); ?></th>
<th><? echo $this->lang->line('duedate'); ?></th>
<th><? echo $this->lang->line('total'); ?></th>
<th><? echo $this->lang->line('gateway'); ?></th>
<th><? echo $this->lang->line('status'); ?></th>
<th><? echo $this->lang->line('operations'); ?></th>
</tr>
</thead>
<tbody>          
<?=$show_invoices?>
</tbody>
</table>
</div>
<!------------------------------------------------------->
<div class="fix"></div>	 
</div>
</div>