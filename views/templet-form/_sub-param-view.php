<?php
/** @var app\models\Parameter $param */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/** @var app\models\TempletForm $model */
$isDefaultValueIsNotNull = null;
$isKesimpulan = null;
?>
<tr class="<?= $param->isPilihan ? 'isPilihan' : '' ?>">
	<td class="text-center"><?= $model->rowMeta->num++ ?></td>
	<td style="padding-left:<?= ($param->level + 0.10) * 25 + 5; ?>px"><?= $param->nama ?></td>
	<td style="width:80px" class="text-center"><?php $param->isLabel or print $param->tipe->tipe ?></td>
	<td class="text-center" style="width:100px; background:<?php $param->default and print "#e4dfdf" ?>">
        <?php
        if ($param->isUraian):
			echo $param['default'];
		elseif ($param->id_tipe === 4):
            $items = ArrayHelper::map($param->getManyOpsi()->alias('o')->select('o.id,l.label')->asArray()->all(), 'id','label');
            if (count($items) >= 3):
                echo Html::dropDownList('default', $param['default'], $items);
            else:
                echo Html::radioList('default', $param['default'], $items);
            endif;
        elseif ($param->id_tipe === 5):
            $items = ArrayHelper::map($param->getManyOpsi()->alias('o')->select('o.id,l.label')->asArray()->all(), 'id','label');
            if (count($items) >= 3):
                echo Html::dropDownList('default', $param['default'], $items, ['multiple'=>1]);
            else:
                echo Html::checkboxList('default', $param['default'], $items);
            endif;
        endif;
        ?>
	</td>
</tr>

<?php if (!$param->isLabel) return; ?>
<?php foreach ($model->getListParam($param->id) as $param) : ?>
	<?= $this->render('_sub-param-view', [
		'param' => $param,
		'model' => $model,
	]) ?>
<?php endforeach ?>
