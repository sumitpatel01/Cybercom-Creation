<?php

$food = array ( 'pasta', 'pizza', 'bhaji', 'panipuri');

//it stored in the last
// $food[4] = 'fruit';

// it prints whole array with key and value
// print_r($food);

// it is the associative array which has assigned index and value

$associative_array = array('smit'=> 54,'sumit'=> 44, 'jinay'=> 48, 'jemish'=> 12);
// echo $associative_array['jemish'];

$hygiene = array ('healthy' =>
                         array('salad', 'vegitable', 'pasta'),
                 'unhealthy' => 
                         array('pizza', 'ice-cream'));

// echo $hygiene['healthy'][0];

foreach ( $hygiene as $element => $inner_element) {
    echo '<strong>'.$element.'</strong><br>';
    foreach ( $inner_element as $item ) {
        echo $item.'<br>';
    }
}

?>