<?php 

use app\models\UserRole;

?>

<?= dmstr\widgets\Menu::widget(
    [
        'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
        'items' => [
            ['label' => 'MENU UTAMA','options' => ['class' => 'header']],
            ['label' => 'Resume  Uji Klinis', 'icon' => 'check-square-o', 'url' => ['registrasi/resume-pasien']],
            ['label' => 'Analisis Hasil Uji', 'icon' => 'circle-o', 'url' => ['registrasi/analisis-mcu']],
            ['label' => 'SISTEM','options' => ['class' => 'header']],
            /*[
                'label' => 'User',
                'icon' => 'user',
                'url' => '#',
                'items' => [
                    ['label' => 'Instansi', 'icon' => 'circle-o', 'url' => ['user/','id_user_role' => UserRole::INSTANSI]],
                ]
            ],*/
            ['label' => 'Logout','icon' => 'lock', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post">{icon} {label}</a>' , 'visible' => !Yii::$app->user->isGuest],
        ]
    ]
) ?>   
