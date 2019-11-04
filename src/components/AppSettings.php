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

        $model = $modelClass::findOne($attributes);
        if ($model) {
            return $model;
        }

        return new $modelClass($attributes);
    }

    /**
     * @param $key
     * @param $value
     * @return bool
     */
    public function set($key, $value)
    {
        $attributes = ['key' => $key];

        $model = $this->getModel($attributes);
        $model->value = $value;
        return $model->save();
    }

    /**
     * @param $key
     * @param  null  $default
     * @return mixed|null
     */
    public function get($key, $default = null)
    {

        $model = $this->getBaseQuery()->andWhere(['key' => $key])->one();

        return $model ? $model['value'] : $default;
    }


}