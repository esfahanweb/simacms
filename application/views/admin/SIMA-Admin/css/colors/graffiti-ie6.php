<?php header("Content-type: text/css"); ?>
/*------------------------------------------------------------------------
# JA ZinC for joomla 1.5 - Version 1.0 - Licence Owner JA24521
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
	background: url(../../images/graffiti/content-top.gif) no-repeat center top;
}

#ja-slideshow-wrap {
	background: url(../../images/graffiti/content-center.gif) repeat-y center top;	
}

#ja-slideshow-bot {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/graffiti/content-bot.png', sizingMethod='crop');
 	background-image: none;
}

#ja-container-top {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/graffiti/content-top.png', sizingMethod='crop');
 	background-image: none; 
}

#ja-container {
	background: url(../../images/graffiti/content-center.gif) repeat-y center top;
}

#ja-container-bot {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/graffiti/content-bot.png', sizingMethod='crop');
 	background-image: none; 
}
