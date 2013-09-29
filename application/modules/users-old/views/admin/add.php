    <!-- Form with validation -->
        <form action="<? echo base_url().'admin/users/add' ?>" id="valid" class="mainForm" method="post">
            <fieldset>
            
             
                <div class="widget"> 
                
                    <div class="head"><h5 class="iPencil"><? echo $this->lang->line('adding_new_user'); ?></h5></div>
                    
                      <div class="rowElem">
                        <label><? echo $this->lang->line('email'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="email" id="email" />
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
                        <label><? echo $this->lang->line('firstname'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="firstname" id="firstname" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('lastname'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="lastname" id="lastname" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                  
                    
                  
                
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('site_template'); ?> :</label>
                        <div class="formRight">
                            <select name="site_template">
                            <? echo $select_user_template ?>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('site_language'); ?> :</label>
                        <div class="formRight">
                            <select name="site_language">
                            <? echo $Form_Select_user_Languages ?>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('password'); ?> :</label>
                        <div class="formRight">
                            <input type="password" class="validate[required,equals[password2]]" name="password" id="password1" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('repeat_password'); ?> :</label>
                        <div class="formRight">
                            <input type="password" class="validate[required,equals[password1]]" name="password" id="password2" />
                            
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
                    
                    
                     
                    
                   
                    
                    <input type="submit" value="ذخیره تغییرات" class="greenBtn submitForm" />
                    <input type="reset" value="خالی کردن فرم" class="basicBtn submitForm" />
                    <br />
                    <div class="fix"></div>
                        
                </div>
            </fieldset>
        </form>   
        
        <!-- Form -->