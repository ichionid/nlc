<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
	$s = new Zend_Session_Namespace();

	/* var_dump($s); */

	if (!isset($s->counter))
		$s->counter = 1000;
	else
		$s->counter++;
	
	$this->view->counter = $s->counter;

	if ($s->counter > 1999)
		unset($s->counter);
    }

    public function indexAction()
    {
        // action body
    }

}
