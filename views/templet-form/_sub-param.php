<?php
/** @var app\models\Parameter $param */
/** @var app\models\TempletForm $model */
$isDefaultValueIsNotNull = null;
$isKesimpulan = null;
?>
<tr class="tipe-<?= $param->id_tipe ?> <?= $param->isPilihan ? 'isPilihan' : '' ?>">
	<td class="text-center"><?= $i ?></td>
	<td style="padding-left:<?= ($level + 0.10) * 25 + 5; ?>px"><?= $this->render('_button-dropdown', compact('param')) . " " . $param->nama ?></td>
	<td width="120px" class="text-center"><?= $param->tipe->tipe ?></td>
	<td class="text-center" style="background: <?= ($isDefaultValueIsNotNull) ? "#e4dfdf" : ""; ?>">
		<?php if ($param->isUraian and $isDefaultValueIsNotNull) : ?>
			<?= $param->default_value ?>
		<?php endif ?>
	</td>
	<td><?= $param->nilai_rujukan ?? null ?></td>
</tr>

<?php if (!$param->isLabel) return; ?>
<?php foreach ($model->getListParam($param->id) as $_param) : ?>
	<?= $this->render('_sub-param', [
		'i' => '',
		'level' => ++$level,
		'param' => $_param,
		'model' => $model,
	]) ?>
<?php endforeach ?>
