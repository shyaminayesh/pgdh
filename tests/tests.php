<?php

error_reporting(-1);
ini_set('display_errors', 1);

// INCLUDE CLASS FILES
include_once __DIR__.'/../pgdh.class.php';

// INSTANCE
$pgdh = new pgdh( __DIR__.'/resources/1.jpg');

echo "\nDONE\n\n";

?>