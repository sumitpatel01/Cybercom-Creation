<?php


function hit_counter () {
    echo $ip_addr = $_SERVER['REMOTE_ADDR'];

    $ip_file = file('ip.txt');

    foreach ($ip_file as $ip) {
        $current_ip = trim($ip);

        if($current_ip == $ip_addr){
            $found true;
        } else {
            $found false;
        }
    }

    if ($found) {
        echo 'already there'
    } else {
        $file = 'count.txt';

        $handle = fopen($file, 'r');
        $file_content = fread($handle, filesize($file));
        fclose($handle);

        $current_inc = $file_content + 1;
        $handle = fopen($file, 'w');
        fwrite($handle, $current_inc);
        fclose($handle);

        $handle = fopen('ip.txt','a');
        fwrite($handle, $ip_addr);
        fclose($handle);


    }
}
?>