<?php
/**
 * SUIButton class file.
 */
Yii::import('sui.widgets.SUIWidget');

/**
 * Semantic UI button widget.
 * @see http://semantic-ui.com/elements/button.html
 * @package sui.widgets.forms.buttons
 */
class SUIButton extends SUIWidget {
	
	// Button types.
	const BUTTON_LINK = 'link';
	const BUTTON_BUTTON = 'button';
	const BUTTON_SUBMIT = 'submit';
	const BUTTON_RESET = 'reset';
	const BUTTON_AJAXBUTTON = 'ajaxButton';
	const BUTTON_AJAXSUBMIT = 'ajaxSubmit';
	const BUTTON_INPUTBUTTON = 'inputButton';
	const BUTTON_INPUTSUBMIT = 'inputSubmit';
	const BUTTON_DIV = 'div';

	// Button sizes.
	const SIZE_MINI = 'mini';
	const SIZE_TINY = 'tiny';
	const SIZE_SMALL = 'small';
	const SIZE_LARGE = 'large';
	const SIZE_DEFAULT = 'default';
	const SIZE_BIG = 'big';
	const SIZE_HUGE = 'huge';
	const SIZE_MASSIVE = 'massive';
	
	protected static $sizeClasses = [
		self::SIZE_MINI => 'mini',
		self::SIZE_TINY => 'tiny',
		self::SIZE_SMALL => 'small',
		self::SIZE_LARGE => 'large',
		self::SIZE_DEFAULT => '',
		self::SIZE_BIG => 'big',
		self::SIZE_HUGE => 'huge',
		self::SIZE_MASSIVE => 'massive',
	];

	// Colors
	const COLOR_BLACK = 'black';
	const COLOR_YELLOW = 'yellow';
	const COLOR_GREEN = 'green';
	const COLOR_BLUE = 'blue';
	const COLOR_ORANGE = 'orange';
	const COLOR_PURPLE = 'purple';
	const COLOR_PINK = 'pink';
	const COLOR_RED = 'red';
	const COLOR_TEAL = 'teal';

	protected static $colorClasses = [
		self::COLOR_BLACK => 'black',
		self::COLOR_YELLOW => 'yellow',
		self::COLOR_GREEN => 'green',
		self::COLOR_BLUE => 'blue',
		self::COLOR_ORANGE => 'orange',
		self::COLOR_PURPLE => 'purple',
		self::COLOR_PINK => 'pink',
		self::COLOR_RED => 'red',
		self::COLOR_TEAL => 'teal',
	];

	// Social Media
	const SOCIAL_FACEBOOK = 'facebook';
	const SOCIAL_TWITTER = 'twitter';
	const SOCIAL_GOOGLE_PLUS = 'google plus';
	const SOCIAL_VK = 'vk';
	const SOCIAL_LINKEDIN = 'linkedin';
	const SOCIAL_INSTAGRAM = 'instagram';
	const SOCIAL_YOUTUBE = 'youtube';

	protected static $socialClasses = [
		self::SOCIAL_FACEBOOK => 'facebook',
		self::SOCIAL_TWITTER => 'twitter',
		self::SOCIAL_GOOGLE_PLUS => 'google plus',
		self::SOCIAL_VK => 'vk',
		self::SOCIAL_LINKEDIN => 'linkedin',
		self::SOCIAL_INSTAGRAM => 'instagram',
		self::SOCIAL_YOUTUBE => 'youtube',
	];

	/**
	 * @var string the button types.
	 */
	public $type = self::BUTTON_BUTTON;

	/**
	 * @var string the button size.
	 * @see http://semantic-ui.com/elements/button.html#sizes
	 */
	public $size;

	/**
	 * @var string the button icon.
	 * @see http://semantic-ui.com/kitchen-sink.html#icon
	 */
	public $icon;

	/**
	 * @var string the button label.
	 */
	public $label;

	/**
	 * @var string the button URL.
	 */
	public $url;

	/**
	 * @var boolean indicates whether the button should span the full width of the a parent.
	 */
	public $fluid = false;

	/**
	 * @var boolean indicates whether the button is active.
	 */
	public $active = false;

	/**
	 * @var boolean indicates whether the button is disabled.
	 */
	public $disabled = false;

	/**
	 * @var boolean indicates whether to encode the label.
	 */
	public $encodeLabel = true;

	/**
	 * @var boolean indicates whether to enable toggle.
	 */
	public $toggle;

	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();

