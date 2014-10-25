<?php

namespace app\components;

use Yii;
use \app\models\Settings;

class Ss extends \yii\base\Component {

	/**
	 * Возвращает настройки из конфига (если в базе нет) или базы
	 */
	public function get($name)
	{
		if (isset(Yii::$app->params[$name])) {
			return Yii::$app->params[$name];
		} else {
			return Settings::findOne(2)->$name;
		}
	}
}