 <!-- Full width tabs --> 
        <div class="widget">      
            <ul class="tabs">
                <?=$this->tabs->tab_menu($id, $this->uri->segment(3));?>
            </ul>
            
     <div class="tab_container">  

<!-- Dynamic table -->
        <div class="table">
            <div class="head"><h5 class="iFrames">Dynamic table</h5></div>
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
                
 <? foreach ($results as $row):

echo 
	'<tr>
    <td>'.$row->id.'</td>
	<td>'.$row->date.'</td>
	<td>'.$row->duedate.'</td>
	<td>'.$row->total.'</td>
	<td>'.$this->admin_init->get_prop_from_id('gateways', $row->gateway, 'title').'</td>
	<td>'.$this->invoices->status($row->status).'</td>
	<td>
	<a href="'.base_url().'admin/invoices/edit/'.$row->id.'" class="mr10"><img src="'.$TMPL.'/images/icons/dark/pencil.png" /></a>
	<a href="'.base_url().'admin/invoices/delete/'.$row->id.'" class="mr10"><img src="'.$TMPL.'/images/icons/dark/close.png" /></a>
	</td>
	</tr>';
	
endforeach ?>
                 
                  
                </tbody>
            </table>
        </div>
           
</div>
               
 <div class="fix"></div>	 
        </div>

      