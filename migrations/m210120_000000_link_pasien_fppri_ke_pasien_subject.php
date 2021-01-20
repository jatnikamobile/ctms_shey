<?php

use yii\db\Migration;

class m210120_000000_link_pasien_fppri_ke_pasien_subject extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try {
            $this->execute("
                ALTER TABLE `pasien`
                ADD `regno` varchar(30) COLLATE 'latin1_swedish_ci' NULL,
                ADD `status` varchar(11) COLLATE 'latin1_swedish_ci' NULL AFTER `regno`;
                ALTER TABLE `pasien`
                ADD INDEX `regno` (`regno`);
            ");
        } catch(\Exception $e) {}
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
