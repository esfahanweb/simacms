
   
    <!-- Form with validation -->
        <form action="<? echo base_url().'admin/settings/main'; ?>" id="valid" class="mainForm" method="post">
            <fieldset>
            
             
                <div class="widget"> 
                
                    <div class="head"><h5 class="iPencil"><? echo $this->lang->line('edit_main_settings'); ?></h5></div>
                    
                    
                    <div class="rowElem noborder">
                        <label><? echo $this->lang->line('company_name'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="companyname" id="companyname" value="<? echo $companyname; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                     <div class="rowElem">
                        <label><? echo $this->lang->line('website_email'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="Email" id="Email" value="<? echo $Email; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                     <div class="rowElem">
                        <label><? echo $this->lang->line('domain_url'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="Domain" id="Domain" value="<? echo $Domain; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                     <div class="rowElem">
                        <label><? echo $this->lang->line('copyright_text'); ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="copyright_text" id="copyright_text" value="<? echo $copyright_text; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                   
					
                    <div class="rowElem">
                        <label><? echo $this->lang->line('site_template'); ?> :</label>
                        <div class="formRight">                        
                            <select name="site_template">
                            <?
							echo $Site_Select_Template_Option;
							?>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('site_language'); ?> :</label>
                        <div class="formRight">                        
                            <select name="site_language">
                            <?
							echo $Site_Select_Language_Option;
							?>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                     <div class="rowElem">
                        <label><? echo $this->lang->line('admin_template'); ?> :</label>
                        <div class="formRight">                        
                            <select name="admin_template">
                            <?
							 echo $Admin_Select_Template_Option;
							?>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                    <div class="rowElem">
                        <label><? echo $this->lang->line('admin_language'); ?> :</label>
                        <div class="formRight">                        
                            <select name="admin_language">
                            <?
							 echo $Admin_Select_Language_Option;
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