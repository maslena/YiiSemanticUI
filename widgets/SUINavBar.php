<?php
/**
 * Yii Semantic UI Navigation Bar class file.
 *
 * @author Maslena ZA <maslena@wan.la>
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version 1.0.0
 *
 */

//Yii::import('booster.widgets.TbCollapse');

/**
 *## Bootstrap navigation bar widget.
 *
 * @package booster.widgets.navigation
 * @since 0.9.7
 */
class SUINavBar extends CWidget {
	
	// const CONTAINER_PREFIX = 'yii_booster_collapse_';

	const DEVICE_COMPUTER = 'computer';
	const DEVICE_TABLET = 'tablet';
	const DEVICE_MOBILE = 'mobile';
	const FIXED_TOP = 'top';
	const FIXED_BOTTOM = 'bottom';

	/**
	 * @var string the text for the id of the wrapper.
	 */
	public $id;

	/**
	 * @var string the text for the brand.
	 */
	public $brand;

	/**
	 * @var bool whether the navigation bar is static or fixed.
	 */
	public $fixed = false;

	/**
	 * @var string the placement of navigation bar. Values: 'top' or 'bottom'.
	 */
	public $placement = self::FIXED_TOP;

	/**
	 * @var bool whether the navigation bar is inverted or not.
	 */
	public $inverted = true;

	/**
	 * @var string the URL for the brand link.
	 */
	public $brandUrl;

	/**
	 * @var array the list of devices it will be displayed on.
	 */
	public $devices = array('computer', 'tablet', 'mobile');

	/**
	 * @var array the HTML attributes for the brand link.
	 */
	public $brandOptions = array();

	/**
	 * @var array navigation of items
	 */
	public $items = array();

	// /**
	//  * @var mixed fix location of the navbar if applicable.
	//  * Valid values are 'top' and 'bottom'. Defaults to 'top'.
	//  * Setting the value to false will make the navbar static.
	//  * @since 0.9.8
	//  */
	// public $fixed = self::FIXED_TOP;

	// /**
	//  * @var boolean whether the nav span over the full width. Defaults to false.
	//  * @since 0.9.8
	//  */
	// public $fluid = false;

	// /**
	//  * @var boolean whether to enable collapsing on narrow screens. Default to true.
	//  */
	// public $collapse = true;

	/**
	 * @var string the wrapper classes for the widget container.
	 */
	public $wrapperOptions;

	/**
	 * @var string the additional classes for the container of the navigation bar.
	 */
	public $containerCss;

	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();

	/**
	 * @var boolean whether it is for mobile only or any device.
	 */
	public $isMobileOnly = false;

	/**
	 *### .init()
	 *
	 * Initializes the widget.
	 */
	public function init() {
		Yii::app()->getClientScript()->registerPackage('navbar');
		Yii::app()->getClientScript()->registerPackage('dropdown');
	 	if ($this->brand !== false) {
	 		if (!isset($this->brand)) {
				$this->brand = CHtml::encode(Yii::app()->name);
			}

			if (!isset($this->brandUrl)) {
				$this->brandUrl = Yii::app()->homeUrl;
			}

	 		$this->brandOptions['href'] = CHtml::normalizeUrl($this->brandUrl);

			if (isset($this->brandOptions['class'])) {
				$this->brandOptions['class'] .= ' brand item';
			} else {
				$this->brandOptions['class'] = 'brand item';
			}
		}

	 	if (isset($this->fixed) && $this->fixed === true) {
 			$classes[] = 'fixed';
 		}

 		if (isset($this->inverted) && $this->inverted === true) {
 			$classes[] = 'inverted';
 		}

 		if (isset($this->placement) && in_array($this->placement, array(self::FIXED_BOTTOM))) {
 			$classes[] = $this->placement;
 		}

		if (!empty($classes)) {
			$classes = implode(' ', $classes);
			if (isset($this->htmlOptions['class'])) {
				$this->htmlOptions['class'] .= ' ' . $classes;
			} else {
				$this->htmlOptions['class'] = $classes;
			}
		}

		if (!empty($wrapperClasses)) {
			$wrapperClasses = implode(' ', $wrapperClasses);
			$this->wrapperOptions .= ' ' . $wrapperClasses;
		}

		if (!empty($this->devices)) {
			foreach ($this->devices as $device) {
				if (in_array($device, array(self::DEVICE_COMPUTER, self::DEVICE_TABLET, self::DEVICE_MOBILE))) {
					if ($device != self::DEVICE_MOBILE) {
						$this->containerCss .= $device . ' ';
					}
				}
			}
			$this->containerCss .= 'only';
		}

		if ($this->containerCss == 'mobile only') {
			$this->isMobileOnly = true;
		}
	}

	/**
	 *
	 * Runs the widget.
	 */
	public function run() {
		echo '<div';
		if ($this->id) {
			echo ' id="'.$this->id.'"';
		}
		echo ' class="ui grid navbar container'.$this->wrapperOptions.'">';
		$this->renderNavBar();
	// 	foreach ($this->items as $item) {
	// 		if (is_string($item)) {
	// 			echo $item;
	// 		} else {
	// 			if (isset($item['class'])) {
	// 				$className = $item['class'];
	// 				unset($item['class']);

	// 				$this->controller->widget($className, $item);
	// 			}
	// 		}
	// 	}

		echo '</div>';
	// }
	}

	private function renderNavBar() {
		if ($this->isMobileOnly == false) {
			if (isset($this->containerCss)) {
				$this->containerCss .= ' row';
			} else {
				$this->containerCss = 'row';
			}
		 	echo '<div class="'.$this->containerCss.'">';

		 	echo '<div class="ui menu navbar page grid '.$this->htmlOptions['class'].'">';
			
			if ($this->brand !== false) {
				echo CHtml::openTag('a', $this->brandOptions) . $this->brand . '</a>';
			} else {
				unset($this->brandOptions['href']); // spans cannot have a href attribute
				echo CHtml::openTag('span', $this->brandOptions) . $this->brand . '</span>';
			}
			foreach ($this->items as $item) {
				if (is_string($item)) {
					echo $item;
				}
			}
			echo '</div>';
			echo '</div>';
		}
		if (in_array('mobile', $this->devices)) {
			$this->renderMobileNavBar();
		}
	}

	private function renderMobileNavBar() {
		echo '<div class="mobile only row">';
		echo '<div class="ui menu fixed navbar '.$this->htmlOptions['class'].'">';
		if ($this->brand !== false) {
				echo CHtml::openTag('a', $this->brandOptions) . $this->brand . '</a>';
		} else {
			unset($this->brandOptions['href']); // spans cannot have a href attribute
			echo CHtml::openTag('span', $this->brandOptions) . $this->brand . '</span>';
		}
		echo '
			<div class="navbar right menu open">
				<a class="menu item" href="">
					<i class="content icon"></i>
				</a>
			</div>
        ';
        echo '</div>';
        echo '<div class="ui navbar menu vertical '.$this->htmlOptions['class'].'">';
        foreach ($this->items as $item) {
			if (is_string($item)) {
				echo $item;
			}
		}
		echo '</div>';
		echo '</div>';
	}
}
