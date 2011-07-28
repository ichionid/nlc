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
		$this->home 	= $this->url_ary_default('index', 'index');
		$this->login 	= $this->url_ary_default('auth', 'login');
		$this->logout 	= $this->url_ary_default('auth', 'logout');
		$this->search 	= null;	/* not started yet */
		$this->about 	= $this->url_ary_default('about', 'index');
		$this->admin 	= $this->url_ary('admin', 'index', 'index');
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

	/**
	 * Convenience functions: url_ary formats an array from the given arguments.
	 * 
	 * Example:
	 * 	url_ary('default', 'auth', 'login');
	 *	#=>
	 *		array(	'module' => 'default',
	 *			'controller' => 'auth',
	 *			'action' => 'login');
	 *
	 * This is so you don't have to type these arrays everywhere.
	 *
	 */
	private function url_ary($module, $controller, $action)
	{
		return 	array(
			'module'	=> $module,
			'controller'	=> $controller,
			'action'	=> $action);
	}

	private function url_ary_default($controller, $action)
	{
		return $this->url_ary('default', $controller, $action);
	}

	/**
	 * Convenience function. For links in the default module, just supply the
	 * action and controller in an array to this function.
	 */
	private function default_module(array $ary)
	{
		return array_merge(array('module' => 'default'), $ary);
	}

	/**
	 * Create a link tag from the given url array. If $url is null just
	 * return the given name. Otherwise a HTML link tag with formatted url
	 * is returned with $name as link text.
	 */
	private function a(array $url = null, $name)
	{
		if (is_null($url))
			return $name;
		return '<a href="' . $this->_view->url($url) . '">' . $name . '</a>';
	}
}
