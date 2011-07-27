<?php

class Application_Plugin_Auth extends Zend_Controller_Plugin_Abstract {
	
	private $_noauth = array(
		'module'	=> 'default',
		'controller'	=> 'auth',
		'action'	=> 'login'
		);
	
	private $_noacl = array(
		'module'	=> 'default',
		'controller'	=> 'error',
		'action'	=> 'error'
		);

				

	public function preDispatch(Zend_Controller_Request_Abstract $request)
	{
		$loginController = 'auth';
		$loginAction	 = 'login';
		$auth		 = Zend_Auth::getInstance();

		/* TODO: Interact with the user database here to retrieve role */ 
		if (!$auth->hasIdentity()) {
			$role = 'guest';
		/*	$redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('Redirector');
			$redirector->gotoSimpleAndExit($loginAction, $loginController); */
		} else {
			$identity = $auth->getIdentity();

			if ($identity == 'thomas')
				$role = 'admin';	/* thomas is admin */
			else
				$role = 'user'; 	/* giannis is user */
		}

		$mod = $request->module;
		$ctrl = $request->controller;
		$act = $request->action;

		$resource = $mod;

		$acl = Zend_Registry::getInstance()->get('acl');

		if (!$acl->has($resource))
			$resource = null;

		/* Are we allowed or not? */
		if (!$acl->isAllowed($role, $resource, $act)) {
			if (!$auth->hasIdentity()) {
				$request->setModuleName($this->_noauth['module']);
				$request->setControllerName($this->_noauth['controller']);
				$request->setActionName($this->_noauth['action']);
			}
			else {
				$request->setModuleName($this->_noacl['module']);
				$request->setControllerName($this->_noacl['controller']);
				$request->setActionName($this->_noacl['action']);
			}
		}
	}


}
