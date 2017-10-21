<?php
namespace TryPhp;

use TryPhp\{stripControlCharacters, stripColorCharacters};

trait PredictOutputTrait
{
	/**
	 * Method to check if an function or method echo output matches the expected result
	 * @param callable $capture
	 * @param string $content
	 * @throws \Exception
	 */
	public function predictOutput(callable $capture, string $content)
	{
		ob_start();
		call_user_func($capture);
		$clearedOutput = trim(stripControlCharacters(stripColorCharacters(ob_get_clean())));

		if ($clearedOutput !== $content) {
			throw new \Exception('The predicted output did not match the actual one.');
		}
	}
}