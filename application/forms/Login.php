<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
    	/* The login form */
	$this->setMethod('POST');

	$this->setName('login');

	$username = new Zend_Form_Element_Text('username');
	$username
		->setLabel('User')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim');

	$password = new Zend_Form_Element_Password('password');
	$password
		->setLabel('Password')
		->setRequired(true);
	
	$submit = new Zend_Form_Element_Submit('submit');
	$submit	->setLabel('Login')
		->setIgnore(true);
	
	$this->addElements(array($username, $password, $submit));
    }
}

