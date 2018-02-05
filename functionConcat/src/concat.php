<?php

/**
 * Concatenate two strings
 * @param string $str1 first string
 * @param string $str2 second string
 * @return null|string returned string formed by the concatenation of $str1 and $str2, if they're not strings, returns null
 */
function concatStrings($str1, $str2) {
    if ( !is_string($str1) || !is_string($str2)){
        return null;
    }

    return $str1 . $str2;
}