<?php
$homepage = file_get_contents('https://api.cdnjs.com/libraries/jquery');
var_dump(json_decode($homepage));
?>