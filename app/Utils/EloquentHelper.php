<?php

namespace App\Utils;

class EloquentHelper
{

    /**
     * Make creating process easier with model that already has default attributes
     *
     * @param string $class the class's namespace address
     * @param array $attributes the attribute to create
     * @return void
     */
    public static function create(string $class, array $attributes)
    {
        $model = (new $class())->setRawAttributes([  ]);

        $model->fill($attributes);
        $model->save();
    }
}
