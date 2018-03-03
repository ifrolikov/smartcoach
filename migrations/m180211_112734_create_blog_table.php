<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blog`.
 */
class m180211_112734_create_blog_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('blog', [
            'id' => $this->primaryKey(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'is_active' => $this->boolean()->defaultValue(1)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('blog');
    }
}
