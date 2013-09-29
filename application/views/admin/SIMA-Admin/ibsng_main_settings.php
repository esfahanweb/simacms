
   
    <!-- Form with validation -->
        <form action="<? echo base_url().'admin/ibsng/main_settings'; ?>" id="valid" class="mainForm" method="post">
            <fieldset>
            
             
                <div class="widget"> 
                
                    <div class="head"><h5 class="iPencil"><? echo $this->lang->line('edit_main_settings'); ?></h5></div>
                    
                    
                    <div class="rowElem noborder">
                        <label><? echo 'ibsng_ip_address'; ?> :</label>
                        <div class="formRight">
                            <input style="direction:ltr" type="text" class="validate[required]" name="ibsng_ip_address" id="ibsng_ip_address" value="<? if(isset($ibsng_ip_address)) echo $ibsng_ip_address; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                     <div class="rowElem">
                        <label><? echo 'ibsng_server_port'; ?> :</label>
                        <div class="formRight">
                            <input style="direction:ltr" type="text" class="validate[required]" name="ibsng_server_port" id="ibsng_server_port" value="<? if(isset($ibsng_server_port)){ echo $ibsng_server_port; }else{ echo 1235; } ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                     <div class="rowElem">
                        <label><? echo 'ibsng_timeout'; ?> :</label>
                        <div class="formRight">
                            <input style="direction:ltr" type="text" class="validate[required]" name="ibsng_timeout" id="ibsng_timeout" value="<? if(isset($ibsng_timeout)){ echo $ibsng_timeout; }else{ echo 240; } ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                     <div class="rowElem">
                        <label><? echo 'ibsng_server_username'; ?> :</label>
                        <div class="formRight">
                            <input style="direction:ltr" type="text" class="validate[required]" name="ibsng_server_username" id="ibsng_server_username" value="<? if(isset($ibsng_server_username)) echo $ibsng_server_username; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                      <div class="rowElem">
                        <label><? echo 'ibsng_server_password'; ?> :</label>
                        <div class="formRight">
                            <input style="direction:ltr" type="text" class="validate[required]" name="ibsng_server_password" id="ibsng_server_password" value="<? if(isset($ibsng_server_password)) echo $ibsng_server_password; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                      <div class="rowElem">
                        <label><? echo 'ibsng_admin_prefix'; ?> :</label>
                        <div class="formRight">
                            <input style="direction:ltr" type="text" class="validate[required]" name="ibsng_admin_prefix" id="ibsng_admin_prefix" value="<? if(isset($ibsng_admin_prefix)) echo $ibsng_admin_prefix; ?>" />
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