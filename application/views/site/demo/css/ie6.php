<?php header("Content-type: text/css"); ?>
/*------------------------------------------------------------------------
# Ja Zinc J15 - Version 1.0 - Licence Owner JA108425
# ------------------------------------------------------------------------
# Copyright (C) 2004-2008 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: J.O.O.M Solutions Co., Ltd
# Websites:  http://www.joomlart.com -  http://www.joomlancers.com
# This file may not be redistributed in whole or significant part.
-------------------------------------------------------------------------*/
<?php
$template_path = dirname( dirname( $_SERVER['REQUEST_URI'] ) );
?>
h1.logo a {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/logo.png', sizingMethod='image');
 	background-image: none;
}

#ja-wrapper {
	position: relative;
	z-index: 1;
}

#ja-mainnavwrap,
#ja-headerwrap {
	z-index: 100;
}

#ja-mainnavwrap {
	height: 35px;
}

#ja-cssmenu li ul {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/trans-bg.png', sizingMethod='scale');
 	background-image: none;
}

#ja-cssmenu li li{
  background: url(../images/blank.png)!important;
}

#ja-slideshow {
	background: url(../images/content-top.gif) no-repeat center top;
}

#ja-slideshow-wrap {
	background: url(../images/content-center.gif) repeat-y center top;	
}

#ja-slideshow-bot {
	background: url(../images/content-bot.gif) no-repeat left bottom;
}

#ja-slideshow-mask {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/sl-mask.png', sizingMethod='image');
 	background-image: none;
 	left: 0;
}

#ja-container-top {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/content-top.png', sizingMethod='crop');
 	background-image: none;
}

#ja-container {
	background: url(../images/content-center.gif) repeat-y center top;
}

#ja-container-bot {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/content-bot.png', sizingMethod='crop');
 	background-image: none;
}

#ja-banner {
	width: 500px;
}

p.stickynote {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/icon-sticky.png', sizingMethod='crop');
 	background-image: url(images/blank.gif);
	width: 89%;
}

p.download {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/icon-download.png', sizingMethod='crop');
 	background-image: url(images/blank.gif);
	width: 89%;
}

p.error {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/icon-error.png', sizingMethod='crop');
 	background-image: url(images/blank.gif);
	width: 80%;
}

p.message {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/icon-info.png', sizingMethod='crop');
 	background-image: url(images/blank.gif);
	width: 80%;
}

p.tips {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/icon-tips.png', sizingMethod='crop');
 	background-image: url(images/blank.gif);
	width: 80%;
}
