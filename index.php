<?php

require_once('vendor/autoload.php');
use Cannon\Comparison\Comparison;

$x=new Comparison();

$arr=[
	'pp'=>["pp"=>3453,234,'ewge',235],
	["pewfgewgp"=>123,'2324']
];
$x->show($arr,['length'=>30,'index'=>true]);