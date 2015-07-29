<?php
/**
 * Yii Semantic UI Gallery class file.
 *
 * @author Maslena ZA <maslena@wan.la>
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version 1.0.0
 *
 */

/**
 *## Bootstrap gallery widget.
 *
 * @package booster.widgets.gallery
 * @since 0.9.7
 */
class SUIGallery extends CWidget {
	
	public $theme = null;

	/**
	 *### .init()
	 *
	 * Initializes the widget.
	 */
	public function init() {
		Yii::app()->getClientScript()->registerPackage('gallery');
		if ($this->theme) {
			Yii::app()->getClientScript()->registerCssFile($this->theme);
		}
	}

	/**
	 *
	 * Runs the widget.
	 */
	public function run() {
		$this->renderGallery();
	}

	private function renderGallery() {
		//echo "Hello World";
	}
}
