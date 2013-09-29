<!-- Dynamic table -->
        <div class="table">
            <div class="head"><h5 class="iFrames">Dynamic table</h5></div>
            <table dir="rtl" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th class="center"><? echo $this->lang->line('id'); ?></th>
                        <th class="center"><? echo $this->lang->line('normal_username'); ?></th>
                        <th class="center"><? echo $this->lang->line('ras_ip'); ?></th>
                        <th class="center"><? echo $this->lang->line('group_name'); ?></th>
                        <th class="center"><? echo $this->lang->line('duration'); ?></th>
                        
                        <th class="center"><? echo $this->lang->line('login_time'); ?></th>
                          <th class="center"><? echo $this->lang->line('operations'); ?></th>
                    </tr>
                </thead>
                <tbody>
                
                <?
                
		
		foreach ($array[0] as $row)
		{
   			 echo '<tr>
                        <td class="center">'.$row['user_id'].'</td>
						<td class="center">'.$row['normal_username'].'</td>
						<td class="center">'.$row['ras_ip'].'</td>
						<td class="center">'.$row['group_name'].'</td>
						<td class="center">'.$this->ibsng->seconds($row['duration_secs']).'</td>
						
						<td class="center">'.$row['login_time'].'</td>
					
						<td class="center"><a href="'.base_url().'admin/ibsng/edit/'.$row['user_id'].'" title="" class="mr10"><img src="'.$TMPL.'/images/icons/dark/pencil.png" alt="" /></a><a href="'.base_url().'admin/ibsng/delete/'.$row['user_id'].'" title="" class="mr10"><img src="'.$TMPL.'/images/icons/dark/close.png" alt="" /></a></td>
					  </tr>' ;
					 
		}
		
		?>
                 
                  
                </tbody>
            </table>
        </div>