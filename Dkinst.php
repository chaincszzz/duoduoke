<?php

use duoduoke\Dk;

class Dkinst {
    protected static $dk = NULL;
    
    public static function Init() {
        if (self::$dk) {
            return self::$dk;
        }
        
        $client_id     = "哆哆客id";
        $client_secret = "多多客秘钥";
        self::$dk      = new Dk($client_id, $client_secret);
        
        return self::$dk;
    }
    
    public function __clone() {
        // TODO: Implement __clone() method.
    }
}