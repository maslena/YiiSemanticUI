<?php
/**
 * Yii Semantic UI class file.
 *
 * @author Maslena ZA <maslena@wan.la>
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version 1.0.0
 * 
 */

/**
 * Yii Semantic UI application component.
 *
 * This is the main YiiSemanticUI component which you should attach to your Yii CWebApplication instance.
 *
 * @package sui.components
 */
class YiiSemanticUI extends CApplicationComponent {
	
	public $minify = true;
	public $enableCdn = false;
	public $republishAssets = false;
	public $coreCss = true;
	public $enableJS = true;
	public $loadCSSInAjax = false;
	public $loadJsInAjax = false;
	public $semanticCss = true;
	public $packages = array();
	public $version = '1.12.3';

	private static $_instance;
	public $_assetsUrl;

	public $clientScript;

	/**
	 * Initializes the component.
	 */
	public function init() {
		if ($this->isConsoleApp() && !$this->isTesting()) {
			return;
		}

		self::setComponent($this);
		$this->setAlias();
		$this->setAssets();
		$this->includeAssets();

		parent::init();
	}

	protected function isConsoleApp() {
		return Yii::app() instanceof CConsoleApplication || PHP_SAPI == 'cli';
	}

	protected function isTesting() {
		return defined('TESTING_MODE') && TESTING_MODE;
	}

	public static function setComponent($value) {
        if ($value instanceof YiiSemanticUI) {
            self::$_instance = $value;
        }
    }

    protected function setAlias() {
		if (Yii::getPathOfAlias('sui') === false) {
			Yii::setPathOfAlias('sui', realpath(dirname(__FILE__) . '/..'));
		}
	}

	protected function setAssets() {
		if (!$this->clientScript) {
            $this->clientScript = Yii::app()->getClientScript();
        }
	}

	protected function includeAssets() {
		$this->compilePackages();
		$this->preparePackage();
		$this->registerCssPackages();
		$this->registerJsPackages();
	}

	protected function compilePackages() {
		$packages = $this->packageCss();
		$packages += $this->packageJs();
		$packages += require(Yii::getPathOfAlias('sui.components') . '/packages.php');
		$this->packages = CMap::mergeArray(
			$packages,
			$this->packages
		);
	}

	public function getAssetsUrl() {
		Yii::app()->getAssetManager()->setBaseUrl(Yii::app()->getBaseUrl(true).'/assets');
		if (isset($this->_assetsUrl)) {
			return $this->_assetsUrl;
		} else {
			return $this->_assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('sui.assets'), true, -1, $this->republishAssets);
		}
	}

	protected function packageCss() {
		return array('semantic.css' => array(
			'baseUrl' => $this->enableCdn ? '//cdnjs.cloudflare.com/ajax/libs/semantic-ui/'.$this->version.'/' : $this->getAssetsUrl() . '/semantic-ui/' . $this->version . '/',
			'css' => array( ($this->minify || $this->enableCdn) ? 'semantic.min.css' : 'semantic.css' ),
		));
	}

	protected function packageJs() {
		return array('semantic.js' => array(
			'baseUrl' => $this->enableCdn ? '//cdnjs.cloudflare.com/ajax/libs/semantic-ui/'.$this->version.'/' : $this->getAssetsUrl() . '/semantic-ui/' . $this->version . '/',
			'css' => array( ($this->minify || $this->enableCdn) ? 'semantic.min.js' : 'semantic.js' ),
		));
	}

	protected function preparePackage() {
		foreach ($this->packages as $name => $definition) {
			$this->clientScript->addPackage($name, $definition);
		}
        $this->clientScript->scriptMap['jquery-ui.min.js'] = $this->getAssetsUrl() . '/jquery-ui.min.js';
	}

	protected function registerCssPackages() {
		if (!$this->coreCss) {
			return;
		}
		if (!$this->loadCSSInAjax && Yii::app()->request->isAjaxRequest) {
			return;
		}
		if ($this->semanticCss) {
			$this->registerSemanticCss();
		}
	}

	protected function registerJsPackages() {
		if (!$this->enableJS) {
			return;
		}
		if (!$this->loadJsInAjax && Yii::app()->request->isAjaxRequest) {
			return;
		}

		$this->clientScript->registerScriptFile($this->getAssetsUrl().'/semantic-ui/' . $this->version . '/semantic.js');
	}

	public function registerSemanticCss() {
		$this->clientScript->registerPackage('semantic.css');
	}

	/**
	 * Register a javascript file in the asset's js folder
	 *
	 * @param string $name the js file name to register
	 * @param int $position the position of the JavaScript code.
	 *
	 * @see CClientScript::registerScriptFile
	 */
	public function registerJs($name, $position = CClientScript::POS_END) {
		$this->clientScript->registerScriptFile($this->getAssetsUrl() . "/semantic-ui/" . $this->version . "/components/{$name}", $position);
	}

	/**
     * @return YiiSemanticUI
     */
    public static function getYiiSemanticUI() {
        if (null === self::$_instance) {
            $module = Yii::app()->getController()->getModule();
            if ($module) {
                if ($module->hasComponent('sui')) {
                    self::$_instance = $module->getComponent('sui');
                }
            }
            if (null === self::$_instance) {
                if (Yii::app()->hasComponent('sui')) {
                    self::$_instance = Yii::app()->getComponent('sui');
                }
            }
        }
        return self::$_instance;
    }
}