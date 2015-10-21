<?php

namespace tdt4237\webapp;

use Symfony\Component\Config\Definition\Exception\Exception;

class Hash
{
    public function __construct()
    {
    }

    public static function random_salt()
    {
        $salt = "";
        $x = 0;
        while ($x<10)
        {
            $salt .= rand(0,9);
            $x ++; 
        }
        return $salt;
    }

    public static function make($plaintext, $salt)
    {
        return hash('sha256', $plaintext . $salt);

    }

    public function check($plaintext, $hash, $salt)
    {
        return $this->make($plaintext, $salt) === $hash;
    }

}