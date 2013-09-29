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
                    <div class="head"><h5 class="iChart8"><? echo 'Order Information' ?></h5></div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                       
                        <tbody>
                            <tr>
                                <td align="right"><?='ordernum'?> :</td>
                                <td align="right" class="webStatsLink"><?=$orders['ordernum']?></td>
                            </tr>
                            <tr>
                                <td align="right"><?='user_id'?> :</td>
                                <td align="right" class="webStatsLink"><?=$orders['user_id']?></td>
                            </tr>
                            <tr>
                                <td align="right"><?='date'?> :</td>
                                <td align="right" class="webStatsLink"><?=$orders['date']?></td>
                            </tr>
                           
                            <tr>
                                <td align="right"><?='paymentmethod'?> :</td>
                                <td align="right" class="webStatsLink"><?=$orders['paymentmethod']?></td>
                            </tr>
                            <tr>
                                <td align="right"><?='invoice_id'?> :</td>
                                <td align="right" class="webStatsLink"><?=$orders['invoice_id']?></td>
                            </tr>
                             <tr>
                                <td align="right"><?='status'?> :</td>
                                <td align="right" class="webStatsLink"><?=$orders['status']?></td>
                            </tr>
                             <tr>
                                <td align="right"><?='ipaddress'?> :</td>
                                <td align="right" class="webStatsLink"><?=$orders['ipaddress']?></td>
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
                                <td align="right"><?='invoice_id'?> :</td>
                                <td align="right" class="webStatsLink"> <?='<a href="'.base_url().'admin/invoices/summary/'.$orders['invoice_id'].'" class="mr10">'.$orders['invoice_id'].'</a>'?></td>
                            </tr>
                             <tr>
                                <td align="right"><?='promocode'?> :</td>
                                <td align="right" class="webStatsLink"><?=$orders['promocode']?></td>
                            </tr>
                            <tr>
                                <td align="right"><?='promotype'?> :</td>
                                <td align="right" class="webStatsLink"><?=$orders['promotype']?></td>
                            </tr>
                            <tr>
                                <td align="right"><?='promovalue'?> :</td>
                                <td align="right" class="webStatsLink"><?=$orders['promovalue']?></td>
                            </tr>
                             <tr>
                                <td align="right"><?='amount'?> :</td>
                                <td align="right" class="webStatsLink"><?=$orders['amount']?></td>
                            </tr>
                            
                            <tr>
                                <td align="right">
                                <?
								$this->orders->button('accept');
								?>
                                </td>
                                <td align="right" class="webStatsLink">
								<?
                                $this->orders->button('cancel');
								?>
                                
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                <?
								$this->orders->button('pending');
								?>
                                </td>
                                <td align="right" class="webStatsLink">
								
                                
                                </td>
                            </tr>
                      
                            
                           
                            
                        </tbody>
                        
                        
                    </table>                 
                </div>
                
                
               
               </div> 
               
          <!-- Website statistics -->
                <div class="widget">
                    <div class="head"><h5 class="iChart8"><? echo 'Invoice Items'; ?></h5></div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                    <tbody>
          			 <?=$show_services?>
                    </tbody>
                	</table>
                   
                 </div> 
                
                </div>
                </div>
 <div class="fix"></div>	 
        </div>
