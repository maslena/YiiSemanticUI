<?php

class ModulesController extends Controller
{
	public $layout = 'main';

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionCheckbox()
	{
		$model =new Settings;
		$this->render('checkbox', array('model'=>$model));
	}
}
