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

function parseDfResponse($data) {

    # First of all, we trim the data to remove any un-needed spaces at the start and end of the contents.
    $data = trim($data);

    # We break the data on the basis of newlines. Using this, we can obtain every row.
    $data = explode(PHP_EOL, $data);

    # We loop through every row now.

    foreach ($data as $value) {

        # We're replacing the spaces into a special character (§) for splitting in the next process.
        $d = str_replace(" ", "§", $value);

        # We're using a regex expression to remove all duplicated special characters (§).
        $d = preg_replace("/(§)\\1+/", "$1", $d);

        # We're filling the newly created content in an array.
        $step[] = $d;

    }

    $key = 0;

    # Looping through the array we created now.

    foreach ($step as $value) {

        # We don't need to include the header row which includes the field names.

        if ($key !== 0) {

            # Spiting with the special character and filling out the values in a new array.

            $further = explode("§", $value);
            $join['filesystems'][$key]['name'] = $further[0];
            $join['filesystems'][$key]['1k_blocks'] = $further[1];
            $join['filesystems'][$key]['used'] = $further[2];
            $join['filesystems'][$key]['size'] = $further[3];
            $join['filesystems'][$key]['usage_percentage'] = $further[3];
            $join['filesystems'][$key]['mount_point'] = $further[5];

        }

        # Giving increments.

        $key++;

    }

    return $join;

}
