<?php
$countries = json_decode(file_get_contents("country.json"), true);
foreach ($countries as $elem) {
    echo $elem['name']. ', ';
}
?>