<?php
namespace tmukherjee13\notification;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class NotificationAsset extends AssetBundle
{
    public $sourcePath = '@vendor/tmukherjee13/yii2-live-notification/src/assets';
    public $css = [
    ];
    public $js = [
        'js/autobahn.min.js',
        'js/notifier.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}
