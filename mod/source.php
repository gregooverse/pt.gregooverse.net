<?php if(!defined('PT_GREGOOVERSE_NET')) exit; ?>
<div id="accordion" class="accordion">
    <ul id="accordion-nav" class="nav">
        <?php if(source::exists(page::get('f'))){ ?>
        <li><a href="#tab-1">Source: <?php echo page::get('f'); ?></a></li>
        <?php } ?>
        <li><a href="#tab-2">Tree</a></li>
    </ul>
        
    <div class="tabs">
        <?php if(source::exists(page::get('f'))) { ?>
        <div class="tab" id="tab-1">
            <h2>Source: <?php echo page::get('f'); ?></h2>
            <div><?php source::show(page::get('f')); ?></div>
        </div>
        <?php } ?>
        
        <div class="tab" id="tab-2">
            <h2>Tree</h2>
            <div><?php source::tree(); ?></div>
        </div>
    </div>
    
    <script type="text/javascript">
        new Yetii({ id: 'accordion' });
    </script>
</div>