<?php

use forStubMockTesting\User;
use PHPUnit\Framework\TestCase;

class UserStubTest extends TestCase{

	public function testCreateUser()
	{
		//$user = new User;

		//$stub = $this->getMockBuilder(User::class)
			//->getmock(); all methods return null by default unless mocked

		// $stub = $this->createStub(User::class);
		
		// $stub->method('save')->willReturn('fake');

		// $stub = $this->getMockBuilder(User::class)
		// 	->setMethods(null)
		// 	->getMock(); works like a real object

		$stub = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()
			->setMethods(['save'])
			->getMock();
		$stub->method('save')->willReturn(true);

		$this->assertTrue($stub->createUser('Adam', 'adam@gmail.com.co'));

		$this->assertFalse($stub->createUser('Adam', 'adamgmail.com.co'));
	}
}