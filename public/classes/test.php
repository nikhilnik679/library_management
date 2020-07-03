<?php
include 'Database.php';

$obj = new Database();
$table = 'book';
//$data =   '';
$result1 = $obj->readData($table);

echo '<pre>';
print_r($result1);
