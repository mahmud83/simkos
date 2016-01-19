# Providers

Example configuration 

```
<?php
namespace temp;

use schmunk42\giiant\generators\crud\callbacks\base\Callback;
use schmunk42\giiant\generators\crud\callbacks\yii\Db;
use schmunk42\giiant\generators\crud\callbacks\yii\Html;

\Yii::$container->set(
    'schmunk42\giiant\generators\crud\providers\CallbackProvider',
    [
        'columnFormats'    => [
            // hide system fields, but not ID in table
            'created_at$|updated_at$' => Callback::false(),
            // hide all TEXT or TINYTEXT columns
            '.*'                      => Db::falseIfText(),
        ],
        'activeFields'     => [
            // hide system fields in form 
            'id$' => Db::falseIfAutoIncrement()
            'id$|created_at$|updated_at$' => Callback::false(),
        ],
        'attributeFormats' => [
            // render HTML output
            '_html$' => Html::attribute(),
        ],

    ]
);
```

