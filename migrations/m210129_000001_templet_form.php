<?php

use yii\db\Migration;

class m210129_000001_templet_form extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try {
            $this->execute("
                CREATE TABLE `form` (
                `id` bigint(20) NOT NULL AUTO_INCREMENT,
                `kode` text COLLATE utf8mb4_unicode_ci NOT NULL,
                `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
                `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            ");
        } catch (\Exception $e) {}

        try {
            $this->execute("
                CREATE TABLE `parameter` (
                    `id` bigint(20) NOT NULL AUTO_INCREMENT,
                    `id_form` bigint(20) NOT NULL,
                    `id_induk` bigint(20) NOT NULL DEFAULT 0,
                    `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                    `id_tipe` tinyint(4) NOT NULL,
                    `urutan` int(11) DEFAULT NULL,
                    `level` tinyint(4) NOT NULL DEFAULT 0,
                    `default` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            ");
        } catch (\Exception $e) {}

        try {
            $this->execute("
                CREATE TABLE `parameter_opsi` (
                    `id` bigint(20) NOT NULL AUTO_INCREMENT,
                    `id_param` bigint(20) NOT NULL,
                    `id_label` bigint NOT NULL,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            ");
        } catch (\Exception $e) {}

        try {
            $this->execute("
                CREATE TABLE `parameter_tipe` (
                    `id` tinyint(4) NOT NULL AUTO_INCREMENT,
                    `tipe` text COLLATE utf8mb4_unicode_ci NOT NULL,
                    `atribut` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=default, 2=min, 3=max',
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
                
                INSERT INTO `parameter_tipe` (`id`, `tipe`, `atribut`) VALUES
                (1,	'label',	NULL),
                (2,	'uraian',	'1,2,3'),
                (3,	'angka',	'1,2,3'),
                (4,	'pilihan',	'1'),
                (5,	'pilihan multi',	'1'),
                (6,	'tanggal',	'1,2,3,4'),
                (7,	'waktu',	'1,2,3,4'),
                (8,	'tanggal waktu',	'1,2,3,4');
            ");
        } catch (\Exception $e) {}
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
