<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\shop\boxberry;

use skeeks\cms\shop\components\DeliveryHandler;
use skeeks\yii2\form\fields\FieldSet;
use skeeks\yii2\form\fields\TextField;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class BoxberryDeliveryHandler extends DeliveryHandler
{
    /**
     * @var string
     */
    public $api_key = '';

    /**
     * @return array
     */
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => \Yii::t('skeeks/shop/app', 'Boxberry'),
        ]);
    }


    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['api_key'], 'required'],
            [['api_key'], 'string'],
        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'api_key'       => "Ключ api",
        ]);
    }


    /**
     * @return array
     */
    public function getConfigFormFields()
    {
        return [
            'main'      => [
                'class'  => FieldSet::class,
                'name'   => 'Основные',
                'fields' => [
                    'api_key' => [
                        'class' => TextField::class,
                    ]
                ],
            ],
        ];
    }

}