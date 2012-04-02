SyntaxHighlighter.autoloader(
    'asm    js/sxhl/shBrushAsm.js',
    'sql    js/sxhl/shBrushSql.js',
    'php    js/sxhl/shBrushPhp.js',
    'asp    js/sxhl/shBrushVb.js'
);
SyntaxHighlighter.defaults['gutter'] = false;
SyntaxHighlighter.defaults['toolbar'] = false;
SyntaxHighlighter.all();

$(".accordion").accordion({ autoHeight: false, collapsible: true });
$(".tabs").tabs({ collapsible: true });