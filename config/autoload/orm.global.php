<?php
return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => [
                    'host' => '@db.host@',
		    'port' => '@db.port@',
                    'user' =>'@db.username@',
                    'password' => '@db.password@',
                    'dbname' => '@db.dbname@'
                ],
            ]
        ],
    ],
];
