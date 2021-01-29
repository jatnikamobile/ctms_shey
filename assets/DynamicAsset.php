<?php
namespace app\assets;

use Yii;
use yii\helpers\ArrayHelper;

class DynamicAsset extends \yii\web\AssetBundle
{
    public static function add($name, $sourcePath='', $js=[], $css=[], $opts=[])
    {
        $bundle = new self();
        $bundle->js = (array)$js;
        $bundle->css = (array)$css;
        $bundle->sourcePath = $sourcePath;
        $bundle->depends = ArrayHelper::getValue($opts, 'depends', []);
        $bundle->publish(Yii::$app->assetManager);
        return Yii::$app->assetManager->bundles[$name] = $bundle;
    }

    public static function register($view, $name='', $sourcePath='', $js=[], $css=[], $opts=[])
    {
        $bundle = self::add($name, $sourcePath, $js, $css, $opts);
        $view->registerAssetBundle($name);
        return $bundle;
    }
}
