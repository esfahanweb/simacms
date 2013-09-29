<!-- Dynamic table -->
<div class="table">
<div class="head"></div>
<table dir="rtl" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
<thead>
<tr>
<th><? echo $this->lang->line('id'); ?></th>
<th><? echo $this->lang->line('firstname').' , '.$this->lang->line('lastname'); ?></th>
<th><? echo $this->lang->line('email'); ?></th>
<th><? echo $this->lang->line('group'); ?></th>
<th><? echo $this->lang->line('status'); ?></th>
<th><? echo $this->lang->line('operations'); ?></th>
</tr>
</thead>
<tbody>          
<?=$show_users?>
</tbody>
</table>
</div>