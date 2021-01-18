<?php
	use yii\helpers\Html;
	use app\components\Helper;
?>
<table class="table-pdf" style="margin:auto; width:100%;">
	<thead>
		<tr>
			<th><?= strtoupper("Tanggal") ?></th>
			<th><?= strtoupper("Unit") ?></th>
			<th><?= strtoupper("IPCLN") ?></th>
			<th><?= strtoupper("Mencatat Linen") ?></th>
			<th><?= strtoupper("Memisah Linen Infeksius") ?></th>
			<th><?= strtoupper("Memisah Linen Kotor") ?></th>
			<th><?= strtoupper("Diletakan Dilantai") ?></th>
			<th><?= strtoupper("Pencucian Linen Infeksius") ?></th>
			<th><?= strtoupper("Pencucian Linen Ternoda") ?></th>
			<th><?= strtoupper("Suhu Air") ?></th>
			<th><?= strtoupper("Membilas Air Biasa") ?></th>
			<th><?= strtoupper("Mensetrika Linen Kering") ?></th>
			<th><?= strtoupper("Mensetrika Linen Persatu") ?></th>
			<th><?= strtoupper("Memisah Linen Perjenis") ?></th>
			<th><?= strtoupper("Tidak Menyentuh Tanah") ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($model as $data) { ?>
		<tr>
			<td><?= Helper::getTanggalBulanSingkat($data->tanggal) ?></td>
			<td><?= @$data->mstUnit->nama ?></td>
			<td><?= @$data->mstIpcln->nama ?></td>
			<td><?= $data->getStatusYa($data->mencatat_linen) ?></td>
			<td><?= $data->getStatusYa($data->memisah_linen_infeksius) ?></td>
			<td><?= $data->getStatusYa($data->memisah_linen_kotor) ?></td>
			<td><?= $data->getStatusYa($data->diletakan_dilantai) ?></td>
			<td><?= $data->getStatusYa($data->pencucian_linen_infeksius) ?></td>
			<td><?= $data->getStatusYa($data->pencucian_linen_ternoda) ?></td>
			<td><?= $data->getStatusYa($data->suhu_air) ?></td>
			<td><?= $data->getStatusYa($data->membilas_air_biasa) ?></td>
			<td><?= $data->getStatusYa($data->mensetrika_linen_kering) ?></td>
			<td><?= $data->getStatusYa($data->mensetrika_linen_persatu) ?></td>
			<td><?= $data->getStatusYa($data->memisah_linen_perjenis) ?></td>
			<td><?= $data->getStatusYa($data->tidak_menyentuh_tanah) ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>