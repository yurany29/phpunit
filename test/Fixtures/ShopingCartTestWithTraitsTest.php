<?php

use PHPUnit\Framework\TestCase;

class ShopingCartTestWithTraitsTest extends TestCase{

	use DatabaseTrait;

	use ShopingCartFixtureTrait;

	public function testCorrectNumberOfItems()
	{
		$this->cart->addItem('one');

		$expected = 1;

		$result = $this->cart->amount;

		$this->assertEquals($expected, $result);
	}

	public function testCorrectProductName()
	{
		$this->cart->addItem('Apple');
		$this->assertContains('Apple', $this->cart->cartItems);
	}
}