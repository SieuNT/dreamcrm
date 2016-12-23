<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $partner_id
 * @property integer $customer_resource_id
 * @property string $full_name
 * @property string $phone_number
 * @property string $email
 * @property string $delivery_date
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property CustomerResource $customerResource
 * @property Partner $partner
 * @property Project $project
 * @property Note[] $notes
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'partner_id', 'customer_resource_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['full_name', 'phone_number', 'email', 'delivery_date', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'required'],
            [['delivery_date'], 'safe'],
            [['full_name', 'phone_number', 'email'], 'string', 'max' => 255],
            [['customer_resource_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerResource::className(), 'targetAttribute' => ['customer_resource_id' => 'id']],
            [['partner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Partner::className(), 'targetAttribute' => ['partner_id' => 'id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'project_id' => Yii::t('app', 'Project ID'),
            'partner_id' => Yii::t('app', 'Partner ID'),
            'customer_resource_id' => Yii::t('app', 'Customer Resource ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'email' => Yii::t('app', 'Email'),
            'delivery_date' => Yii::t('app', 'Delivery Date'),
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
    public function getCustomerResource()
    {
        return $this->hasOne(CustomerResource::className(), ['id' => 'customer_resource_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartner()
    {
        return $this->hasOne(Partner::className(), ['id' => 'partner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Note::className(), ['customer_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomerQuery(get_called_class());
    }
}
