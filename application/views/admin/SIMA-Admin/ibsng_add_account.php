    <!-- Form with validation -->
        <form action="<? echo base_url().'admin/ibsng/add_account' ?>" id="valid" class="mainForm" method="post">
            <fieldset>
            
             
                <div class="widget"> 
                
                    <div class="head"><h5 class="iPencil"><? echo $this->lang->line('adding_new_category'); ?></h5></div>
                    
                    
                   <div class="rowElem">
                        <label><? echo 'ibsng_group_name'; ?> :</label>
                        <div class="formRight">
                        	<select name="ibsng_group_name">
                            <? echo $ibsng_group_name ?>
                            </select>
                            
                            
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                   
                    
                     
                    
                   
                    
                    <input type="submit" value="<? echo $this->lang->line('save_form'); ?>" class="greenBtn submitForm" />
                    <input type="reset" value="<? echo $this->lang->line('empty_form'); ?>" class="basicBtn submitForm" />
                    <br />
                    <div class="fix"></div>
                        
                </div>
            </fieldset>
        </form>   
        
        <!-- Form -->