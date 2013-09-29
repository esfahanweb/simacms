<script>
function show_mail(id)
{
	$.post("<?php echo base_url().'emails/admin/show/show_email'?>", { id: id },
	 function(data){
	   jAlert(data.message, data.subject);
	 }, "json");
}
</script>

<!-- Dynamic table -->
<div class="table">
<div class="head"></div>
<table dir="rtl" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
<thead>
<tr>
<th><?=$this->lang->line('id')?></th>
<th><?=$this->lang->line('type')?></th>
<th><?=$this->lang->line('title')?></th>
<th><?=$this->lang->line('subject')?></th>
<th><?=$this->lang->line('operations')?></th>
</tr>
</thead>
<tbody>          
<?=$show_email_templates?>
</tbody>
</table>
</div>


