<?php

use yii\db\Migration;

/**
 * Handles the creation of table `review`.
 */
class m180211_112742_create_review_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('review', [
            'id' => $this->primaryKey(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'image' => $this->string()->notNull(),
            'is_active' => $this->boolean()->defaultValue(1)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('review');
    }
}
