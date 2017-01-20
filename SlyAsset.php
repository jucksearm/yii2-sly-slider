<?php
/**
 * @link https://github.com/jucksearm/yii2sly
 * @author Jucksearm Boonmor <jucksearm.bkk@gmail.com> 
 */

namespace jucksearm\yii2sly;

use yii\web\AssetBundle;

class SlyAsset extends AssetBundle
{
    public $sourcePath = '@vendor/jucksearm/yii2sly/assets';
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
