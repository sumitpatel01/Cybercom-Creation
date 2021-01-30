<?php

$xml = simplexml_load_file('interns.xml');

// echo $xml->intern[1]->name. ' '.age;
echo '<table><tr><td>Name</td><td>Age</td><td>EvalutionName</td></tr>';
foreach ($xml->intern as $intern) {
    // echo '<table style= 'border : 1px solid black;'><tr><td>Name</td><td>Age</td></tr>';
    echo '<tr><td>'.$intern->name.'</td><td>'.$intern->age.'</td><td>'.$intern->evalution->evalution_name.'</td></tr>';
}
echo '</table>'
?>
