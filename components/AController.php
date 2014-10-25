<?php

namespace app\components;

use Yii;
use yii\helpers\Url;

class AController extends \yii\web\Controller {
	public $layout = 'main'; // layout по умолчанию
	public $breadcrumbs = array(); // Хлебные крошки
	public $alerts = array( // Оповещения на странице
		'danger'  => array(),
		'success' => array(),
		'info'    => array(),
		'warning' => array(),
	);
	public $permission; // Объект класса Permission
	public $perm; // Тоже самое, но сокращенно
	public $page_id; // String id страницы <controller>_<action>
	public $menu;
	public $title; // Содержит title страницы
	public $keywords; // Содержит ключевые слова страницы
	public $description; // Содержит описание страницы
	public $global = array(); // Другие глобальные параметры

	public function init() {

		// Назначаем title по умолчанию
		$this->title = Yii::$app->ss->get('default-title');
		// Назначаем ключевые слова по умолчанию
		$this->keywords = Yii::$app->ss->get('default-keywords');
		// Назначаем описание по умолчанию
		$this->description = Yii::$app->ss->get('default-description');
		// Устанавливаем хлебные крошки (первую ссылку)
		$this->breadcrumbs[] = array(
			'name' => L::t('index','content/breadcrumbs'),
			'link' => Url::toRoute('/'),
		);
	}

    public function active($route, $return = '', $full_match = false)
    {
        $param_pos = strpos(Yii::$app->request->url,'?');
        $uri = Yii::$app->request->url;
        if ($param_pos !== false) {
            $uri = substr(Yii::$app->request->url, 0, strpos(Yii::$app->request->url,'?'));
        }
        if (is_array($route)) {
            foreach ($route as $value) {
                $pattern = '/^'.str_replace('/','\/',$value).'(\Z|(\/[\w\d]+)+)/';
                if ((!$full_match && preg_match($pattern, $uri)) || ($full_match && $uri == $value)) {
                    if (empty($return)) {
                        return true;
                    } else {
                        echo $return;
                        break;
                    }
                } else {
                    if (empty($return)) {
                        return false;
                    }
                }
            }
        } else {
            $pattern = '/^'.str_replace('/','\/',$route).'(\Z|(\/[\w\d]+)+)/';
            if ((!$full_match && preg_match($pattern, $uri)) || ($full_match && $uri == $route)) {
                if (empty($return)) {
                    return true;
                } else {
                    echo $return;
                }
            } else {
                if (empty($return)) {
                    return false;
                }
            }
        }
    }

	public function setTitle($str) {
		$this->title = $str . ' - ' . Yii::app()->ss->get('title');
	}

	public function setKeywords($str) {
		$this->keywords = $str . ', ' . Yii::$app->ss->get('keywords');
	}

	public function setDescription($str) {
		$this->description = $str . ', ' . Yii::app()->ss->get('description');
	}
}