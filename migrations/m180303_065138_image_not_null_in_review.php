<?php

use yii\db\Migration;

/**
 * Class m180303_065138_image_not_null_in_review
 */
class m180303_065138_image_not_null_in_review extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->alterColumn('review','image',$this->string()->null()->comment('avatar'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->alterColumn('review','image',$this->string()->notNull()->comment('avatar'));
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180303_065138_image_not_null_in_review cannot be reverted.\n";

        return false;
    }
    */
}
