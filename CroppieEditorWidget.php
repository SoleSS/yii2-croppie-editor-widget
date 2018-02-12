<?php
namespace soless\croppieeditor;

use yii\base\Exception;
use yii\base\Model;
use yii\widgets\InputWidget;
use yii\helpers\Html;

class CroppieEditorWidget extends InputWidget {
    public $htmlOptions = [];
    public $width;
    public $height;
    public $defaultImage = '/nophoto.png';

    protected function hasModel() {
	return $this->model instanceof Model;
    }

    public function run() {
	if (!$this->hasModel()) {
	    throw new Exception('Ошибка: нет модели данных');
	}

	if ($this->width === null || $this->height === null) {
	    throw new Exception('Ошибка: не указаны параметры width/height');
	}
	
	if ($this->defaultImage === null) {
	    throw new Exception('Ошибка: не указано изображение');
	}

	return $this->render('imageEditor', [
		  'width' => $this->width, 
		  'height' => $this->height, 
		  'model' => $this->model, 
		  'attribute' => $this->attribute, 
		  'htmlOptions' => $this->htmlOptions, 
		  'defaultImage' => $this->defaultImage, 
		  'id' => $this->getId(), 
	]);
    }
}