<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\shop\boxberry;

use skeeks\cms\money\Money;
use skeeks\cms\shop\delivery\DeliveryCheckoutModel;
use yii\helpers\ArrayHelper;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class BoxberryCheckoutModel extends DeliveryCheckoutModel
{
    /**
     * @var string
     */
    public $id;
    public $name;
    public $address;
    public $phone;
    public $workschedule;
    public $price;
    public $period;
    public $prepaid;

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['id'], 'required', 'message' => 'Выберите пункт выдачи заказа.'],
            [['id'], 'string'],
            [['name'], 'string'],
            [['address'], 'string'],
            [['phone'], 'string'],
            [['workschedule'], 'string'],
            [['price'], 'string'],
        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'id'           => "Код ПВЗ",
            'name'         => "Наименование города выбранного ПВЗ",
            'address'      => "Адрес",
            'phone'        => "Телефон",
            'price'        => "Цена",
            'workschedule' => "Время работы",
        ]);
    }


    /**
     * @return array
     */
    public function getVisibleAttributes()
    {
        $result = [];

        if ($this->name) {
            $result['name'] = [
                'value' => $this->name,
                'label' => 'Город',
            ];
        }
        if ($this->address) {
            $result['address'] = [
                'value' => $this->address,
                'label' => 'Адрес',
            ];
        }
        if ($this->phone) {
            $result['phone'] = [
                'value' => $this->phone,
                'label' => 'Телефон',
            ];
        }
        if ($this->workschedule) {
            $result['workschedule'] = [
                'value' => $this->workschedule,
                'label' => 'Рабочее время',
            ];
        }

        if ($this->id) {
            $result['id'] = [
                'value' => $this->id,
                'label' => 'Код ПВЗ',
            ];
        }

        return $result;
    }

    /**
     * @return Money
     */
    public function getMoney()
    {
        if ((float)$this->price) {
            return new Money((string)$this->price, $this->shopOrder->currency_code);
        }
        return parent::getMoney();
    }
}