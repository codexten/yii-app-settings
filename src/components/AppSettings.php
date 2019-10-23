<?php

namespace codexten\yii\app\settings\components;


use codexten\yii\app\settings\models\AppSetting;
use yii\base\Component;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;


/**
 * Class AppSettings
 *
 * @package codexten\yii\app\settings\components
 *
 * @property ActiveQuery $baseQuery
 */
class AppSettings extends Component
{
    public $modelClass = AppSetting::class;

    public $cacheKey = 'appSettings';

    /**
     * @return ActiveQuery
     */
    public function getBaseQuery()
    {
        /* @var $modelClass ActiveRecord */
        $modelClass = $this->modelClass;

        return (new ActiveQuery($modelClass));
    }
    /**
     * @param  array  $attributes
     *
     * @return ActiveRecord
     */
    public function getModel($attributes = [])
    {
        /* @var $modelClass ActiveRecord */
        $modelClass = $this->modelClass;

        return new $modelClass($attributes);
    }

    public function set($key, $value)
    {
        $attributes = ['key' => $key, 'value' => $value];

        $model = $this->getModel($attributes);

        return $model->save();
    }

    public function get($key, $default = null)
    {

        $model = $this->getBaseQuery()->andWhere(['key' => $key])->one();

        return $model ? $model['value'] : $default;
    }


}