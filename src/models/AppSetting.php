<?php

namespace codexten\yii\app\settings\models;

use Yii;
use yii\helpers\Url;
use \codexten\yii\db\ActiveRecord;
use \codexten\yii\app\settings\models\query\AppSettingQuery;

/**
 * This is the model class for table "{{%app_setting}}".
 *
 * Database fields:
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property int $created_at
 * @property int $updated_at
 */
class AppSetting extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%app_setting}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['key'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Key'),
            'value' => Yii::t('app', 'Value'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }


    /**
     * {@inheritdoc}
     * @return AppSettingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AppSettingQuery(get_called_class());
    }

}
