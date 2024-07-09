<?php

namespace common\models;

use common\models\query\ClienteQuery;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yiibr\brvalidator\CpfValidator;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $cpf
 * @property string|null $cep
 * @property string|null $logradouro
 * @property string|null $numero
 * @property string|null $cidade
 * @property string|null $estado
 * @property string|null $complemento
 * @property string|null $foto
 * @property string|null $sexo
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Produto[] $produtos
 */
class Cliente extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    public function extraFields()
    {
        return ['produtos'];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false,
                'createdByAttribute' => false,
            ]
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {
            unset($this->created_at, $this->updated_at);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['nome', 'cpf'], 'required'],
            ['cpf', CpfValidator::class],
            [['nome', 'cpf', 'cep', 'logradouro', 'numero', 'cidade', 'estado', 'complemento', 'foto', 'sexo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'cep' => 'Cep',
            'logradouro' => 'Logradouro',
            'numero' => 'Numero',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'complemento' => 'Complemento',
            'foto' => 'Foto',
            'sexo' => 'Sexo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ProdutoQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::class, ['cliente_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ClienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClienteQuery(get_called_class());
    }
}
