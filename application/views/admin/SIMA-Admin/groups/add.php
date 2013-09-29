    <!-- Form with validation -->
        <form action="<? echo base_url().'admin/groups/add'; ?>" id="valid" class="mainForm" method="post">
            <fieldset>
            
             
                <div class="widget"> 
                
                    <div class="head"><h5 class="iPencil"><? echo $this->lang->line('add_new_admin_role'); ?></h5></div>
                    
                    
                    <div class="rowElem noborder">
                        <label><? echo $this->lang->line('category_name'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="title" id="title" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('descriptions'); ?> :</label>
                        <div class="formRight">
                            <textarea type="text" name="descriptions" id="descriptions" /></textarea>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
              
                    
                  
                     <div class="rowElem">
                        <label><?='roles'?> :</label>
                        <div class="formRight">
                            <?=$output?>
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