<?php

/**
 * The SiteNavigation takes care of putting together the menu bar based on
 * role of the current user. If there is no user (not logged in), the role
 * 'guest' is assumed.
 *
 * The menus are as follows:
 * 	guest: 	home | about
 *	user:	home | search | about
 *	admin:	home | search | admin | about
 *
 */
class Zend_View_Helper_SiteNavigation extends Zend_View_Helper_Abstract {

	protected $_view;

	public function __construct()
	{
		$this->home = 	$this->default_module(array(
				'controller' 	=> 'index',
				'action' 	=> 'index'
				));
		$this->login = 	$this->default_module(array(
				'controller' 	=> 'auth',
				'action' 	=> 'login'
				));
		$this->logout = $this->default_module(array(
				'controller'	=> 'auth',
				'action'	=> 'logout'
				));
		$this->search = null;	/* not started yet */
		$this->about =	$this->default_module(array(
				'controller'	=> 'about',
				'action'	=> 'index'
				));
		$this->admin =	array(
				'module'	=> 'admin',
				'controller'	=> 'index',
				'action'	=> 'index'
				);
	}

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
				return 	$this->a($this->home, 'home') . ' | '
					. $this->a($this->search, 'search') . ' | '
					. $this->a($this->admin, 'admin') . ' | '
					. $this->a($this->about, 'about');
			else
				/* user */
				return 	$this->a($this->home, 'home') . ' | '
					. $this->a($this->search, 'search') . ' | '
					. $this->a($this->about, 'about');
		}
		else {
			return 	$this->a($this->home, 'home') . ' | '
				. $this->a($this->about, 'about');
		}

	}

	private function default_module(array $ary)
	{
		return array_merge(array('module' => 'default'), $ary);
	}

	private function a(array $url = null, $name)
	{
		if (is_null($url))
			return $name;
		return '<a href="' . $this->_view->url($url) . '">' . $name . '</a>';
	}
}
