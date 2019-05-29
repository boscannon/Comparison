<?php

require_once('vendor/autoload.php');
use Cannon\Comparison\Comparison;

$x=new Comparison();

$arr=[
	'pp'=>["pp"=>3453,234,'ewge',235],
	["pewfgewgp"=>123,'23egwe4']
];
$x->show($arr);