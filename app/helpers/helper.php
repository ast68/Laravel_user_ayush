<?php
namespace App\Helpers;

class Helper
{
public static function generateId( $length = 20){
    if ($length < 1) {
        return '';
    }

    $bytes = ceil($length / 2);

    $randomBytes = bin2hex(random_bytes($bytes));

    return substr($randomBytes, 0, $length);
}
}
