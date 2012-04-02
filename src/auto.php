<?php
if(!defined('PT_GREGOOVERSE_NET')) exit;

function autoload($class)
{
    $file = strtolower(str_replace('_', '.', $class));
    $path = 'cls/' . $file . '.php';

    if(file_exists($path))
        require_once $path;
    else
        trigger_error('Undefined class : ' . $class . ' (' . $path . ')', E_USER_ERROR);
}

spl_autoload_register('autoload');

?>
