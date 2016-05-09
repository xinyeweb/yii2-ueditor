yii2-ueditor
============
yii2-ueditor

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist xinyeweb/yii2-ueditor:dev-master
```

or add

```
"xinyeweb/yii2-ueditor": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
public function actions()
{
    return [
        'upload' => [
            'class' => 'xinyeweb\ueditor\UEditorAction',
            'config' => [
                'imageRoot' => dirname(\Yii::$app->basePath).dirname(\Yii::getAlias('@web')). DIRECTORY_SEPARATOR . 'images_webroot',//圖片的根路径
                //'imageUrlPrefix' => 'http://www.baidu.com',
                //'imagePathFormat' =>  dirname(Yii::$app->basePath)."/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}" ,
            ]
        ]
    ];
}
```
使用：
```php
<?= $form->field($model, 'description')->widget('\xinyeweb\ueditor\UEditor',[]) ?>
```