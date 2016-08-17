<?php
namespace tmukherjee13\notification;

use yii\web\AssetBundle;

/**
 * Notification asset bundle.
 */
class NotificationAsset extends AssetBundle
{
    public $css = [
    ];
    public $js = [
        'js/autobahn.min.js',
        'js/notifier.js',
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
        $this->sourcePath = __DIR__ . '/assets';
        parent::init();
    }
}
