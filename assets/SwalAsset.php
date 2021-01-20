<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SwalAsset extends AssetBundle
{
    public $sourcePath = '@npm/sweetalert/dist';
    public $css = [
        // 'sweetalert.css',
    ];
    public $js = [
        'sweetalert.min.js',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
}
