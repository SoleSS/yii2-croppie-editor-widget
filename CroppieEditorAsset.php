<?php
namespace soless\croppieeditor;

use yii\web\AssetBundle;

class CroppieEditorAsset extends AssetBundle 
{
    public $sourcePath = '@vendor/soless/yii2-croppie-editor-widget'; 
    public $css = [ 
        '',
    ];
    public $js = [
	'assets/js/piexif.js',
	'assets/js/croppie-editor.js',
    ];
    public $publishOptions = [

    ];
    public $depends = [
        'soless\croppieeditor\CroppieAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}  