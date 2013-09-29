<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$PageTitle?> - <?=$companyname?> <?=$this->lang->line('management_system')?></title>

<link href="<?=$TMPL?>/css/sima.css" rel="stylesheet" type="text/css" />
<link href="<?=$TMPL?>/css/main.css" rel="stylesheet" type="text/css" />
<link href="<?=$TMPL?>/css/messi.css" rel="stylesheet" type="text/css" />

<script src="<?=$TMPL?>/js/jquery-1.4.4.js" type="text/javascript"></script>
       
<script type="text/javascript" src="<?=$TMPL?>/js/spinner/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/spinner/ui.spinner.js"></script>

<script type="text/javascript" src="<?=$TMPL?>/js/jquery-ui.min.js"></script> 



<script type="text/javascript" src="<?=$TMPL?>/js/fileManager/elfinder.min.js"></script>

<script type="text/javascript" src="<?=$TMPL?>/js/wysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/wysiwyg/wysiwyg.image.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/wysiwyg/wysiwyg.link.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/wysiwyg/wysiwyg.table.js"></script>

<script type="text/javascript" src="<?=$TMPL?>/js/flot/jquery.flot.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/flot/excanvas.min.js"></script>

<script type="text/javascript" src="<?=$TMPL?>/js/dataTables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/dataTables/colResizable.min.js"></script>

<script type="text/javascript" src="<?=$TMPL?>/js/forms/forms.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/forms/autotab.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/forms/<?=$LANG?>/jquery.validationEngine-lang.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/forms/jquery.validationEngine.js"></script>

<script type="text/javascript" src="<?=$TMPL?>/js/colorPicker/colorpicker.js"></script>

<script type="text/javascript" src="<?=$TMPL?>/js/uploader/plupload.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/uploader/plupload.html5.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/uploader/plupload.html4.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/uploader/jquery.plupload.queue.js"></script>

<script type="text/javascript" src="<?=$TMPL?>/js/ui/progress.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/ui/jquery.alerts.js"></script>

<script type="text/javascript" src="<?=$TMPL?>/js/jBreadCrumb.1.1.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/cal.min.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/jquery.ToTop.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/jquery.listnav.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/jquery.sourcerer.js"></script>

<script type="text/javascript" src="<?=$TMPL?>/js/custom.js"></script>
<script type="text/javascript" src="<?=$TMPL?>/js/messi.js"></script>

</head>

<body>

<!-- Top navigation bar -->
<div id="topNav" style="font-family:tahoma; font-size:8pt">
    <div class="fixed">
        <div class="wrapper">
            <div class="welcome"> <span><?=$FirstName.' '.$LastName.' ('.$Group_ID.'), '. $this->lang->line('welcome_to_admin_system')?> |  <?=$this->lang->line('today_date')?> : <?=$this->init->show_date('Admin')?></span></div>
            <div class="userNav">
                <ul>
                <li><a href="<?=base_url().'admin/login'?>" title=""><img src="<?=$TMPL?>/images/icons/topnav/logout.png" alt="" /><span><?=$logout?></span></a></li>
                    <li><a href="<?=base_url().'admin/admins/edit/'.$User_ID?>" title=""><img src="<?=$TMPL?>/images/icons/topnav/profile.png" alt="" /><span><?=$my_profile?></span></a></li>
                  
                   
     
                    
                     <li class="dd"><img src="<?=$TMPL?>/images/icons/topnav/settings.png" alt="" /><span><?=$settings?></span>
                        <ul class="menu_body">
                            <li><a href="<?=base_url().'admin/settings/main'?>" title=""><?=$main_settings?></a></li>
                            <li><a href="<?=base_url().'admin/users/settings'?>" title=""><?='admin/users/settings'?></a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <div class="fix"></div>
        </div>
    </div>
</div>

<!-- Header -->
<div id="header" class="wrapper">
    
    
    <div class="fix"></div>
</div>

<!-- Main wrapper -->
<div class="wrapper" >

	<!-- Left navigation -->
    <div class="leftNav" style="float:right">
    	<ul id="menu">
        	<? $this->admin_init->show_admin_blocks(); ?>
            
            
          
          
         
            
            
             
         
            
            
            <li class="tables"><a href="#" title="" class="exp"><span><?=$this->lang->line('admins')?></span></a>
            	<ul class="sub">
                	<li><a href="<?=base_url().'admin/admins/show_roles'?>" title=""><?=$this->lang->line('show_search_admins')?></a></li>
                    <li><a href="<?=base_url().'admin/admins/add'?>" title=""><?=$this->lang->line('add_new_admin')?></a></li>
                </ul>
            </li>
            
            
            
           
        </ul>
    </div>

	<!-- Content -->
    <div class="content" id="container" style="float:left">
    	<div class="title"><h5><?=$PageTitle?></h5></div>
        
