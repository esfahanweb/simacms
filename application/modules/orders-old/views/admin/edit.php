<script type="text/javascript" src="<? echo $TMPL ?>/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",

        // Example content CSS (should be your site CSS)
        content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>




    <!-- Form with validation -->
        <form action="<? echo base_url().'admin/emails/edit/'.$id; ?>" id="valid" class="mainForm" method="post">
            <fieldset>
            
             
                <div class="widget"> 
                
                    <div class="head"><h5 class="iPencil"><? echo $this->lang->line('editing_post_with_id'); ?> : <? echo '<b>'.$id.'</b>'; ?></h5></div>
                    
                    
                    <div class="rowElem noborder">
                        <label><? echo 'from'; ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="from" id="from" value="<? echo $from; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                    <div class="rowElem noborder">
                        <label><? echo 'copy_to'; ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="copy_to" id="copy_to" value="<? echo $copy_to; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    
                    <div class="rowElem noborder">
                        <label><? echo 'subject'; ?> :</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="subject" id="subject" value="<? echo $subject; ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem">
                        <label><? echo 'email_text'; ?> :</label>
                        <div class="formRight">
                     
                            <textarea  name="email_text" id="email_text"><? echo $email_text; ?></textarea>
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