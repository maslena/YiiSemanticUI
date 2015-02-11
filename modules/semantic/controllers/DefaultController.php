<?php

class DefaultController extends Controller
{
	public $layout = 'home';

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionKitchenSink()
	{
		$this->render('index');
	}
}
