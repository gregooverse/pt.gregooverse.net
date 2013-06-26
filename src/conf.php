<?php
// Website name
$conf_website = 'beta.gregooverse.net';

// Website ribbon
ribbon::adds(array(
    'Test' => 'test',
    'Aging & Mixing viewer' => 'aging',
    '.dll generator' => 'dll',
    'Programs' => 'program',
    'Clan files' => 'clan',
    'IIS+PHP5' => 'iis',
    'OllyDbg' => 'olly',
    'Miscellaneous' => 'misc',
    'Skins' => 'skin',
    'Links/Files' => 'link',
    'Source' => 'source'
));

// .dll generator
$conf_dll = array(
    'files' => array(
        'clan',
        'clan-procedure',
        'sql',
    ),
    
    'sizes' => array(
            'instance' => 0x29,
            'username' => 0x20,
            'password' => 0x20,
    ),

    'offsets' => array(
            'clan' => array(
                    'query' => array(0x13324, 0x13358, 0x134C0, 0x13700, 0x137C8, 0x13820, 0x13878, 0x138B0, 0x138DC, 0x139A8),
                    'string' => array(0x13405),
                    'instance' => array(0x16660),
                    'username' => array(0x166E0),
                    'password' => array(0x16760),
            ),
            'clan-procedure' => array(
                    'query' => array(0x13324, 0x13358, 0x134C0, 0x13700, 0x137C8, 0x13820, 0x13878, 0x138B0, 0x138DC, 0x139A8),
                    'string' => array(0x13405),
                    'instance' => array(0x16660),
                    'username' => array(0x166E0),
                    'password' => array(0x16760),
            ),
            'sql' => array(
                    'query' => array(0x4F5E8, 0x4F670, 0x4F838, 0x4F8E8, 0x4F948, 0x4F9F4, 0x4FA40, 0x4FB48, 0x4FDA0, 0x4FE54, 0x4FEA0, 0x50114, 0x50169, 0x501E5, 0x503B1, 0x50421, 0x505F8, 0x506A0, 0x50888, 0x50930, 0x50988, 0x50A30, 0x50A78, 0x50B00, 0x50BD8, 0x50D50, 0x51940, 0x519C8, 0x51A40, 0x51C70, 0x51DD8, 0x51ED0, 0x51FC8, 0x52100, 0x521F8, 0x522A0, 0x52350, 0x523AC, 0x52A38, 0x52A90, 0x52B0C, 0x52B48, 0x52BC5, 0x52C0D, 0x52C69, 0x52CB8, 0x53258, 0x532D0, 0x53DC0, 0x54010),
                    'string' => array(0x4F731),
                    'instance' => array(0x5E660, 0x5E7E0, 0x5E960, 0x5EAE0, 0x5EC60, 0x5EDE0, 0x5EF60, 0x5F4E8, 0x5F6E8, 0x5F8E8),
                    'username' => array(0x5E6E0, 0x5E860, 0x5E9E0, 0x5EB60, 0x5ECE0, 0x5EE60, 0x5EFE0, 0x5F568, 0x5F768, 0x5F968),
                    'password' => array(0x5E760, 0x5E8E0, 0x5EA60, 0x5EBE0, 0x5ED60, 0x5EEE0, 0x5F060, 0x5F5E8, 0x5F7E8, 0x5F9E8),
            ),
    ),
);
?>
