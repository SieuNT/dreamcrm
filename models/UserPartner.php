<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_partner".
 *
 * @property integer $user_id
 * @property integer $partner_id
 *
 * @property Partner $partner
 * @property User $user
 */
class UserPartner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'partner_id'], 'required'],
            [['user_id', 'partner_id'], 'integer'],
            [['partner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Partner::className(), 'targetAttribute' => ['partner_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'partner_id' => Yii::t('app', 'Partner ID'),
        ];
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return UserPartnerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserPartnerQuery(get_called_class());
    }
}
