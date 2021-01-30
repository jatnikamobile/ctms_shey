<?php

use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;

/** @var \yii\web\View $this */
/** @var string $content */


if (Yii::$app->controller->action->id === 'login') {
    return print $this->render(
        'main-login',
        ['content' => $content]
    );
}


dmstr\web\AdminLteAsset::register($this);
app\assets\DynamicAsset::register($this, 'Swal2', '@npm/sweetalert2/dist', 'sweetalert2.all.min.js');
app\assets\AppAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

$this->registerJsFile('@web/js/wretch.js');
$this->registerJsFile('@web/js/helpers.js', ['depends'=>'Swal2']);

$tooltip = <<< SCRIPT
        $('body').tooltip({
            selector: '[data-toggle="tooltip"]'
        });

        $(document).ready(function() {
    
            $(".format-uang").on("keyup", function(){
                var _this = $(this);
                var value = _this.val().replace(/\.| /g,"");
                _this.val(accounting.formatMoney(value, "", 0, ".", ","))
            });

        });        
SCRIPT;
$this->registerJs($tooltip, \yii\web\View::POS_READY);

$js = <<<SCRIPT
/* To initialize BS3 tooltips set this below */
$(function () { 
    $("[data-toggle='tooltip']").tooltip(); 
});;
/* To initialize BS3 popovers set this below */
$(function () { 
    $("[data-toggle='popover']").popover(); 
});
SCRIPT;
// Register tooltip/popover initialization javascript
$this->registerJs($js);

$collapse = (Yii::$app->controller->action->id == "resume-pasien") ? "sidebar-collapse" : "";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="hold-transition skin-blue sidebar-mini <?= $collapse ?>">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'backend/header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'backend/left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'backend/content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
