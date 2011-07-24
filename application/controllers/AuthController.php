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

	/* TODO: fill out */
    }


}



