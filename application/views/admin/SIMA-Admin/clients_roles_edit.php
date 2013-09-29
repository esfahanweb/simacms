    <!-- Form with validation -->
        <form action="<? echo base_url().'admin/users/edit_roles/'.$id; ?>" id="valid" class="mainForm" method="post">
            <fieldset>
            
             
                <div class="widget"> 
                
                    <div class="head"><h5 class="iPencil"><? echo $this->lang->line('editing_user_with_id'); ?> : <? echo '<b>'.$id.'</b>'; ?></h5></div>
                    
                    
                    <div class="rowElem noborder">
                        <label><? echo $this->lang->line('title'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="name" id="name" value="<? echo $name; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('roles'); ?> :</label>
                        <div class="formRight">
                            <table width="100%">
                            <tr>
                            <td width="33%">
                            <? echo $this->lang->line('home'); ?> 
                            <? echo $User_Perms_Home; ?>
                            </td>
                             <td width="33%">
                             
                            
                             </td>
                             <td width="33%">
                            
                            </td>
                            </tr>
                            
                            
                             <tr>
                            <td width="33%">
                           <? echo $this->lang->line('details'); ?>
                            <? echo $User_Perms_Details; ?>
                            </td>
                             <td width="33%">
                            
                            </td>
                             <td width="33%">
                            
                            </td>
                            </tr>
                            
                            
                            <tr>
                            <td width="33%">
                            <? echo $this->lang->line('categories'); ?>
                            <? echo $User_Perms_Categories; ?>
                            </td>
                             <td width="33%">
                            
                            </td>
                             <td width="33%">
                            
                            </td>
                            </tr>
                            <tr>
                            <td width="33%">
                            <? echo $this->lang->line('posts'); ?>
                            <? echo $User_Perms_Posts; ?>
                            </td>
                             <td width="33%">
                             
                            </td>
                             <td width="33%">
                            
                            </td>
                            </tr>

                            </table>
                            
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