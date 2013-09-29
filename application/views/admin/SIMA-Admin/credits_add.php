    <!-- Form with validation -->
        <form action="<? echo base_url().'admin/gateways/payment' ?>" id="valid" class="mainForm" method="post">
            <fieldset>
            
             
                <div class="widget"> 
                
                    <div class="head"><h5 class="iPencil"><? echo $this->lang->line('adding_new_category'); ?></h5></div>
                    
                    
                    <div class="rowElem noborder">
                        <label><? echo 'amount'; ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="Amount" id="Amount"  />
                        </div>
                        <div class="fix"></div>
                    </div>
                   
                   
                   <div class="rowElem">
                        <label><? echo $this->lang->line('admin_template'); ?> :</label>
                        <div class="formRight">
                            <select name="gateway_id">
                            <? echo $gateway_id?>
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