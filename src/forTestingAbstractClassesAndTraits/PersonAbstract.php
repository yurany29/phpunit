<?php 

namespace forTestingAbstractClassesAndTraits;

abstract class PersonAbstract{

	protected $firstname;

	protected $lastname;

	public function __construct($name, $lastname)
	{
		$this->firstName = $name;
		$this->lastName = $lastname;
	}

	abstract public function getSalary();

	public function showFullNameAndSalary()
	{
		return $this->firstName.' '.$this->lastName.' '.'earns'.' '.$this->getSalary().' '.'per month';
	}
}