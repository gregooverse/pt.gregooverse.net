<?php if(!defined('PT_GREGOOVERSE_NET')) exit; ?>
<div id="accordion" class="accordion">
    <ul id="accordion-nav" class="nav">
        <?php if(file::exists(file::mod('program', page::get('f') . '/index.html'))){ ?>
        <li><a href="#tab-1">Program: <?php echo page::get('f'); ?></a></li>
        <?php } ?>
        <li><a href="#tab-2">List</a></li>
    </ul>
        
    <div class="tabs">
        <?php if(file::exists(file::mod('program', page::get('f') . '/index.html'))){ ?>
        <div class="tab" id="tab-1">
            <h2>Program: <?php echo page::get('f'); ?></h2>
            <div><?php require file::mod('program', page::get('f') . '/index.html'); ?></div>
        </div>
        <?php } ?>
        
        <div class="tab" id="tab-2">
            <h2>List</h2>
            <div><?php file::dirs('program'); ?></div>
        </div>
    </div>
    
    <script type="text/javascript">
        new Yetii({ id: 'accordion' });
    </script>
</div>

