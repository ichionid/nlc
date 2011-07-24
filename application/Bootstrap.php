<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _init_session()
	{
		Zend_Session::start();
	}
}

