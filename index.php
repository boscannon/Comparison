<?php

require_once('vendor/autoload.php');
use Cannon\Comparison\Comparison;

$x=new Comparison();

$arr=[
	['pp'=>123,'ewgewwegewgewegewgewewgewgewwewg'=>['ewge'=>'egew']],
	['pp'=>456,'jj'=>ef],
	['pp'=>weg,'ewgewg'=>['ewgew']],
];
$x->show($arr);