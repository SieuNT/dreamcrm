<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_resource".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $name
 * @property string $content
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Customer $customer
 */
class CustomerResource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_resource';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'name', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['created_by', 'updated_by', 'created_at', 'updated_at'], 'required'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'name' => Yii::t('app', 'Name'),
            'content' => Yii::t('app', 'Content'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @inheritdoc
     * @return CustomerResourceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomerResourceQuery(get_called_class());
    }
}
