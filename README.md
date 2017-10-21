# predict-output

> Prediction package for CLI output

[![Build Status](https://travis-ci.org/try-php/predict-output.svg?branch=master)](https://travis-ci.org/try-php/predict-output)

## Install

```bash
$ composer require try/predict-output
```

## Usage

```php
<?php
require_once '/path/to/autoload.php';

use TryPhp\PredictOutputTrait;

$assertions = new class() {
	use PredictOutputTrait();
} 

$assertions->predictOutput(function () {
	echo '\e[33msomething\n';
}, 'something'); // wont throw an exception

$assertions->predictOutput(function () {
	echo '\e[33msomething\n';
}, 'something other'); // will throw an exception
```

## API

### Methods

#### `predictOutput($capture, $content)`

Method to compare an output capture with a given string.

##### Arguments

| Arguments | Type | Description |
|---|---|---|
| $capture | `callable` | Closure from which every output buffer write will be captured. |
| $content | `string` | Content to which the output will be compared to. |

## License

GPL-2.0 © Willi Eßer