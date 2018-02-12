# Yii2 Croppie editor widget

Croppie powered active form image editor

install: php composer.phar require --prefer-dist soless/yii2-croppie-editor-widget "*"

Basic usage:
```php
    <?php echo $form->field($model, 'imageBlob')->widget('soless\croppieeditor\CroppieEditorWidget', [
	      'defaultImage' => $model->image,
	      'width' => 608,
	      'height' => 360,
    ]) ?>
```