	/**
	 * @var array the button ajax options (used by 'ajaxLink' and 'ajaxButton').
	 */
	public $ajaxOptions = array();

	/**
	 * @var boolean whether the button is visible or not.
	 */
	public $visible = true;

    /**
     * @var array the button animation configurations.
     */
    public $animated = array();

    /**
     * @var string the labeled icon button.
     * @see http://semantic-ui.com/elements/button.html#labeled-icon
     */
    public $labeled;

	/**
     * @var string the valid button color.
     * @see http://semantic-ui.com/elements/button.html#colors
     */
    public $color;
	
	/**
     * @var boolean indicates whether the button should inverting the button color to appear on darker background.
     * @see http://semantic-ui.com/elements/button.html#inverted
     */
    public $inverted = false;

    /**
     * @var string format the button to link to a social website.
     * @see http://semantic-ui.com/elements/button.html#social
     */
    public $social;

    /**
     * @var boolean indicates whether the button should reduce the padding to fit into tighter spaces.
     * @see http://semantic-ui.com/elements/button.html#compact
     */
    public $compact = false;
    
    /**
     * @var boolean indicates whether the button enable the circular style.
     * @see http://semantic-ui.com/elements/button.html#circular
     */
    public $circular = false;

    /**
     * @var boolean indicates the button loading state
     */
    public $loading = false;

    /**
     * @var string the button attach position
     * @see http://semantic-ui.com/elements/button.html#vertically-attached
     */
    public $attached;

	/**
	 *### .init()
	 *
	 * Initializes the widget.
	 */
	public function init() {
		Yii::app()->getClientScript()->registerPackage('button');
		if (false === $this->visible) {
			return;
		}

		$classes = array('ui', 'button');

		if ($this->isValidContext()) {
			$classes[] = $this->getContextClass();
		}

		$validSizes = array(
			self::SIZE_MINI,
			self::SIZE_TINY,
			self::SIZE_SMALL,
			self::SIZE_LARGE,
			self::SIZE_DEFAULT,
			self::SIZE_BIG,
			self::SIZE_HUGE,
			self::SIZE_MASSIVE
		);

		if (isset($this->size) && in_array($this->size, $validSizes)) {
			$classes[] = self::$sizeClasses[$this->size];
		}

		if ($this->fluid) {
			$classes[] = 'fluid';
		}

		if ($this->active) {
			$classes[] = 'active';
		}

		if ($this->disabled) {
			$disableTypes = array(
				self::BUTTON_BUTTON,
				self::BUTTON_SUBMIT,
				self::BUTTON_RESET,
				self::BUTTON_AJAXBUTTON,
				self::BUTTON_AJAXSUBMIT,
				self::BUTTON_INPUTBUTTON,
				self::BUTTON_INPUTSUBMIT,
				self::BUTTON_DIV
			);

			if (in_array($this->type, $disableTypes)) {
				$this->htmlOptions['disabled'] = 'disabled';
			}

			$classes[] = 'disabled';
		}

		if (!isset($this->url) && isset($this->htmlOptions['href'])) {
			$this->url = $this->htmlOptions['href'];
			unset($this->htmlOptions['href']);
		}

		if ($this->encodeLabel) {
			$this->label = CHtml::encode($this->label);
		}

		if ($this->isAnimated()) {
			$classes[] = 'animated';
			if (isset($this->animated['type'])) {
				$classes[] = $this->animated['type'];
			}

			if (isset($this->animated['visibleContent'])) {
				$this->label = '<div class="visible content">';
				if (isset($this->animated['visibleContent']['icon']))
					$this->label .= '<i class="' . $this->animated['visibleContent']['icon'] . ' icon"></i>';
				if (isset($this->animated['visibleContent']['label']))
					$this->label .= $this->animated['visibleContent']['label'];
				$this->label .= '</div>';
			}

			if (isset($this->animated['hiddenContent'])) {
				$this->label .= '<div class="hidden content">';
				if (isset($this->animated['hiddenContent']['icon']))
					$this->label .= '<i class="' . $this->animated['hiddenContent']['icon'] . ' icon"></i>';
				if (isset($this->animated['hiddenContent']['label']))
					$this->label .= $this->animated['hiddenContent']['label'];
				$this->label .= '</div>';
			}
		}

		if (isset($this->icon)) {
			$classes[] = 'icon';
			$this->label = '<i class="' . $this->icon . ' icon"></i> ' . $this->label;
		}

		if (isset($this->labeled)) {
			if($this->labeled !== '' && $this->labeled !== null)
				$classes[] = $this->labeled;
			$classes[] = 'labeled';
		}

		if ($this->inverted) {
			$classes[] = 'inverted';
		}

		$validColors = array(
			self::COLOR_BLACK,
			self::COLOR_YELLOW,
			self::COLOR_GREEN,
			self::COLOR_BLUE,
			self::COLOR_ORANGE,
			self::COLOR_PURPLE,
			self::COLOR_PINK,
			self::COLOR_RED,
			self::COLOR_TEAL
		);
		
		if (isset($this->color) && in_array($this->color, $validColors)) {
			$classes[] = self::$colorClasses[$this->color];
		}

		$validSocialMedia = array(
			self::SOCIAL_FACEBOOK,
			self::SOCIAL_TWITTER,
			self::SOCIAL_GOOGLE_PLUS,
			self::SOCIAL_VK,
			self::SOCIAL_LINKEDIN,
			self::SOCIAL_INSTAGRAM,
			self::SOCIAL_YOUTUBE
		);
		
		if (isset($this->social) && in_array($this->social, $validSocialMedia)) {
			$classes[] = self::$socialClasses[$this->social];
		}

		if ($this->compact) {
			$classes[] = 'compact';
		}

		if ($this->circular) {
			$classes[] = 'circular';
		}

		if ($this->loading) {
			$classes[] = 'loading';
		}

		if (isset($this->attached)) {
			if($this->attached !== '' && $this->attached !== null)
				$classes[] = $this->attached;
			$classes[] = 'attached';
		}

		// Implode the classes
		if (!empty($classes)) {
			$classes = implode(' ', $classes);
			if (isset($this->htmlOptions['class'])) {
				$this->htmlOptions['class'] .= ' ' . $classes;
			} else {
				$this->htmlOptions['class'] = $classes;
			}
		}

		//Generate id property to element
		if (!isset($this->htmlOptions['id'])) {
			$this->htmlOptions['id'] = $this->getId();
		}
	}

