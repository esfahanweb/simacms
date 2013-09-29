<!-- Dynamic table -->
<div class="table">
<div class="head"></div>
<table dir="rtl" cellpadding="0" cellspacing="0" binvoice="0" class="display" id="example">
<thead>
<tr>
<th><? echo $this->lang->line('id'); ?></th>
<th><? echo $this->lang->line('invoice_number'); ?></th>
<th><? echo $this->lang->line('date'); ?></th>
<th><? echo $this->lang->line('username'); ?></th>
<th><? echo $this->lang->line('payment_method'); ?></th>
<th><? echo $this->lang->line('total'); ?></th>
<th><? echo $this->lang->line('payment_status'); ?></th>
<th><? echo $this->lang->line('status'); ?></th>
<th><? echo $this->lang->line('operations'); ?></th>
</tr>
</thead>
<tbody>          
<?=$show_invoices?>
</tbody>
</table>
</div>