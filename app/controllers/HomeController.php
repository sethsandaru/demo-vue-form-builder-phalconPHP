<?php

/**
 * A simple example controller
 *
 */
class HomeController extends BaseController
{
	
	public function showAction()
	{
	    return $this->renderView('home/index');
	}

} // END class HomeController extends BaseController
