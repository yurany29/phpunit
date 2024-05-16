<?php

use PHPUnit\Framework\TestCase;

class BMICalculatorTest extends TestCase{

	public function testShowUnderweightWhenBmiLessThen18()
	{
		$BMICalculator = new BMICalculator;

		$BMICalculator->BMI = 10;

		$result = $BMICalculator->getTextResultFromBMI();

		$expected = 'Underweight';

		$this->assertSame($expected, $result);
	}

	public function testShowNormalWhenBmiBetween1825()
	{
		$expected = 'Normal';

		$BMICalculator = new BMICalculator;

		$BMICalculator->BMI = 24;

		$result = $BMICalculator->getTextResultFromBMI();

		$this->assertSame($expected, $result);
	}

	public function testShowOverweightWhenBmiGreaterThan25()
	{
		$expected = 'Overweight';

		$BMICalculator = new BMICalculator;

		$BMICalculator->BMI = 28;

		$result = $BMICalculator->getTextResultFromBMI();

		$this->assertSame($expected, $result);
	}

	public function testCanCalculateCorrectBmi()
	{
		$expected = 39.1;

		$BMICalculator = new BMICalculator;

		$BMICalculator->mass = 100;

		$BMICalculator->height = 1.6;

		$result = $BMICalculator->calculate();

		$this->assertEquals($expected,$result);
	}
}