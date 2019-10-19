<?php

namespace codexten\yii\app\settings\models\query;

use \yii\db\ActiveQuery;
use \codexten\yii\app\settings\models\AppSetting;

/**
 * This is the ActiveQuery class for [[\codexten\yii\app\settings\models\AppSetting]].
 *
 * @see AppSetting
 */
class AppSettingQuery extends ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return AppSetting[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AppSetting|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
