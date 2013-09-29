    <!-- Form with validation -->
        <form action="<? echo base_url().'admin/ibsng/edit_groups/'.$id; ?>" id="valid" class="mainForm" method="post">
            <fieldset>
            
             
                <div class="widget"> 
                
                    <div class="head"><h5 class="iPencil"><? echo $this->lang->line('editing_cat_with_id'); ?> : <? echo '<b>'.$id.'</b>'; ?></h5></div>
                    
                    
                    <div class="rowElem noborder">
                        <label><? echo 'title' ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="title" id="title" value="<? echo $title; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><? echo 'ibsng_group_name'; ?> :</label>
                        <div class="formRight">
                        	<select name="ibsng_group_name">
                            <? echo $ibsng_group_name ?>
                            </select>
                            
                            
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                     <div class="rowElem">
                        <label><? echo 'price' ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="price" id="price" value="<? echo $price; ?>" />
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