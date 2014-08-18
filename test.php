<?php

abstract class OverloadableObject
{
	function __call($name, $args)
	{
		$method = $name . "_" . count($args);
		if (!method_exists($this, $method)) {
			throw new Exception("Call to undefined method" . get_class($this) . "::$method");
		}
		return call_user_func_array(array($this, $method), $args);
	}
}

class Multiplier extends OverloadableObject
{
	function multiply_2($one, $two)
	{
		return $one * $two;
	}

	function multiply_3($one, $two, $three)
	{
		return $one * $two * $three;
	}
}

class Document
{
	private $text;

	/**
	 * @return mixed
	 */
	public function getText()
	{
		return $this->text;
	}

	/**
	 * @param mixed $text
	 */
	public function setText($text)
	{
		$this->text = $text;
	}

}

$document = new Document();
$text = $document->getText();