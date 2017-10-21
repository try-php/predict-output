<?php
require_once __DIR__ . '/vendor/autoload.php';

use function Crayon\text;
use TryPhp\PredictOutputTrait;

$anonymousClass = new class() {
	use PredictOutputTrait;
};

$anonymousClass->predictOutput(function () {
	echo text('Some String')->red()->bold()->italic()->underline();
}, 'Some String');

try {
	$anonymousClass->predictOutput(function () {
		echo text('Some Other String')->red()->bold()->italic()->underline();
	}, 'Some String');

	trigger_error('test failed', E_USER_ERROR);
} catch (\Exception $ex) {}

$anonymousClass->predictOutput(function () {
	echo "\t";
	echo "\n";
	echo "\t";
	echo text("Some\nString")->red()->bold()->italic()->underline();
	echo "\n";
	echo "\t";
}, 'Some String');