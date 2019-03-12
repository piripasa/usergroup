<?php

if (!function_exists('str_slug')) {
    function str_slug($title, $separator = '-') {
        // Convert all dashes/underscores into separator
        $flip = $separator == '-' ? '_' : '-';

        $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

        // Replace @ with the word 'at'
        $title = str_replace('@', $separator.'at'.$separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

        return trim($title, $separator);
    }
}

if (!function_exists('searchArray')) {
    function searchArray($array, $field, $value)
    {
        foreach($array as $key => $element)
        {
            if ( $element[$field] === $value )
                return $element;
        }
        return false;
    }
}
