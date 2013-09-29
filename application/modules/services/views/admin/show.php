<!-- Dynamic table -->
        <div class="table">
            <div class="head"><h5 class="iFrames">Dynamic table</h5></div>
            <table dir="rtl" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th class="center"><? echo $this->lang->line('id'); ?></th>
                        <th class="center"><? echo $this->lang->line('user'); ?></th>
                        <th class="center"><? echo $this->lang->line('date'); ?></th>
                        <th class="center"><? echo $this->lang->line('duedate'); ?></th>
                        <th class="center"><? echo $this->lang->line('total'); ?></th>
                        <th class="center"><? echo $this->lang->line('gateway'); ?></th>
                        <th class="center"><? echo $this->lang->line('status'); ?></th>
                        <th class="center"><? echo $this->lang->line('operations'); ?></th>
                    </tr>
                </thead>
                <tbody>
                
                <?
                
		
		foreach ($results as $row)
		{
   			 echo '<tr>
                        <td class="center">'.$row->id.'</td>
						<td class="center">'.$this->admin_init->get_prop_from_id('users', $row->user_id, 'firstname').' '.$this->admin_init->get_prop_from_id('users', $row->user_id, 'lastname').'</td>
						<td class="center">'.$row->date.'</td>
						<td class="center">'.$row->duedate.'</td>
						<td class="center">'.$row->total.'</td>
						<td class="center">'.$this->admin_init->get_prop_from_id('gateways', $row->gateway, 'title').'</td>
						<td class="center">'.$this->invoices->status($row->status).'</td>
						<td class="center"><a href="'.base_url().'admin/invoices/summary/'.$row->id.'" title="" class="mr10"><img src="'.$TMPL.'/images/icons/dark/pencil.png" alt="" /></a><a href="'.base_url().'admin/invoices/delete/'.$row->id.'" title="" class="mr10"><img src="'.$TMPL.'/images/icons/dark/close.png" alt="" /></a>
						
					
						
						</td>
					  </tr>' ;
					  
					 
		}
		
		?>
                 
                  
                </tbody>
            </table>
        </div>