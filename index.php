<?php

require_once('vendor/autoload.php');
use Cannon\Comparison\Comparison;

$x=new Comparison();

$arr=[
	["pp"=>123],
	["pewfgewgp"=>123]
];
$x->show($arr);