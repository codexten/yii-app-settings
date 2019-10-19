<?php


use codexten\yii\app\settings\models\AppSetting;
use yii\base\Component;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class AppSettings extends Component
{
    public $modelClass = AppSetting::class;

    public $cacheKey = 'appSettings';
    private $_id;

    public function getBaseQuery($id = null)
    {
        /* @var $modelClass ActiveRecord */
        $modelClass = $this->modelClass;

        return (new ActiveQuery($modelClass))->andWhere(['id' => $id ?: $this->_id]);
    }

    public function get($key, $default = null, $id = null)
    {

        $model = $this->getBaseQuery($id)->andWhere(['key' => $key])->one();

        return $model ? $model['value'] : $default;
    }


}