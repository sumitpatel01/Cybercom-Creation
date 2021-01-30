<?php

$offset = 0;

if ( isset($_POST['text']) && isset($_POST['search']) && isset($_POST['replace']) ) {
    $text = $_POST['text'];
    $search = $_POST['search'];
    $replace = $_POST['replace'];

    $search_length = strlen($search);

    if ( !empty('text') && !empty('search') && !empty('replace') ) {

        while ( $strpos = strpos( $text, $search, $offset )) {
            $offset = $strpos + $search_length;
            $text = substr_replace($text, $replace, $strpos, $search_length);
        }

        echo $text;
    }

}
// str_replace($string , $search, $replace);

?>

<form action="index.php" method='post'>
        <textarea name="text" id="text" cols="30" rows="6"></textarea><br><br>
        Serach for : <br><input type="text" name="search" id="">
        Replace with : <br><input type="text" name="replace" id="">
        <input type="submit" value="find and replace">
</form>