<?php

use Nails\Analytics\Service;

return [
    'services' => [
        'Drivers' => function (): Service\Drivers {
            if (class_exists('\App\Analytics\Service\Drivers')) {
                return new \App\Analytics\Service\Drivers();
            } else {
                return new Service\Drivers();
            }
        },
    ],
];
