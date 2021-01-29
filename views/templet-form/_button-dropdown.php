<?php
echo yii\bootstrap\ButtonDropdown::widget([
    'label' => '',
    'options' => ['class' => 'btn btn-xs btn-primary btn-flat'],
    'dropdown' => [
        'encodeLabels' => false,
        'items' => [
            [
                'label' => '<i class="fa fa-pencil"></i> Sunting Parameter',
                'url' => ['param/update', 'id' => $param->id]
            ],
            [
                'label' => '<i class="fa fa-trash"></i> Hapus Parameter',
                'url' => ['param/delete', 'id' => $param->id],
                'linkOptions' => [
                    'data' => [
                        'method' => 'post',
                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    ],
                ]
            ],
            '<li class="divider"><li>',
            // [
            //     'label' => '<i class="fa fa-plus"></i> Tambah Pilihan Jawaban',
            //     'url' => ['pemeriksaan-rincian-pilihan/create', 'id_pemeriksaan_rincian' => $param->id],
            //     'visible' => $param->isPilihan or $param->isKesimpulan,
            // ],
            // '<li class="divider"><li>',
            [
                'label' => '<i class="fa fa-plus"></i> Tambah Sub Parameter',
                'url' => ['param/create', 'id_form' => $param->id_form, 'id_induk' => $param->id]
            ],
        ],
    ],
]);
