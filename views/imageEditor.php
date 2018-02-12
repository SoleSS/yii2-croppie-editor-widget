<?php
use yii\helpers\Html;
soless\croppieeditor\CroppieEditorAsset::register($this);
?>

    <div class="form-group photoeditor-wrap" data-photoWidth="<?= $width ?>" data-photoHeight="<?= $height ?>">
	<div class="controls" style="margin-bottom:10px;">
	    <a href="/nojs.html" class="btn btn-sm btn-primary edit-btn"><span class="glyphicon glyphicon-edit"></span></a>
	    <a href="/nojs.html" class="btn btn-sm btn-success save-btn hide"><span class="glyphicon glyphicon-floppy-disk"></span></a>
	    <a href="/nojs.html" class="btn btn-sm btn-danger cancel-btn hide"><span class="glyphicon glyphicon-remove"></span></a>
	</div>

	<div class="image-wrap">
	    <img class="image" src="<?= $defaultImage ?>" />
	</div>

	<div class="edit-controls block hide">
	    <a href="/nojs.html" class="btn btn-sm btn-info open-btn"><span class="glyphicon glyphicon-floppy-open"></span> Выбрать изображение</a>
	    <a href="/nojs.html" class="btn btn-sm btn-primary rotate-left"><span class="glyphicon glyphicon-repeat" style="-moz-transform: scaleX(-1); -o-transform: scaleX(-1); -webkit-transform: scaleX(-1); transform: scaleX(-1); filter: FlipH; -ms-filter: 'FlipH';"></span></a>
	    <a href="/nojs.html" class="btn btn-sm btn-primary rotate-right"><span class="glyphicon glyphicon-repeat"></span></a>
	</div>

	<?php echo Html::activeHiddenInput($model, $attribute, ['class' => 'blob', ]) ?>
	<input type="file" class="croppie-file hide" accept="image/*">
    </div>