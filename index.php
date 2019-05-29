<?php

require_once('vendor/autoload.php');
use Cannon\Comparison\Comparison;

$x=new Comparison();

$arr=[
	'pp'=>["pp"=>3453,234,32525,235],
	["pewfgewgp"=>123,2324]
];
$x->show($arr);