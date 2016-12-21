<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $full_name
 * @property string $phone_number
 * @property string $email
 * @property string $start_date
 * @property string $end_date
 * @property string $notes
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Customer[] $customers
 * @property Project $project
 * @property UserPartner[] $userPartners
 */
class Partner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['full_name', 'phone_number', 'email', 'start_date', 'end_date', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['notes'], 'string'],
            [['full_name', 'phone_number', 'email'], 'string', 'max' => 255],
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
            'full_name' => Yii::t('app', 'Full Name'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'email' => Yii::t('app', 'Email'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'notes' => Yii::t('app', 'Notes'),
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
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['partner_id' => 'id']);
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
    public function getUserPartners()
    {
        return $this->hasMany(UserPartner::className(), ['partner_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PartnerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PartnerQuery(get_called_class());
    }
}