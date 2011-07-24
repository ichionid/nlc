<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_forward('login');
    }

    public function loginAction()
    {
        $db = $this->_getParam('db');

	/* TODO: initialize loginForm elsewhere? */

	$auth = Zend_Auth::getInstance();

	// Just redirect back to Index/index if already logged in
	if ($auth->hasIdentity()) {
		$this->_redirect('/');
		return;
	}

	$loginForm = new Application_Form_Login();

	if ($this->getRequest()->isPost() &&
		$loginForm->isValid($_POST)) {
		
		$adapter = new Zend_Auth_Adapter_DbTable(
			$db,
			'users',
			'username',
			'password',
			null
		);

		$adapter->setIdentity($loginForm->getValue('username'));
		$adapter->setCredential($loginForm->getValue('password'));

		$result = $auth->authenticate($adapter);

		if ($result->isValid()) {
			/*			
			$data = $adapter->getResultRowObject(null, 'password');
			$auth->getStorage()->write($data);
			*/
			$adapter->setIdentity($loginForm->getValue('username'));
			$adapter->setCredential($loginForm->getValue('password'));

			$this->_helper->FlashMessenger('Successful login!');
			$this->_redirect('/');
			return;
		}
	}

	$this->view->loginForm = $loginForm;
    }

    public function logoutAction()
    {
    	$auth = Zend_Auth::getInstance();
	$auth->clearIdentity();
	$this->_redirect('/');
    }


}





