<?php if(!defined('PT_GREGOOVERSE_NET')) exit; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo page::title(true);?></title>
        
        <!-- jquery -->
        <script src='//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js' type='text/javascript'></script>
        
        <!-- yetii -->
        <script type="text/javascript" src="js/yetii.min.js"></script>-
        
        <!-- syntax highlighter -->
        <link href="js/sxhl/shThemeDefault.css" rel="stylesheet" type="text/css" />
        <link href="js/sxhl/shCore.css" rel="stylesheet" type="text/css" />
        <link href="js/sxhl/shBrushAsm.css" rel="stylesheet" type="text/css" />
        <script src="js/sxhl/shCore.js" type="text/javascript"></script>
        <script src="js/sxhl/shAutoloader.js" type="text/javascript"></script>
        
        <!-- repo.js -->
        <script src="js/repo-min.js" type="text/javascript"></script>
        
        <!-- disqus -->
        <!--<script src='http://freebox.disqus.com/embed.js' type='text/javascript'></script>-->
        
        <link href='//fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
	    <link href="style.css" rel="stylesheet" type='text/css'>
    </head> 
    <body>
        <header>
            <? echo $conf_website; ?>
        </header>
        <?php require_once 'inc/ribbon.php'; ?>