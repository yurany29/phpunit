<?php 

class Session implements SessionInterface{

	public function open()
	{
		echo 'real opening the sesion';
	}

	public function close()
	{
		echo 'real closing the sesion';
	}

	public function write($product)
	{
		echo 'real writing to the sesion' . $product;
	}
}