<?php header("Content-type: text/css"); ?>
/*------------------------------------------------------------------------
# JA Vauxite for joomla 1.5 - Version 1.0 - Licence Owner JA24521
# ------------------------------------------------------------------------
# Copyright (C) 2004-2008 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: J.O.O.M Solutions Co., Ltd
# Websites:  http://www.joomlart.com -  http://www.joomlancers.com
# This file may not be redistributed in whole or significant part.
-------------------------------------------------------------------------*/
<?php
$template_path = dirname (dirname( dirname( $_SERVER['REQUEST_URI'] ) ) );
?>

h1.logo a {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/game/logo.png', sizingMethod='image');
 	background-image: none;
}

#ja-slideshow {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/grass/content-top.png', sizingMethod='crop');
 	background-image: none;
}

#ja-slideshow-wrap {
	background: url(../../images/grass/content-center.jpg) repeat-y center top;		
}

#ja-slideshow-bot {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/grass/content-bot.png', sizingMethod='crop');
 	background-image: none;
}

#ja-container-top {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/grass/content-top.png', sizingMethod='crop');
 	background-image: none;
}

#ja-container {
	background: url(../../images/grass/content-center.jpg) repeat-y center top;	
}

#ja-container-bot {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/grass/content-bot.png', sizingMethod='crop');
 	background-image: none;
}
