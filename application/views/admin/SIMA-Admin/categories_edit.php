    <!-- Form with validation -->
        <form action="<? echo base_url().'admin/categories/edit/'.$id; ?>" id="valid" class="mainForm" method="post">
            <fieldset>
            
             
                <div class="widget"> 
                
                    <div class="head"><h5 class="iPencil"><? echo $this->lang->line('editing_cat_with_id'); ?> : <? echo '<b>'.$id.'</b>'; ?></h5></div>
                    
                    
                    <div class="rowElem noborder">
                        <label><? echo $this->lang->line('category_name'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="Name" id="Name" value="<? echo $Name; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('seo_url'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="seo_url" id="seo_url" value="<? echo $seo_url; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                     <div class="rowElem">
                        <label><? echo $this->lang->line('category_description'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="Description" id="Description" value="<? echo $Description; ?>" />
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