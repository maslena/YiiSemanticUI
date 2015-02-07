<?php
/**
 * Yii Sementaic UI Filter class file
 *
 * @author Maslena ZA <maslena@wan.la>
 * @version 1.0.0
 *
 */

/**
 * Class SUIFilter
 *
 * Filter to load Yii Semantic UI on specific actions.
 * In a controller, add the new booster filter:
 * public function filters()
 * {
 *     return array(
 *         'accessControl',
 *         'postOnly + delete',
 *         array('sui.filters.SUIFilter - delete') // <-- Add this line
 *     );
 * }
 *
 * @package sui.filters
 */
class SUIFilter extends CFilter {
	
	protected function preFilter($filterChain) {
		
		Yii::app()->getComponent("sui");
		return true;
	}
}
