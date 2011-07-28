<?php

class Zend_View_Helper_LoggedInUser extends Zend_View_Helper_Abstract
{
	protected $_view;

	public function setView(Zend_View_Interface $view)
	{
		$this->_view = $view;
	}

	function loggedInUser()
	{
		$auth = Zend_Auth::getInstance();

		if ($auth->hasIdentity()) {
			$user = $auth->getIdentity();

			$str = 	'<a href="' .
				$this->_view->url(array(
					'module' => 'default',
					'controller' => 'auth',
					'action' => 'logout')) .
				'">log out</a> (' . $user . ')';
		} else {
			$str = 	'<a href="' .
				$this->_view->url(array('module' => 'default', 'controller' => 'auth', 'action' => 'login')) .
				'">log in</a>';
		}
		return $str;
	}
}
