<!-- Dynamic table -->
<div class="table">
<div class="head"></div>
<table dir="rtl" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
<thead>
<tr>
<th class="center"><? echo $this->lang->line('id'); ?></th>
<th class="center"><? echo $this->lang->line('cat_id'); ?></th>
<th class="center"><? echo $this->lang->line('title'); ?></th>
<th class="center"><? echo $this->lang->line('create_date'); ?></th>
<th class="center"><? echo $this->lang->line('status'); ?></th>
<th><? echo $this->lang->line('operations'); ?></th>
</tr>
</thead>
<tbody>          
<?=$show_posts?>
</tbody>
</table>
</div>