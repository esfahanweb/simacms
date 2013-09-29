<!-- Dynamic table -->
<div class="table">
<div class="head"></div>
<table dir="rtl" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
<thead>
<tr>
<th class="center"><? echo $this->lang->line('id'); ?></th>
<th class="center"><? echo $this->lang->line('title'); ?></th>
<th class="center"><? echo $this->lang->line('description'); ?></th>
<th><? echo $this->lang->line('operations'); ?></th>
</tr>
</thead>
<tbody>          
<?=$show_categories?>
</tbody>
</table>
</div>