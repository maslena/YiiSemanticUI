<?php
/**
 * SUIWidget class file.
 */
abstract class SUIWidget extends CWidget {

	const CONTEXT_DEFAULT = 'default';
	const CONTEXT_PRIMARY = 'primary';
	const CONTEXT_SUCCESS = 'success';
	const CONTEXT_INFO = 'info';
	const CONTEXT_WARNING = 'warning';
	const CONTEXT_DANGER = 'danger';
	const CONTEXT_SECONDARY = 'secondary';
	const CONTEXT_BASIC = 'basic';
	const CONTEXT_POSITIVE = 'positive';
	const CONTEXT_NEGATIVE = 'negative';

	const CONTEXT_DEFAULT_CLASS = 'default';
	const CONTEXT_PRIMARY_CLASS = 'primary';
	const CONTEXT_SUCCESS_CLASS = 'success';
	const CONTEXT_INFO_CLASS = 'info';
	const CONTEXT_WARNING_CLASS = 'warning';
	const CONTEXT_DANGER_CLASS = 'danger';
	const CONTEXT_SECONDARY_CLASS = 'secondary';
	const CONTEXT_BASIC_CLASS = 'basic';
	const CONTEXT_POSITIVE_CLASS = 'positive';
	const CONTEXT_NEGATIVE_CLASS = 'negative';
	
	/**
	 * easily make a widget more meaningful to a particular context by adding any of the contextual state classes
	 * @var string 
	 */
	public $context = self::CONTEXT_DEFAULT;
	
	/**
	 * Utility function for appending class names for a generic $htmlOptions array.
	 *
	 * @param array $htmlOptions
	 * @param string $class
	 */
	protected static function addCssClass(&$htmlOptions, $class) {
		
		if (empty($class))
			return;
	
		if (isset($htmlOptions['class']))
			$htmlOptions['class'] .= ' ' . $class;
		else 
			$htmlOptions['class'] = $class;
	}

	/**
	 * 
	 * @param string $context
	 */
	protected function isValidContext($cotext = false) {
		if($cotext)
			return defined(get_called_class().'::CONTEXT_'.strtoupper($context));
		else
			return defined(get_called_class().'::CONTEXT_'.strtoupper($this->context));
	}
	
	/**
	 * 
	 * @param string $context
	 */
	protected function getContextClass($context = false) {
		if($context)
			return constant(get_called_class().'::CONTEXT_'.strtoupper($context).'_CLASS');
		else
			return constant(get_called_class().'::CONTEXT_'.strtoupper($this->context).'_CLASS');
	}
}