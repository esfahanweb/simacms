<!-- Dynamic table -->
        <div class="table">
            <div class="head"><h5 class="iFrames">Dynamic table</h5></div>
            <table dir="rtl" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th class="center"><? echo $this->lang->line('id'); ?></th>
                        <th class="center"><? echo $this->lang->line('name'); ?></th>
                        <th class="center"><? echo $this->lang->line('title'); ?></th>
                        <th class="center"><? echo $this->lang->line('operations'); ?></th>
                    </tr>
                </thead>
                <tbody>
                
                <?
                $query = $this->db->get('gateways');
		
		foreach ($query->result() as $row)
		{
   			 echo '<tr>
                        <td class="center">'.$row->id.'</td>
						<td class="center">'.$row->name.'</td>
						<td class="center">'.$row->title.'</td>
						<td class="center"><a href="'.base_url().'admin/gateways/edit/'.$row->id.'" title="" class="mr10"><img src="'.$TMPL.'/images/icons/dark/pencil.png" alt="" /></a><a href="'.base_url().'admin/gateways/delete/'.$row->id.'" title="" class="mr10"><img src="'.$TMPL.'/images/icons/dark/close.png" alt="" /></a>
						
					
						
						</td>
					  </tr>' ;
					  
					 
		}
		
		?>
                 
                  
                </tbody>
            </table>
        </div>