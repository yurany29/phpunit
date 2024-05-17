<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase{

	use CustomAssertionTrait;

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

	public function testValidDataFormat()
	{
		$user = new User('yurany', 'Henao');

		$mockedDb = new class extends Database{

			public function getEmailAndLastName()
			{
				echo 'no real db touched!';
			}
		};

		$setUserClosure = function() use($mockedDb){
			$this->db = $mockedDb;
		};

		$executeSetUserClosure = $setUserClosure->bindTo($user, get_class($user));

		$executeSetUserClosure();

		$this->assertSame('Yurany Henao', $user->getFullName());
	}

	public function testPasswordHashed()
	{
		$user = new User('yurany', 'Henao');

		$expected = 'password hashed!';

		$phpunit = $this;

		$assertClosure = function () use($phpunit, $expected){

			$phpunit->assertSame($expected, $this->hashPassword());
		};

		$executeAssertClosure = $assertClosure->bindTo($user, get_class($user));

		$executeAssertClosure();

		
	}

	public function testPasswordHashed2()
	{
		$user = new class('yurany', 'Henao') extends User{

			public function getHashedPassword()
			{
				return $this->hashPassword();
			}
		};

		$this->assertSame('password hashed!', $user->getHashedPassword());
	}

	public function testCustomDataStructure()
	{
		$data = [
			'nick' => 'Yurany',
			'email' => 'henaoyurany.29@gmail.com',
			'age' => '18'
		];

		$this->assertArrayData($data);
	}

	public function testSomeOperation()
	{
		$user = new User('yurany', 'Henao'); //move to setUp() method and use this-> operator

		$this->assertEquals('ok!', $user->someOperation([1,2,3]));

		$this->assertEquals('error', $user->someOperation([0]));

		$this->assertEquals('ok!', $user->someOperation([1]));
	}
}