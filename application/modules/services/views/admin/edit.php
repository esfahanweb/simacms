
      <div class="widget"> 
                
                    <div class="head"><h5 class="iPencil"><? echo $this->lang->line('editing_post_with_id'); ?> : <? echo '<b>'.$id.'</b>'; ?></h5></div>



    <!-- Form with validation -->
        <form action="<? echo base_url().'admin/services/edit/'.$id; ?>" id="valid" class="mainForm" method="post">
            <fieldset>
            
               <div class="rowElem noborder">
                        <label><? echo 'Order_id'; ?> :</label>
                        <div class="formRight">
                            <?='<a href="'.base_url().'admin/orders/summary/'.$order_id.'" class="mr10">'.$order_id.'</a>'?>
                        </div>
                        <div class="fix"></div>
                    </div>
          
                    
                    
                    <div class="rowElem">
                        <label><? echo 'from'; ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="from" id="from" value="<? echo $regdate; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                    <div class="rowElem">
                        <label><? echo 'copy_to'; ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="copy_to" id="copy_to" value="<? echo $paymentmethod; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                    <div class="rowElem">
                        <label><? echo 'subject'; ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="subject" id="subject" value="<? echo $firstpaymentamount; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                   
                    <div class="rowElem">
                        <label><? echo 'subject'; ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="subject" id="subject" value="<? echo $amount; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                     
                     <div class="rowElem">
                        <label><? echo 'subject'; ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="subject" id="subject" value="<? echo $billingcycle; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                    <div class="rowElem">
                        <label><? echo 'subject'; ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="subject" id="subject" value="<? echo $nextduedate; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                   
                    
                    
                    
                    
                   
                    
                    <input type="submit" value="<? echo $this->lang->line('save_form'); ?>" class="greenBtn submitForm" />
                    <input type="reset" value="<? echo $this->lang->line('reset_form'); ?>" class="basicBtn submitForm" />
                    <br />
                  
            </fieldset>
        </form>   
        
        <!-- Form -->
        <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                       
                        <tbody>
                        
                  	 <tr>
               	 <td align="center">
             <?=$this->$servers['type']->adminlink($servers)?>
            	</td>
                <td align="center">
             <?=$this->$servers['type']->adminlink($servers)?>
             </td>
              <td align="center">
             <?=$this->$servers['type']->adminlink($servers)?>
             </td>
              <td align="center">
             <?=$this->$servers['type']->adminlink($servers)?>
             </td>

                </tr>
                      
            
                
                
                  
                        </tbody>

                    </table>   
        
         
                    
                    
                <div class="fix"></div>
                        
                </div>