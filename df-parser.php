<?php

/**
 * PHP function to parse 'df' response.
 *
 * @author Areeb Majeed
 * @copyright 2017 Areeb Majeed
 * @license https://opensource.org/licenses/MIT MIT License
 *
 * @link http://areebmajeed.me/
 */

function parseStorageFile($data) {

    $data = trim($data);
    $data = explode(PHP_EOL, $data);

    foreach ($data as $value) {
        $d = str_replace(" ", "§", $value);
        $d = preg_replace("/(§)\\1+/", "$1", $d);
        $step[] = $d;
    }

    $key = 0;

    foreach ($step as $value) {

        if ($key !== 0) {

            $further = explode("§", $value);
            $join['filesystems'][$key]['name'] = $further[0];
            $join['filesystems'][$key]['used'] = $further[2];
            $join['filesystems'][$key]['size'] = $further[3];
            $join['filesystems'][$key]['mount_point'] = $further[5];

        }

        $key++;

    }

    return $join;
    
}
