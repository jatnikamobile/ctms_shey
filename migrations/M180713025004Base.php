<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class M180713025004Base
 */
class M180713025004Base extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "M180713025004Base cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M180713025004Base cannot be reverted.\n";

        return false;
    }
    */
}
