<?php

/**
 * The SiteNavigation takes care of putting together the menu bar based on
 * role of the current user. If there is no user (not logged in), the role
 * 'guest' is assumed.
 *
 * The menus are as follows:
 * 	guest: 	home | login
 *	user:	home | search | logout
 *	admin:	home | search | admin | logout
 *
 */
class Zend_View_Helper_SiteNavigation extends Zend_View_Helper_Abstract {

	protected $_view;

	private $home = array(
		'module' => 'default',
		'controller' => 'index',
		'action' => 'index');
	
	private $login = array(
		'module' => 'default',
		'controller' => 'auth',
		'action' => 'login');
	
	private $logout = array(
		'module' => 'default',
		'controller' => 'auth',
		'action' => 'logout');
	
	private $search = 'search';

	private $admin = array(
		'module' => 'admin',
		'controller' => 'index',
		'action' => 'index');

	public function setView(Zend_View_Interface $view)
	{
		$this->_view = $view;
	}

	public function siteNavigation()
	{
		$auth = Zend_Auth::getInstance();

		if ($auth->hasIdentity()) {
			if ($auth->getIdentity() == 'thomas')
				/* admin */
				return 	'<a href="' . $this->_view->url($this->home) . '">home</a> | ' .
					$this->search . ' | ' . 
					'<a href="' . $this->_view->url($this->admin) . '">admin</a> | ';
			else
				/* user */
				return 	'<a href="' . $this->_view->url($this->home) . '">home</a> | ' .
					$this->search . ' | ';
		}
		else {
			return 	'<a href="' . $this->_view->url($this->home) . '">home</a> | ';
		}

	}

	private function default_module($ary)
	{
		return array_merge(array('module' => 'default'), $ary);
	}
}
