<?php
function is_text_valid($text, $min, $max) {
    $length = strlen(trim($text));
    return ($length >= $min && $length <= $max);
}

function is_number_valid($number, $min, $max) {
    return is_numeric($number) && $number >= $min && $number <= $max;
}

function is_option_valid($value, $allowed) {
    return in_array($value, $allowed);
}
?>