<?php
namespace soless\croppieeditor;

use yii\web\AssetBundle;

class CroppieEditorAsset extends AssetBundle 
{
    public $sourcePath = '@vendor/soless/yii2-croppie-editor-widget'; 
    public $css = [ 
        '@bower-asset/croppie/croppie.css',
    ];
    public $js = [
	'@bower-asset/croppie/croppie.min.js',
	'assets/js/piexif.js',
	'assets/js/croppie-editor.js',
    ];
    public $publishOptions = [

    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}  