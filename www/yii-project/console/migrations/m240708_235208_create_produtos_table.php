<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%produtos}}`.
 */
class m240708_235208_create_produtos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%produtos}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(),
            'preco' => $this->float(),
            'cliente_id' => $this->integer(),
            'foto' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->addForeignKey('fk_produtos_clientes', 'produtos', 'cliente_id', 'clientes', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_produtos_clientes', 'produtos');
        $this->dropTable('{{%produtos}}');
    }
}
