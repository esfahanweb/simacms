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
	background: url(../../images/game/content-top.gif) no-repeat center top;
}

#ja-slideshow-wrap {
	background: #F1F8FE;
}

#ja-slideshow div.moduletable {
	background: url(../../images/game/content-bot.gif) no-repeat center bottom;
}

#ja-container-top {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/game/content-top.png', sizingMethod='image');
}

#ja-container {
		background: #F1F8FE;
}

#ja-container-bot {
 display: none;
}
