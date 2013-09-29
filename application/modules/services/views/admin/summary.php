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
                                <td align="right"><? echo $this->lang->line('user_id'); ?> :</td>
                                <td align="right" class="webStatsLink"><? echo $this->admin_init->get_prop_from_id('users', $user_id, 'username'); ?></td>
                            </tr>
                            <tr>
                                <td align="right"><? echo $this->lang->line('date'); ?> :</td>
                                <td align="right" class="webStatsLink"><? echo $date; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><? echo $this->lang->line('duedate'); ?> :</td>
                                <td align="right" class="webStatsLink"><? echo $duedate; ?></td>
                            </tr>
                             <tr>
                                <td align="right"><? echo $this->lang->line('datepaid'); ?> :</td>
                                <td align="right" class="webStatsLink"><? echo $datepaid; ?></td>
                            </tr>
                             <tr>
                                <td align="right"><? echo 'total'; ?> :</td>
                                <td align="right" class="webStatsLink"><? echo $total; ?></td>
                            </tr>
                             <tr>
                                <td align="right"><? echo 'subtotal'; ?> :</td>
                                <td align="right" class="webStatsLink"><? echo $subtotal; ?></td>
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
            
            
           
                        
                
                
                </div>
                
                         
             
                
              
            
            <!-- Right column -->
            <div class="right">
            
            	 <!-- Website statistics -->
                <div class="widget">
                    <div class="head"><h5 class="iChart8"><? echo $this->lang->line('admin_stats'); ?></h5></div>
                   <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                       
                        <tbody>
                            <tr>
                                <td align="right"><? echo $this->lang->line('status'); ?> :</td>
                                <td align="right" class="webStatsLink"><? echo $this->invoices->status($status); ?></td>
                            </tr>
                             <tr>
                                <td align="right"><? echo $this->lang->line('status'); ?> :</td>
                                <td align="right" class="webStatsLink"><? echo $this->admin_init->get_prop_from_id('gateways', $gateway, 'title'); ?></td>
                            </tr>
                      
                            
                           
                            
                        </tbody>
                        
                        
                    </table>                 
                </div>
                
                
               
               </div> 
               
               <!-- Form with validation -->
        <form action="<? echo base_url().'admin/invoices/summary/'.$id; ?>" id="valid" class="mainForm" method="post">
        
                <!-- Website statistics -->
                <div class="widget">
                    <div class="head"><h5 class="iChart8"><? echo 'Invoice Items'; ?></h5></div>
                    
           
                   <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                       
                        <tbody>
                   <? foreach ($invoice_items as $item): ?>   	
               	 <tr>
               	 <td>
             <input type="text" class="validate[required]" name="update[<?=$item['id']?>][desc]" value="<?=$item['desc']?>" />
            	</td>
                <td>
             <input type="text" class="validate[required]" name="update[<?=$item['id']?>][Amount]" value="<?=$item['amount']?>" />
              <input type="hidden" name="update[<?=$item['id']?>][id]" value="<?=$item['id']?>" />
             </td>
             <td>
             <a href="<?=base_url()?>admin/invoices/items_delete/<?=$item['id']?>" class="mr10"><img src="<?=$TMPL?>/images/icons/dark/close.png" /></a>
            </td>
                </tr>
                <? endforeach ?>
                        
                  	 <tr>
               	 <td>
             <input type="text" name="add[desc]" maxlength="100" size="100" style="width:100%"  />
            	</td>
                <td>
             <input type="text" name="add[Amount]" maxlength="100" size="100" style="width:100%"  />
             </td>
             <td>
  
            </td>
                </tr>
                      
                  <tr>
               	 <td>
             <?='total'?>
            	</td>
                <td>
                <input type="hidden" name="total" value="<?=$total?>" />
            <?=$total?>
            	</td>
                </tr> 
                
                
                  <tr>
               	 <td>
                 
             <input type="submit" value="<? echo $this->lang->line('save_form'); ?>" class="greenBtn submitForm" />
                    <input type="reset" value="<? echo $this->lang->line('reset_form'); ?>" class="basicBtn submitForm" />
            	</td>
                <td>
             
            	</td>
                </tr>   
                        </tbody>

                    </table>   
                    
                    
                    
                             
                </div>          
</form>
                
                </div>
                </div>
 <div class="fix"></div>	 
        </div>
