<?php if(!defined('PT_GREGOOVERSE_NET')) exit; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>pt.gregooverse.net<?php echo page::title();?></title>
        
        <!-- jquery -->
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js' type='text/javascript'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js' type='text/javascript'></script>
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/flick/jquery-ui.css" rel="stylesheet" type="text/css" />
        
        <!-- syntax highlighter -->
        <link href="js/sxhl/shThemeDefault.css" rel="stylesheet" type="text/css" />
        <link href="js/sxhl/shCore.css" rel="stylesheet" type="text/css" />
        <link href="js/sxhl/shBrushAsm.css" rel="stylesheet" type="text/css" />
        <script src="js/sxhl/shCore.js" type="text/javascript"></script>
        <script src="js/sxhl/shAutoloader.js" type="text/javascript"></script>
        
        <!-- disqus -->
        <!--<script src='http://freebox.disqus.com/embed.js' type='text/javascript'></script>-->
        
        <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
	<link href="style.css" rel="stylesheet" type='text/css'>
        
    </head> 
    <body>
        <header>
            pt.gregooverse.net
        </header>
        <?php require_once 'inc/ribbon.php'; ?>