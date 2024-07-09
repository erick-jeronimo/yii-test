<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%clientes}}`.
 */
class m240708_234653_create_clientes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clientes}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(),
            'cpf' => $this->string(),
            'cep' => $this->string(),
            'logradouro' => $this->string(),
            'numero' => $this->string(),
            'cidade' => $this->string(),
            'estado' => $this->string(),
            'complemento' => $this->string(),
            'foto' => $this->string(),
            'sexo' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%clientes}}');
    }
}
