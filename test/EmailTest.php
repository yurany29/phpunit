<?php

use PHPUnit\Framework\TestCase;

class 	EmailTest extends TestCase{

	/**
	 * @dataProvider emailsProvider
	 */

	public function testValidEmail($email)
	{
		$this->assertRegExp('/^.+\@\S+\.\S+$/', $email);
	}

	public function emailsProvider()
	{
		return[
			['123@gmail.com'],
			['hola@gmail.com'],
			['sol@gmail.com'],
		];
	}

	/**
	 * @dataProvider numbersprovider
	 */
	public function testMath($a, $b, $expected)
	{
		$result = $a*$b;

		$this->assertEquals($expected, $result);
	}

	public function numbersprovider()
	{
		return [
			[1,2,2],
			[2,2,4],
			[3,3,9],
		];
	}
}