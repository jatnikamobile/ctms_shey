<?php 

use app\models\UserRole;
use yii\helpers\Url;

?>

<?= dmstr\widgets\Menu::widget(
    [
        'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
        'items' => [
            // ['label' => 'SETUP','options' => ['class' => 'header']],
            // ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['/site/index']],

            // ['label' => 'Protokol Manag','options' => ['class' => 'header']],
            // ['label' => 'Templet Form', 'icon' => 'circle-o', 'url' => ['templet-form/index']],
            // ['label' => 'Pengujian', 'icon' => 'circle-o', 'url' => ['pasien/index', 'status' => 1]],

            [
                'label' => 'SETUP',
                'icon' => 'thumb-tack',
                'url' => '#',
                'items' => [
                    ['label' => 'Protokol', 'icon' => 'circle-o', 'url' => ['protokol/index']],
                    ['label' => 'Parameter', 'icon' => 'circle-o', 'url' => ['templet-form/index']],
                    // ['label' => 'Subject Sesuai Kriteria', 'icon' => 'circle-o', 'url' => ['pasien/index', 'status' => 1]],
                ],
            ],

            // [
            //     'label' => 'Rekrut Subject',
            //     'icon' => 'thumb-tack',
            //     'url' => '#',
            //     'items' => [
            //         ['label' => 'Daftar Subject', 'icon' => 'circle-o', 'url' => ['pasien/index']],
            //         ['label' => 'Subject Sesuai Kriteria', 'icon' => 'circle-o', 'url' => ['pasien/index', 'status' => 1]],
            //     ]
            // ],
            // ['label' => 'Analisis Hasil Uji', 'icon' => 'circle-o', 'url' => ['registrasi/analisis-mcu']],
            // ['label' => 'Resume Uji Klinis', 'icon' => 'check-square-o', 'url' => ['registrasi/resume-pasien']],
            // ['label' => Yii::t('backend', 'External link'), 'icon' => 'check-square-o', 'url' => 'http://ctmspejaten.ddns.net:8282/modul_registrasi_rev/', 'template'=> '<a href="{url}" target="_blank">{label}</a>'],
            // array('label' => 'Registrasi Subject', 'url' => array('http://ctmspejaten.ddns.net:8282/modul_registrasi_rev/'), 'linkOptions' => array('target'=>'_blank')),
            // ['label' => 'Enrollment','options' => ['class' => 'header']],
            // ['label' => 'Admission', 'icon' => 'check-square-o', 'url' => 'http://ctmspejaten.ddns.net:8282/modul_registrasi_rev/', 'template'=> '<a href="{url}" target="_blank">{label}</a>'],
            // ['label' => 'Phase', 'icon' => 'circle-o', 'url' => ['unit/index']],
            ['label' => '','options' => ['class' => 'header']],
            [
                'label' => 'Enrollment',
                'icon' => 'thumb-tack',
                'url' => '#',
                'items' => [
                    ['label' => 'Demography', 'icon' => 'circle-o', 'url' => ['paket/index']],
                    ['label' => 'CRF', 'icon' => 'circle-o', 'url' => ['instansi/index']],
                    ['label' => 'Notification', 'icon' => 'circle-o', 'url' => ['instansi/index']],
                ],
            ],

            [
                'label' => 'Master',
                'icon' => 'thumb-tack',
                'url' => '#',
                'items' => [
                    ['label' => 'Sponsor', 'icon' => 'circle-o', 'url' => ['sponsor/index']],
                    // ['label' => 'Set Up Protokol ', 'icon' => 'circle-o', 'url' => ['pemeriksaan/index']],
                    ['label' => 'Pasien', 'icon' => 'circle-o', 'url' => ['pasien/index']],
                    ['label' => 'Dokter', 'icon' => 'circle-o', 'url' => ['dokter/index']],
                    ['label' => 'Petugas', 'icon' => 'circle-o', 'url' => ['petugas/index']],
                    ['label' => 'Diagnosa Kerja', 'icon' => 'circle-o', 'url' => ['diagnosa-kerja/index']],
                    ['label' => 'Kop', 'icon' => 'circle-o', 'url' => ['kop/index']],
                    ['label' => 'Agama', 'icon' => 'circle-o', 'url' => ['agama/index']],
                    ['label' => 'Pendidikan', 'icon' => 'circle-o', 'url' => ['pendidikan/index']],
                    ['label' => 'Pekerjaan', 'icon' => 'circle-o', 'url' => ['pekerjaan/index']],
                    ['label' => 'Wilayah', 'icon' => 'circle-o', 'url' => ['wilayah/index']],
                ]
            ],
            ['label' => 'SISTEM','options' => ['class' => 'header']],
            [
                'label' => 'User',
                'icon' => 'user',
                'url' => '#',
                'items' => [
                    ['label' => 'Admin', 'icon' => 'circle-o', 'url' => ['user/','id_user_role' => UserRole::ADMIN]],
                    ['label' => 'Instansi', 'icon' => 'circle-o', 'url' => ['user/','id_user_role' => UserRole::INSTANSI]],
                    ['label' => 'Dokter', 'icon' => 'circle-o', 'url' => ['user/','id_user_role' => UserRole::DOKTER]],
                ]
            ],
            ['label' => 'Logout','icon' => 'lock', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post">{icon} {label}</a>' , 'visible' => !Yii::$app->user->isGuest],
        ]
    ]
) ?>   
