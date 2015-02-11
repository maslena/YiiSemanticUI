<?php

class DefaultController extends Controller
{
	public $layout = 'main';

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$navigationConfig = array();

		$this->render('index', array(
			'navigationConfig' => $navigationConfig,
		));
	}
}
