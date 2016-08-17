<?php

namespace tmukherjee13\notification\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class NotificationAsset extends AssetBundle
{
    // public $sourcePath = 'tmukherjee13\\notification\\web\\assets';
    // public $css = [
    //     'css/site.css',
    // ];
    // public $js = [
    //     'js/autobahn.min.js',
    //     'js/notifier.js',
    // ];
    // public $depends = [
    //     'yii\web\YiiAsset',
    // ];
    //

    const EMPTY_ASSET = 'N0/@$$3T$';
    const EMPTY_PATH = 'N0/P@T#';
    const NTF_ASSET = 'K3/@$$3T$';
    const NTF_PATH = 'K3/P@T#';

    public $js         = self::NTF_ASSET;
    public $css        = self::NTF_ASSET;
    public $sourcePath = self::NTF_PATH;
    public $depends    = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('js', ['js/kv-dynagrid']);
        $this->setupAssets('css', ['css/kv-dynagrid']);
        parent::init();
    }

    /**
     * Set up CSS and JS asset arrays based on the base-file names
     *
     * @param string $type whether 'css' or 'js'
     * @param array $files the list of 'css' or 'js' basefile names
     */
    protected function setupAssets($type, $files = [])
    {
        if ($this->$type === self::NTF_ASSET) {
            $srcFiles = [];
            $minFiles = [];
            foreach ($files as $file) {
                $srcFiles[] = "{$file}.{$type}";
                $minFiles[] = "{$file}.min.{$type}";
            }
            $this->$type = YII_DEBUG ? $srcFiles : $minFiles;
        } elseif ($this->$type === self::EMPTY_ASSET) {
            $this->$type = [];
        }
    }

    /**
     * Sets the source path if empty
     *
     * @param string $path the path to be set
     */
    protected function setSourcePath($path)
    {
        if ($this->sourcePath === self::NTF_PATH) {
            $this->sourcePath = $path;
        } elseif ($this->sourcePath === self::EMPTY_PATH) {
            $this->sourcePath = null;
        }
    }
}
