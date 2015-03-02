<?php
/**
 * This is Settings model class.
 */
class Settings extends CModel
{
	public $privacy;
	public $newsletter;
	public $toc;

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('privacy, newsletter, toc', 'in', 'range'=>array(0,1)),
		);
	}
	public function attributeNames()
	{
		return array(
			'privacy',
			'newsletter',
			'toc'
		);
	}

	public function attributeLabels()
	{
		return array(
			'privacy'=>'Privacy',
			'newsletter'=>'Newsletter',
			'toc'=>'I agree to the Term of Service',
		);
	}
}