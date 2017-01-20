yii2sly / Yii2 extension
=

Javascript `Sly` which can be found here: http://darsa.in/sly/
Support fot horizontal only

# Installation

## Install via composer:
```
  composer require "jucksearm/yii2sly"
```
OR add this to your composer.json require section

```json
  "jucksearm/yii2sly": "*",
```
## Install via zip:

download file https://github.com/jucksearm/yii2sly/archive/master.zip

extract file to `vendor` folder as:
```php
   vendor
   |- jucksearm
     |- yii2sly
       | ......
```

# How to use

This extensions is design for widgets, You can call it every where.
Example code here:

```php

<?php echo jucksearm\yii2sly\Sly::widget([
    'id' => 'slider',                           ** unique id
    'items'=> [
        ['content' => '<img src=""></img>'],    ** insert images
        ['content' => '<div>test</div>'],       ** insert html DOM
        ...
    ],
    'htmlOptions' => [
        'style' => 'height:200px;',             ** custom options
        'class' => 'slider-h',
        ...
    ],
    'widgetOptions' => [
        'itemNav' => 'basic',                   ** setting widgets
        ...
    ]
]); ?>

```
# Example

You can copy example code in [example.php](example.php) to your view render in some controller.


## [Option](Option.md)

Detailed description of all available yii2sly widget options.
