<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accounting".
 *
 * @property int $id
 * @property int $order_id
 * @property string $price_end
 * @property string $date
 *
 * @property Order $order
 */
class Accounting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'price_end', 'date'], 'required'],
            [['order_id'], 'integer'],
            [['date'], 'safe'],
            [['price_end'], 'string', 'max' => 20],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'price_end' => 'Price End',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }
}
