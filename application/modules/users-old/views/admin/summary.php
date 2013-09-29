 <!-- Full width tabs --> 
        <div class="widget">      
            <ul class="tabs">
                <?=$this->tabs->tab_menu($id, $this->uri->segment(3));?>
            </ul>
            
     <div class="tab_container">       
           

<!-- Widgets -->
        <div class="widgets">
            <div class="left"><!-- Left column -->
            
            
                
               
                
                <!-- Website statistics -->
                <div class="widget">
                    <div class="head"><h5 class="iChart8"><? echo 'User Information' ?></h5></div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                       
                        <tbody>
                            <tr>
                                <td align="right"><? echo $this->lang->line('firstname'); ?> :</td>
                                <td align="right" class="webStatsLink"><? echo $firstname; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><? echo $this->lang->line('lastname'); ?> :</td>
                                <td align="right" class="webStatsLink"><? echo $lastname; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><? echo $this->lang->line('email'); ?> :</td>
                                <td align="right" class="webStatsLink"><? echo $email; ?></td>
                            </tr>
                             <tr>
                                <td align="right"><? echo $this->lang->line('email'); ?> :</td>
                                <td align="right" class="webStatsLink"><? echo $email; ?></td>
                            </tr>
                            
                           
                            
                        </tbody>
                        
                        
                    </table>  
                    
                      <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                       
                        <tbody>
                            <tr>
                             
                                <td align="center" ><?='Reset & Send Password'?></td>
                            </tr>
                             <tr>
                             
                                <td align="center" ><?='Credit Card Information'?></td>
                            </tr>
                         </tbody>
                       </table>                 
                </div>
            
            
           
                           <!-- Website statistics -->
                <div class="widget">
                    <div class="head"><h5 class="iChart8"><? echo 'Other Information' ?></h5></div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                       
                        <tbody>
                            <tr>
                                <td align="right"><? echo $this->lang->line('status'); ?> :</td>
                                <td align="right" class="webStatsLink"><? echo $status; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><? echo $this->lang->line('group_id'); ?> :</td>
                                <td align="right" class="webStatsLink"><? echo $group_id; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><? echo $this->lang->line('discount_id'); ?> :</td>
                                <td align="right" class="webStatsLink"><? echo $discount_id; ?></td>
                            </tr>
                           
                            
                           
                            
                        </tbody>
                        
                        
                    </table>  
                    
                                
                </div>
                
                </div>
                
                         
             
                
              
            
            <!-- Right column -->
            <div class="right">
            
            	 <!-- Website statistics -->
                <div class="widget">
                    <div class="head"><h5 class="iChart8"><? echo $this->lang->line('admin_stats'); ?></h5></div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                        <thead>
                            <tr>
                             
                              <td><? echo $this->lang->line('admins'); ?></td>
                              <td width="21%"><? echo $this->lang->line('number'); ?></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td align="center"><span title="" class="webStatsLink" style="color:#0066CC;">[ <? echo $this->lang->line('all_admins'); ?> ]</span></td>
                                <td align="center" class="webStatsLink"><? echo $Number_Of_All_Admins; ?></td>
                            </tr>
                            
                            <tr>
                                <td align="center"><span title="" class="webStatsLink" style="color:#2a8827;">[ <? echo $this->lang->line('active_admins'); ?> ]</span></td>
                                <td align="center" class="webStatsLink"><? echo $Number_Of_Active_Admins; ?></td>
                            </tr>
                            
                            <tr>
                                <td align="center"><span title="" class="webStatsLink" style="color:#B55D5C;">[ <? echo $this->lang->line('inactive_admins'); ?> ]</span></td>
                                <td align="center" class="webStatsLink"><? echo $Number_Of_InActive_Admins; ?></td>
                            </tr>
                            
                        </tbody>
                    </table>                    
                </div>
                
                
               
               </div> 
                </div>
                </div>
 <div class="fix"></div>	 
        </div>
