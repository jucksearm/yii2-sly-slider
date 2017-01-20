<?php echo \jucksearm\sly\Sly::widget([
    'id' => 'basic',                          
    'items'=> [
        ['content' => '0'],
        ['content' => '1'],
        ['content' => '2'],
        ['content' => '3'],
        ['content' => '4'],
        ['content' => '5'],
        ['content' => '6'],
        ['content' => '7'],
        ['content' => '8'],
        ['content' => '9'],
        ['content' => '10'],
        ['content' => '11'],
        ['content' => '12'],
        ['content' => '13'],
        ['content' => '14'],
        ['content' => '15'],
    ],
    'htmlOptions' => [           
        'class' => 'slider-h',
    ],
    'widgetOptions' => [
    ]
]); ?>

<?php echo \jucksearm\sly\Sly::widget([
    'id' => 'basic01',                          
    'items'=> [
        ['content' => '0'],
        ['content' => '1'],
        ['content' => '2'],
        ['content' => '3'],
        ['content' => '4'],
        ['content' => '5'],
        ['content' => '6'],
        ['content' => '7'],
        ['content' => '8'],
        ['content' => '9'],
        ['content' => '10'],
    ],
    'htmlOptions' => [           
        'class' => 'slider-h',
    ],
    'widgetOptions' => [
        'cycleBy' => 'items',
        'cycleInterval' => 1000,
    ]
]); ?>