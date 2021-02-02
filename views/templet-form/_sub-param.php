<?php

/** @var app\models\Parameter $param */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/** @var app\models\TempletForm $model */
?>
<tr class="<?=$param['default']?>">
	<td class="text-center"><?= $model->rowMeta->num++ ?></td>
	<td style="padding-left:<?= ($model->rowMeta->level + 0.10) * 25 + 5; ?>px"><?= call_user_func($model->rowMeta->btnDropdown, $param) . " " . $param->nama ?></td>
	<td style="width:80px" class="text-center"><?php $param->isLabel or print $param->tipe->tipe ?></td>
	<td class="text-center" style="width:100px; background:<?php $param->default and print "#e4dfdf" ?>">
		<?php
		if ($param->isUraian) :
			echo $param['default'];
		elseif ($param->id_tipe === 4) :
			$items = ArrayHelper::map($param->getManyOpsi()->alias('o')->select('o.id,l.label')->asArray()->all(), 'id', 'label');
			if (count($items) >= 3) :
				echo Html::dropDownList('default', $param['default'], $items);
			else :
				echo Html::radioList('default', $param['default'], $items);
			endif;
		elseif ($param->id_tipe === 5) :
			$items = ArrayHelper::map($param->getManyOpsi()->alias('o')->select('o.id,l.label')->asArray()->all(), 'id', 'label');
			if (count($items) >= 3) :
				echo Html::dropDownList('default', $param['default'], $items, ['multiple' => 1]);
			else :
				echo Html::checkboxList('default', $param['default'], $items);
			endif;
		endif;
		?>
	</td>
</tr>

<?php
if ($param->isLabel) :
	$model->rowMeta->level++;
	foreach ($model->getListParam($param->id) as $param) :
		echo $this->render('_sub-param', [
			'param' => $param,
			'model' => $model,
		]);
	endforeach;
	$model->rowMeta->level--;
endif;
