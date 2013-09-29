
   
    <!-- Form with validation -->
        <form action="<? echo base_url().'admin/users/settings'; ?>" id="valid" class="mainForm" method="post">
            <fieldset>
            
             
                <div class="widget"> 
                
                    <div class="head"><h5 class="iPencil"><? echo 'users settings'; ?></h5></div>
                    
                    
                    <div class="rowElem noborder">
                        <label><?='registered_group_id'?> :</label>
                        <div class="formRight">
                         <select name="registered_group_id">
                            <?=$registered_group_id?>
                         </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                    <div class="rowElem">
                        <label><?='unregistered_group_id'?> :</label>
                        <div class="formRight">
                         <select name="unregistered_group_id">
                            <?=$unregistered_group_id?>
                         </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                    
                    
                   
                    
                    
                    
                   
                    
                    <input type="submit" value="<? echo $this->lang->line('save_form'); ?>" class="greenBtn submitForm" />
                    <input type="reset" value="<? echo $this->lang->line('reset_form'); ?>" class="basicBtn submitForm" />
                    <br />
                    <div class="fix"></div>
                        
                </div>
            </fieldset>
        </form>   
        
        <!-- Form -->