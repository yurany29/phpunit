<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase{

	public function testValidUserName()
	{
		$user = new User('yurany', 'Henao');

		$expected = 'Yurany';

		$phpunit = $this;

		$closure = function() use($phpunit,$expected){
			$phpunit->assertSame($expected, $this->name);
		};

		$binding = $closure->bindTo($user, get_class($user));

		$binding();

	}

	public function testValidUserName2()
	{
		$user = new class('yurany', 'Henao') extends User {

			public function getName()
			{
				return $this->name;
			}
		};
		$this->assertSame('Yurany', $user->getName());
	}
}