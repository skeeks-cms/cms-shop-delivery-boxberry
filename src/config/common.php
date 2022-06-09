<?php
return [
    'components' => [
        'shop' => [
            'deliveryHandlers'             => [
                'boxberry' => [
                    'class' => \skeeks\cms\shop\boxberry\BoxberryDeliveryHandler::class
                ]
            ]
        ],
    ],
];