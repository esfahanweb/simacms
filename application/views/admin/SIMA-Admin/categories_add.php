    <!-- Form with validation -->
        <form action="<? echo base_url().'admin/categories/add' ?>" id="valid" class="mainForm" method="post">
            <fieldset>
            
             
                <div class="widget"> 
                
                    <div class="head"><h5 class="iPencil"><? echo $this->lang->line('adding_new_category'); ?></h5></div>
                    
                    
                    <div class="rowElem noborder">
                        <label><? echo $this->lang->line('category_name'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="Name" id="Name"  />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('seo_url'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="seo_url" id="seo_url"  />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                     <div class="rowElem">
                        <label><? echo $this->lang->line('category_description'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="" name="Description" id="Description"  />
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