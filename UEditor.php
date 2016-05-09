<?php
/**
 * Created by PhpStorm.
 * User: hoter.zhang
 * Date: 2016/5/9
 * Time: 9:42
 */

namespace xinyeweb\ueditor;


use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\InputWidget;

class UEditor extends InputWidget
{

    public $clientConfig  = [];
    protected $_options;
    public function init(){
        $this->id = $this->hasModel() ? Html::getInputId($this->model, $this->attribute) : $this->id;
        $this->_options = [
            'serverUrl' =>  Url::to(['upload']),//圖片上傳地址
            'initialFrameWidth' => '100%',
            'initialFrameHeight' => '400',
            'toolbars' => [
                [
                    'fullscreen', 'source', 'undo', 'redo',  'removeformat', 'lineheight', 'indent', 'simpleupload',
                ],
            ],
            'lang' => (strtolower(Yii::$app->language) == 'en-us') ? 'en' : 'zh-cn',
        ];
        $this->clientConfig = count($this->clientConfig)>0 ? ArrayHelper::merge($this->_options, $this->clientConfig) : $this->_options;
        parent::init();
    }

    protected function registerClientScript(){
        UEditorAsset::register($this->view);
        $clientOptions = Json::encode($this->clientConfig);
        $scripts = "UE.getEditor('" . $this->id . "',".$clientOptions.")";
        $this->view->registerJs($scripts, View::POS_READY);
    }

    public function run(){
        $this->registerClientScript();
        if ($this->hasModel()) {
            return Html::activeTextarea($this->model, $this->attribute, ['id'=>$this->id]);
        } else {
            return Html::textarea($this->id, $this->value, ['id'=>$this->id]);
        }
    }
}