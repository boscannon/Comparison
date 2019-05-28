<?php

require_once('vendor/autoload.php');
use Cannon\Comparison\Comparison;

$x=new Comparison();

$arr=[
'pp','weg'=>'wegew','weg','wegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegwegweg'
];
$x->show($arr);