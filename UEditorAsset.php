<?php
/**
 * Created by PhpStorm.
 * User: hoter.zhang
 * Date: 2016/5/9
 * Time: 9:38
 */

namespace xinyeweb\ueditor;


use yii\web\AssetBundle;

class UEditorAsset extends AssetBundle
{

    public $js = [
        'ueditor.config.js',
        'ueditor.all.min.js',
        'lang/zh-cn/zh-cn.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public function init() {
        $this->sourcePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
    }
}