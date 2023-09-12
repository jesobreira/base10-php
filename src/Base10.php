<?php
// src/Base10Encoder.php

namespace Base10;

class Base10 {
    static function stringToByteArray($str) {
        $byteArray = [];
        for ($i = 0; $i < strlen($str); $i++) {
            $byteArray[] = ord($str[$i]);
        }
        return $byteArray;
    }

    static function byteArrayToNumber($bytes) {
        $num = '0';

        if (extension_loaded('gmp')) {
            $num = gmp_init($num);
            foreach ($bytes as $byte) {
                $num = gmp_add(gmp_mul($num, 256), $byte);
            }
            return gmp_strval($num);
        } else {
            foreach ($bytes as $byte) {
                $num = bcadd(bcmul($num, '256'), (string)$byte);
            }
            return $num;
        }
    }

    static function encode($str) {
        $byteArray = self::stringToByteArray($str);
        return self::byteArrayToNumber($byteArray);
    }

    static function numberToByteArray($num) {
        $byteArray = [];

        if (extension_loaded('gmp')) {
            $num = gmp_init($num);
            while (gmp_cmp($num, 0) > 0) {
                array_unshift($byteArray, gmp_intval(gmp_mod($num, 256)));
                $num = gmp_div($num, 256);
            }
        } else {
            while (bccomp($num, '0') > 0) {
                array_unshift($byteArray, (int)bcmod($num, '256'));
                $num = bcdiv($num, '256', 0);
            }
        }

        return $byteArray;
    }

    static function byteArrayToString($byteArray) {
        return implode('', array_map('chr', $byteArray));
    }

    static function decode($base10Str) {
        $byteArray = self::numberToByteArray($base10Str);
        return self::byteArrayToString($byteArray);
    }
}
