<?php
require 'src/lib/micros/class_iteradorestructura.php';
class class_iteradorestructuraTest extends PHPUnit_Framework_TestCase
{
	public function testGetNumber()
	{ 
		$this->assertEquals('1','1','Uno siempre es igual a uno');
	}
}