 

<!-- Dynamic table -->
        <div class="table">
            <div class="head"></div>
            
           
            
            <table dir="rtl" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th><?=$this->lang->line('id')?></th>
                        <th><?=$this->lang->line('title')?></th>
                        <th><?=$this->lang->line('title')?></th>
                        <th><?=$this->lang->line('title')?></th>
                        <th><?=$this->lang->line('operations')?></th>
                    </tr>
                </thead>
                <tbody>
                
            
				
<? foreach ($results as $row):
$this->load->library($row['type']);
echo 
	'<tr>
    <td>'.$row['id'].'</td>
	<td>'.$row['title'].'</td>
	<td>'.$row['ipaddress'].'</td>
	<td>'.$row['type'].'</td>
	<td>
	<a href="'.base_url().'admin/servers/edit/'.$row['id'].'" class="mr10"><img src="'.$TMPL.'/images/icons/dark/pencil.png" /></a>
	<a href="'.base_url().'admin/servers/delete/'.$row['id'].'" class="mr10"><img src="'.$TMPL.'/images/icons/dark/close.png" /></a>
	'.$this->$row['type']->adminlink($row).'
	</td>
	</tr>';
	
endforeach ?>



                 
                  
                </tbody>
            </table>
        </div>