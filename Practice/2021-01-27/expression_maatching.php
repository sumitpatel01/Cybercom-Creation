<?php

function has_space ( $string ) {
    if (preg_match('/ /', $string )) {
        return true;
    } else {
        return false;
    }
}

$sttring = 'This doesn\'t have a space';

if ( has_space ( $string )) {
    echo 'has atleast one space';
} else {
    echo 'has no space';
}
?>