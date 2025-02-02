<?php

function cleanString($string) {
    return preg_replace('/[^a-zA-Z0-9_]/', '', $string);
}

?>