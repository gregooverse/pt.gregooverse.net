<?php
if(!defined('PT_GREGOOVERSE_NET')) exit;

class hex {
    public static function string($data, $offset, $length = false){
        if($length === false){
            
            $string = false;
            $total_length = strlen($data);

            do{
                $chunk = substr($data, $offset, 1);

                if($chunk != "\x00"){
                    $string .= $chunk;
                    $offset++;
                }
            }
            while($chunk != "\x00" && $offset < $total_length);
        }else{
            $string = substr($data, $offset, $length);

            if($string[0] == "\x00")
                return false;
        }

        $explode = explode("\x00", trim($string, "\x00"));

        return $explode[0];
    }    
}

?>
