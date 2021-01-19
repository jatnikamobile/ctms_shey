<?php 

use app\models\UserRole;
use yii\helpers\Url;

?>

<?= dmstr\widgets\Menu::widget(
    [
        'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
        'items' => [
            ['label' => 'MENU UTAMA','options' => ['class' => 'header']],
            ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['/site/index']],
            ['label' => 'Register Protokol', 'icon' => 'list', 'url' => ['protokol-uji/index']],
            ['label' => 'Analisis Hasil Uji', 'icon' => 'circle-o', 'url' => ['registrasi/analisis-mcu']],
            ['label' => 'Resume Uji Klinis', 'icon' => 'check-square-o', 'url' => ['registrasi/resume-pasien']],
            // ['label' => Yii::t('backend', 'External link'), 'icon' => 'check-square-o', 'url' => 'http://ctmspejaten.ddns.net:8282/modul_registrasi_rev/', 'template'=> '<a href="{url}" target="_blank">{label}</a>'],
            // array('label' => 'Registrasi Subject', 'url' => array('http://ctmspejaten.ddns.net:8282/modul_registrasi_rev/'), 'linkOptions' => array('target'=>'_blank')),
            ['label' => 'Enrollment','options' => ['class' => 'header']],
            ['label' => 'Admission', 'icon' => 'check-square-o', 'url' => 'http://ctmspejaten.ddns.net:8282/modul_registrasi_rev/', 'template'=> '<a href="{url}" target="_blank">{label}</a>'],
            ['label' => 'MENU MASTER','options' => ['class' => 'header']],
            ['label' => 'Set Up Protokol ', 'icon' => 'circle-o', 'url' => ['pemeriksaan/index']],
            ['label' => 'Protokol Uji', 'icon' => 'circle-o', 'url' => ['paket/index']],
            ['label' => 'Nama Sponsor', 'icon' => 'circle-o', 'url' => ['instansi/index']],
            ['label' => 'Phase', 'icon' => 'circle-o', 'url' => ['unit/index']],
            [
                'label' => 'Master ',
                'icon' => 'thumb-tack',
                'url' => '#',
                'items' => [
                    ['label' => 'Pasien', 'icon' => 'circle-o', 'url' => ['pasien/index']],
                    ['label' => 'Dokter', 'icon' => 'circle-o', 'url' => ['dokter/index']],
                    ['label' => 'Petugas', 'icon' => 'circle-o', 'url' => ['petugas/index']],
                    ['label' => 'Diagnosa Kerja', 'icon' => 'circle-o', 'url' => ['diagnosa-kerja/index']],
                    ['label' => 'Kop', 'icon' => 'circle-o', 'url' => ['kop/index']],
                ]
            ],
            [
                'label' => 'Master Data',
                'icon' => 'thumb-tack',
                'url' => '#',
                'items' => [
                    ['label' => 'Agama', 'icon' => 'circle-o', 'url' => ['agama/index']],
                    ['label' => 'Pendidikan', 'icon' => 'circle-o', 'url' => ['pendidikan/index']],
                    ['label' => 'Pekerjaan', 'icon' => 'circle-o', 'url' => ['pekerjaan/index']],
                    ['label' => 'Wilayah', 'icon' => 'circle-o', 'url' => ['wilayah/index']],
                ]
            ],
            /*[
                'label' => 'Referensi',
                'icon' => 'thumb-tack',
                'url' => '#',
                'items' => [
                    ['label' => 'Pemeriksaan Fisik', 'icon' => 'circle-o', 'url' => ['pemeriksaan-fisik/index']],
                    ['label' => 'Laboratorium', 'icon' => 'circle-o', 'url' => ['laboratorium/index']],
                    ['label' => 'Radiologi', 'icon' => 'circle-o', 'url' => ['radiologi/index']],
                    ['label' => 'Kesimpulan', 'icon' => 'circle-o', 'url' => ['kesimpulan/index']],
                    ['label' => 'Pemeriksaan Spirometry', 'icon' => 'circle-o', 'url' => ['pemeriksaan-spirometry/index']],
                    ['label' => 'Pemeriksaan Audiometry', 'icon' => 'circle-o', 'url' => ['pemeriksaan-audiometry/index']],
                    ['label' => 'Pemeriksaan EKG', 'icon' => 'circle-o', 'url' => ['pemeriksaan-ekg/index']],
                    ['label' => 'Pemeriksaan Treadmill', 'icon' => 'circle-o', 'url' => ['pemeriksaan-treadmill/index']],
                    ['label' => 'Pemeriksaan USG', 'icon' => 'circle-o', 'url' => ['pemeriksaan-usg/index']],
                ]
            ],*/
            /*[
                'label' => 'Detail Pemeriksaan Fisik',
                'icon' => 'thumb-tack',
                'url' => '#',
                'items' => [
                    ['label' => 'Mata', 'icon' => 'circle-o', 'url' => ['pemeriksaan-fisik-mata/index']],
                    ['label' => 'Telinga', 'icon' => 'circle-o', 'url' => ['pemeriksaan-fisik-telinga/index']],
                    ['label' => 'Timpani', 'icon' => 'circle-o', 'url' => ['pemeriksaan-fisik-timpani/index']],
                    ['label' => 'Hidung', 'icon' => 'circle-o', 'url' => ['pemeriksaan-fisik-hidung/index']],
                    ['label' => 'Leher', 'icon' => 'circle-o', 'url' => ['pemeriksaan-fisik-leher/index']],
                    ['label' => 'Mulut', 'icon' => 'circle-o', 'url' => ['pemeriksaan-fisik-mulut/index']],
                    ['label' => 'Thorax', 'icon' => 'circle-o', 'url' => ['pemeriksaan-fisik-thorax/index']],
                    ['label' => 'Abdomen', 'icon' => 'circle-o', 'url' => ['pemeriksaan-fisik-abdomen/index']],
                    ['label' => 'Manufer Ekstremitas', 'icon' => 'circle-o', 'url' => ['pemeriksaan-fisik-manufer-ekstremitas/index']],
                ]
            ],
            [
                'label' => 'Detail Laboratorium',
                'icon' => 'thumb-tack',
                'url' => '#',
                'items' => [
                    ['label' => 'Hematologi', 'icon' => 'circle-o', 'url' => ['laboratorium-hematologi/index']],
                    ['label' => 'Kimia', 'icon' => 'circle-o', 'url' => ['laboratorium-kimia/index']],
                    ['label' => 'Urinalisa', 'icon' => 'circle-o', 'url' => ['laboratorium-urinalisa/index']],
                    ['label' => 'Narkoba', 'icon' => 'circle-o', 'url' => ['laboratorium-narkoba/index']],
                    ['label' => 'Imunoserologi', 'icon' => 'circle-o', 'url' => ['laboratorium-imunoserologi/index']],
                ]
            ],*/
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
