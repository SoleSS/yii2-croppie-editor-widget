<?php
namespace soless\croppieeditor;

use yii\web\AssetBundle;

class CroppieAsset extends AssetBundle 
{
    public $sourcePath = '@bower/croppie'; 
    public $css = [ 
        'croppie.css',
    ];
    public $js = [
	'croppie.min.js',
    ];
    public $publishOptions = [

    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}  