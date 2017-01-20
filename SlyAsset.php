<?php
/**
 * @link https://github.com/jucksearm/yii2-sly-slider
 * @author Jucksearm Boonmor <jucksearm.bkk@gmail.com> 
 */

namespace jucksearm\sly;

use yii\web\AssetBundle;

class SlyAsset extends AssetBundle
{
    public $sourcePath = '@vendor/jucksearm/yii2-sly-slider/assets';
    public $css = [
        'css/sly.css'
    ];
    public $js = array(
        'js/plugins.js',
        'js/sly.min.js'
    );
    public $depends = array(
        'yii\web\JqueryAsset',
    );
}
