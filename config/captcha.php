<?php

return [

    // customize the character set to be used for captcha display   
    'characters' => '12346789abdefghijmnpqrt',

    'default'   => [
        'length'    => 6,
        'width'     => 140,
        'height'    => 36,
        'quality'   => 100,
        'math'      => false,
    ],

    'flat'   => [
        'length'    => 6,
        'width'     => 160,
        'height'    => 38,
        'quality'   => 90,
        'lines'     => 6,
        'bgImage'   => true,
        'bgColor'   => '#fff',
        'fontColors'=> ['#2c3e50', '#c0392b', '#16a085', '#c0392b', '#8e44ad', '#303f9f', '#f57c00', '#795548'],
        'contrast'  => -5,
    ],

    'mini'   => [
        'length'    => 3,
        'width'     => 60,
        'height'    => 32,
    ],

    'inverse'   => [
        'length'    => 6,
        'width'     => 120,
        'height'    => 36,
        'quality'   => 90,
        'sensitive' => true,
        'angle'     => 12,
        'sharpen'   => 10,
        'blur'      => 2,
        'invert'    => true,
        'contrast'  => -5,
    ]

];
