<?php

return [
    'guard'    => 'web',
    'username' => [
        'fields' =>'email', // use `|` for OR, `,` for AND
        'keys'   => [
            'default' => 'email', //default key if you didn't set custome key
        ],
    // 'username' => [
    //     'fields' =>'username|email|phone,phone_code', // use `|` for OR, `,` for AND
    //     'keys'   => [
    //         'default'    => 'username', //default key if you didn't set custome key
    //         'phone_code' => 'phone_code', //use {fieldname} for custome key send
    //     ],
        // query result
        // select * from `users` where (`username` = ? or `email` = ? or (`phone` = ? and `phone_code` = ?))
    ],
];