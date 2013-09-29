<!-- Dynamic table -->
        <div class="table">
            <div class="head"><h5 class="iFrames">Dynamic table</h5></div>
            <table dir="rtl" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th><? echo $this->lang->line('id'); ?></th>
                        <th><? echo $this->lang->line('firstname').' , '.$this->lang->line('lastname'); ?></th>
                        <th><? echo $this->lang->line('email'); ?></th>
                        <th><? echo $this->lang->line('role'); ?></th>
                        <th><? echo $this->lang->line('status'); ?></th>
                        <th><? echo $this->lang->line('operations'); ?></th>
                    </tr>
                </thead>
                <tbody>
                
                
<? foreach ($results as $row):

echo 
	'<tr>
    <td>'.$row->id.'</td>
	<td>'.$row->firstname.' '.$row->lastname.'</td>
	<td>'.$row->email.'</td>
	<td>'.$this->admin_init->get_prop_from_id('groups',$row->group_id, 'title').'</td>
	<td>'.$row->status.'</td>
	<td>
	<a href="'.base_url().'admin/users/emails/'.$row->id.'" class="mr10"><img src="'.$TMPL.'/images/icons/dark/mail.png" /></a>
	<a href="'.base_url().'admin/users/invoices/'.$row->id.'" class="mr10"><img src="'.$TMPL.'/images/icons/dark/money2.png" /></a>
	<a href="'.base_url().'admin/users/edit/'.$row->id.'" class="mr10"><img src="'.$TMPL.'/images/icons/dark/pencil.png" /></a>
	<a href="'.base_url().'admin/users/delete/'.$row->id.'" class="mr10"><img src="'.$TMPL.'/images/icons/dark/close.png" /></a>
	</td>
	</tr>';
	
endforeach ?>

            
                  
                </tbody>
            </table>
        </div>