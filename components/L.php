<?php

namespace app\components;

use Yii;
class L extends \yii\base\Component {
	/**
	 * Возвращает перевод на текущий язык
	 */
	public static function t($string, $cat = 'system', $params = 0)
	{
		return Yii::t($cat, $string, $params);
	}
}