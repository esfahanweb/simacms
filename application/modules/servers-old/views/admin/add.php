    <!-- Form with validation -->
        <form action="<? echo base_url().'admin/discounts/add'; ?>" id="valid" class="mainForm" method="post">
            <fieldset>
            
             
                <div class="widget"> 
                
                    <div class="head"><h5 class="iAdd"><?=$this->lang->line('adding_new_discount')?></h5></div>
                    
                    
                    <div class="rowElem noborder">
                        <label><?=$this->lang->line('discount_title')?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="title" id="title"  />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><?=$this->lang->line('discount_type')?> :</label>
                        <div class="formRight">
						<? echo $type; ?>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><?=$this->lang->line('discount_value')?> :</label>
                        <div class="formRight onlyNums">
                            <input style="direction:ltr" type="text" class="validate[required]" name="value" id="value"  />
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