	/**
	 *### .run()
	 *
	 * Runs the widget.
	 */
	public function run() {
		if (false === $this->visible) {
			return;
		}
		echo $this->createButton();
	}

	/**
	 *### .createButton()
	 *
	 * Creates the button element.
	 *
	 * @return string the created button.
	 */
	protected function createButton() {
		
		switch ($this->type) {
			case self::BUTTON_LINK:
				return CHtml::link($this->label, $this->url, $this->htmlOptions);
				
			case self::BUTTON_SUBMIT:
				$this->htmlOptions['type'] = 'submit';
				return CHtml::htmlButton($this->label, $this->htmlOptions);

			case self::BUTTON_RESET:
				$this->htmlOptions['type'] = 'reset';
				return CHtml::htmlButton($this->label, $this->htmlOptions);

			case self::BUTTON_AJAXBUTTON:
				$this->ajaxOptions['url'] = $this->url;
				$this->htmlOptions['ajax'] = $this->ajaxOptions;
				return CHtml::htmlButton($this->label, $this->htmlOptions);

			case self::BUTTON_AJAXSUBMIT:
				$this->ajaxOptions['type'] = isset($this->ajaxOptions['type']) ? $this->ajaxOptions['type'] : 'POST';
				$this->ajaxOptions['url'] = $this->url;
				$this->htmlOptions['type'] = 'submit';
				$this->htmlOptions['ajax'] = $this->ajaxOptions;
				return CHtml::htmlButton($this->label, $this->htmlOptions);

			case self::BUTTON_INPUTBUTTON:
				return CHtml::button($this->label, $this->htmlOptions);

			case self::BUTTON_INPUTSUBMIT:
				$this->htmlOptions['type'] = 'submit';
				return CHtml::button($this->label, $this->htmlOptions);
				
			case self::BUTTON_DIV:
				return $this->createButtonDiv();

			default:
			case self::BUTTON_BUTTON:
				return CHtml::htmlButton($this->label, $this->htmlOptions);
		}
	}
	
	protected function createButtonDiv() {
		$html = CHtml::openTag('div', $this->htmlOptions);
		$html .= $this->label;
		$html .= CHtml::closeTag('div');

		return $html;
	}

	/**
	 *### .isAnimated()
	 *
	 * Returns whether the button has animation or not.
	 *
	 * @return boolean the result.
	 */
	protected function isAnimated() {
		return isset($this->animated) && !empty($this->animated);
	}
}
