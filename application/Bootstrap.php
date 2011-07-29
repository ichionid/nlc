<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _init_acl()
	{
		$nlc_acl = new Zend_Acl();

		/* Roles and resources (arbitrary) */
		$acl_roles = array(
			'user',
			'admin',
			'guest');
		
		$acl_resources = array(
			'index',
			'admin');

		/* Add them to our ACL system */
		foreach ($acl_roles as $role)
			$nlc_acl->addRole(new Zend_Acl_Role($role));

		foreach ($acl_resources as $resource)
			$nlc_acl->addResource(new Zend_Acl_Resource($resource));

		/* Now create the allow/deny combinations */

		$nlc_acl->allow('admin');
		$nlc_acl->allow('user');
		$nlc_acl->allow('guest');

		/* Deny the guest a few things */
		$nlc_acl->deny('guest', 'admin');

		/* Deny the user fewer things (more to come) */
		$nlc_acl->deny('user', 'admin');

		/* Store the ACL */
		$registry = Zend_Registry::getInstance();
		$registry->set('acl',$nlc_acl);
	}

	protected function _init_session()
	{
		Zend_Session::start();
	}

	protected function _init_plugins()
	{
		$front = Zend_Controller_Front::getInstance();
		$front->registerPlugin(new Application_Plugin_Auth(Zend_Registry::getInstance()->get('acl')));
	}
}

