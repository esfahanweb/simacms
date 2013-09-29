<!-- Full width tabs --> 
        <div class="widget">      
            <ul class="tabs">
                <?=$this->tabs->tab_menu($id, $this->uri->segment(3));?>
            </ul>
            
     <div class="tab_container">       

    <!-- Form with validation -->
        <form action="<? echo base_url().'admin/users/edit/'.$id; ?>" id="valid" class="mainForm" method="post">
            <fieldset>
            
             
               
                
               
                    
                     <div class="rowElem">
                        <label><? echo $this->lang->line('email'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="email" id="email" value="<? echo $email ?>"/>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('role'); ?> :</label>
                        <div class="formRight">
                            <select name="group_id">
                            <? echo $select_user_group ?>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('discount'); ?> :</label>
                        <div class="formRight">
                            <select name="discount_id">
                            <? echo $select_user_discount ?>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                     <div class="rowElem">
                        <label><? echo $this->lang->line('firstname'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="firstname" id="firstname" value="<? echo $firstname ?>"/>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('lastname'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="lastname" id="lastname" value="<? echo $lastname ?>"/>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                 
                    
                  
                    
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('site_language'); ?> :</label>
                        <div class="formRight">
                            <select name="site_language">
                            <? echo $select_user_site_language ?>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                    
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('site_template'); ?> :</label>
                        <div class="formRight">
                            <select name="site_template">
                            <? echo $select_user_site_template ?>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    <? if($user_is_admin == TRUE)
					{ ?>
                  
                    
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('admin_language'); ?> :</label>
                        <div class="formRight">
                            <select name="admin_language">
                            <? echo $select_user_admin_language ?>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                      <div class="rowElem">
                        <label><? echo $this->lang->line('admin_template'); ?> :</label>
                        <div class="formRight">
                            <select name="admin_template">
                            <? echo $select_user_admin_template ?>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <? } ?>
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('password'); ?> :</label>
                        <div class="formRight">
                            <input type="password" class="validate[equals[password2]" name="password" id="password1" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('repeat_password'); ?> :</label>
                        <div class="formRight">
                            <input type="password" class="validate[equals[password1]" name="password" id="password2" />
                            
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('status'); ?> :</label>
                        <div class="formRight">
                     
                            <select name="status" size="30">
                            <?
							 echo $Status_Option;
							?>
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
        
        
      
 <div class="fix"></div>	 
        </div>
        