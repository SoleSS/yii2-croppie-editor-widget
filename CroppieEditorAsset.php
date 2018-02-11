<?php
namespace soless\croppieEditor;

use yii\web\AssetBundle;

class CroppieEditorAsset extends AssetBundle 
{
    public $sourcePath = '@vendor/soless/croppie-editor'; 
    public $css = [ 
        '@bower/croppie/croppie.css',
    ];
    public $js = [
	'@bower/croppie/croppie.min.js',
	'assets/js/piexif.js',
	'assets/js/croppie-editor.js',
    ];
    public $publishOptions = [

    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}  