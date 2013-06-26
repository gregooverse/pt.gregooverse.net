/* Syntax highlight */
SyntaxHighlighter.autoloader(
    'asm    js/sxhl/shBrushAsm.js',
    'sql    js/sxhl/shBrushSql.js',
    'php    js/sxhl/shBrushPhp.js',
    'asp    js/sxhl/shBrushVb.js'
);
SyntaxHighlighter.defaults['gutter'] = false;
SyntaxHighlighter.defaults['toolbar'] = false;
SyntaxHighlighter.defaults['quick-code'] = false;
SyntaxHighlighter.all();
